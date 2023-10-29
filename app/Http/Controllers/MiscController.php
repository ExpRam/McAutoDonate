<?php

namespace App\Http\Controllers;


use App\Actions\GetPriceAction;
use App\Models\Donate;
use App\Models\Promocode;
use App\Models\User;
use App\Services\Minecraft\Rcon;
use App\Services\Yoomoney\YooMoneyAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MiscController extends Controller
{
    public function uuid($nickname)
    {
        $response = Http::get('https://api.mojang.com/users/profiles/minecraft/' . $nickname);
        $uuid = $response->getStatusCode() == 200 ? $response['id'] : 'invalid';
        return response()->json([
            'uuid' => $uuid,
        ]);
    }

    public function price(Request $request, GetPriceAction $action)
    {
        $price = $action($request);
        if ($price > -1)
            return response()->json([
                'price' => $price,
            ]);

        return response()->json([
            'error' => 'Cannot find this donate',
        ]);
    }

    public function handler(Request $request)
    {
        $result = YooMoneyAPI::checkNotificationSignature($request->sha1_hash, $request->all(), env("YOOMONEY_SECRET"));
        if ($result) {
            $rcon = new Rcon(env('MCRCON_IP'), env('MCRCON_PORT'), env('MCRCON_PASSWORD'), 1);
            $label = explode("||", $request->label);

            if ($rcon->connect()) {
                $donate = Donate::query()->where('title', $label[0]);
                $user = User::query()->where('nickname', $label[1]);
                $promocode = Promocode::query()->where('promocode', $label[2]);

                if ($promocode->exists()) {
                    $promocode->first()->decrement('count', 1);
                    if ($promocode->first()->count < 1) $promocode->first()->delete();
                }
                if ($donate->exists() && $user->exists()) {
                    $command = $donate->first()->command;

                    if ($user->exists()) {
                        if ($donate->first()->is_rank) $user->first()->update([
                            'rank' => $donate->first()->title,
                        ]);
                        $command = str_replace('{player}', $user->first()->nickname, $command);
                    }
                    $rcon->sendCommand($command);
                }
                $rcon->disconnect();
            }
        }
        return $result;
    }

    public function link(Request $request, GetPriceAction $action)
    {
        Log::info($request);
        $price = $action($request);
        if ($price > -1) {
            $yoomoney = new YooMoneyAPI([
                "receiver" => env("BILL_NUMBER"),
                "quickpay-form" => "shop",
                "targets" => "Donation",
                "paymentType" => "SB",
                "label" => $request->donate . "||" . $request->nickname . "||" . $request->promocode,
                "sum" => str($price)
            ]);

            $url = $yoomoney->getFinalUrl();
            $response = Http::post($url);

            return response()->json([
                'link' => $response->handlerStats()["url"],
            ]);
        }

        return response()->json([
            'error' => 'Cannot find this donate',
        ]);
    }
}

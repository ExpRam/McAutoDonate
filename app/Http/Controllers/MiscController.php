<?php

namespace App\Http\Controllers;


use App\Actions\GetPriceAction;
use App\Models\Donate;
use App\Models\Promocode;
use App\Models\User;
use App\Services\Minecraft\Rcon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Qiwi\Api\BillPayments;

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
        $secretKey = env('QIWI_SECRET_KEY');
        $billPayments = new BillPayments($secretKey);
        $validSignatureFromNotificationServer = $request->header('X-Api-Signature-SHA256');
        $notificationData = $request->all();
        $result = $billPayments->checkNotificationSignature(
            $validSignatureFromNotificationServer, $notificationData, $secretKey
        );
        if ($result) {
            $rcon = new Rcon(env('MCRCON_HOST'), env('MCRCON_PORT'), env('MCRCON_PASSWORD'), 1);
            if ($rcon->connect()) {
                $donate = Donate::query()->where('title', $notificationData['bill']['customFields']['donate']);
                $promocode = Promocode::query()->where('promocode', $notificationData['bill']['customFields']['promocode']);
                $user = User::query()->where('nickname', $notificationData['bill']['customFields']['nickname']);

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
        $price = $action($request);
        if ($price > -1) {
            $billPayments = new BillPayments(env('QIWI_SECRET_KEY'));
            $date = date(DATE_ATOM, time() + 60 * 60);
            $billId = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex(random_bytes(16)), 4));

            $fields = [
                'amount' => $price,
                'currency' => 'RUB',
                'expirationDateTime' => $date,
                'customFields' => [
                    'promocode' => $request->promocode,
                    'nickname' => $request->nickname,
                    'donate' => $request->donate,
                    'themeCode' => env('QIWI_THEMECODE'),
                ],
            ];

            $response = $billPayments->createBill($billId, $fields);

            return response()->json([
                'link' => $response['payUrl'],
            ]);
        }

        return response()->json([
            'error' => 'Cannot find this donate',
        ]);
    }
}

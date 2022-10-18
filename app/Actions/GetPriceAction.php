<?php

namespace App\Actions;

use App\Models\Donate;
use App\Models\Promocode;
use App\Models\User;
use Illuminate\Http\Request;

class GetPriceAction
{

    public function __invoke(Request $request)
    {
        $donate = Donate::query()->where('title', $request->donate);

        if ($donate->exists()) {
            $price = $donate->first()->price;
            $user = User::query()->where('nickname', $request->nickname);
            if ($donate->first()->is_rank && $user->exists()) {
                $userDonate = Donate::query()->where('title', $user->first()->rank);
                if ($userDonate->exists() && $userDonate->first()->price < $donate->first()->price) {
                    $price = $donate->first()->price - $userDonate->first()->price;
                }
            }

            if ($request->promocode) {
                $promocode = Promocode::query()->where('promocode', $request->promocode);
                if ($promocode->exists()) $price = $price / 100 * $promocode->first()->percent;
            }
            return round($price);
        }

        return -1;
    }

}

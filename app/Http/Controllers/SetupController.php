<?php

namespace App\Http\Controllers;

use App\Http\Requests\SetupFormRequest;
use App\Models\AdminUser;
use Illuminate\Support\Facades\Artisan;

class SetupController extends Controller
{
    public function setup()
    {
        return view('setup');
    }

    public function setup_process(SetupFormRequest $request)
    {
        if ($request->validated()) {
            Artisan::call('migrate', array('--force' => true));
            AdminUser::query()->create([
                "username" => $request->username,
                "password" => bcrypt($request->password),
            ]);
            $this->changeEnv([
                'MCRCON_HOST' => $request->rcon_host,
                'MCRCON_PORT' => $request->rcon_port,
                'MCRCON_PASSWORD' => $request->rcon_password,

                'YOOMONEY_SECRET' => $request->yoomoney_secret,
                'BILL_NUMBER' => $request->bill_number,

                'SETUP_DONE' => true,

            ]);
            return to_route('index');
        }
        return to_route('setup');
    }

    protected function changeEnv($array)
    {
        $path = base_path('.env');
        $result = file_get_contents($path);

        foreach ($array as $key => $value) {
            if (is_bool(env($key)) && is_bool($value)) {
                $old = env($key) ? 'true' : 'false';
                $value = $value ? 'true' : 'false';
            } elseif (env($key) === null) {
                $old = 'null';
            } else {
                $old = env($key);
            }
            $result = str_replace(
                "$key=" . $old, "$key=" . $value, $result);
        }
        if (file_exists($path)) {
            file_put_contents($path, $result);
        }
    }
}

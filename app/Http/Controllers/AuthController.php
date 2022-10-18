<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function logout()
    {
        auth('web')->logout();
        return to_route('index');
    }

    public function login(LoginFormRequest $request)
    {
        $user = User::query()->where('nickname', $request->get('nickname'))->first();

        if (!$user) $user = User::create($request->validated());

        auth('web')->login($user);
        return to_route('index');
    }
}

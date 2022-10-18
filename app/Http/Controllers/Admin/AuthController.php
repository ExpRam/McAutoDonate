<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginFormRequest;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function logout()
    {
        auth('admin')->logout();
        return to_route('admin.login');
    }

    public function login(AdminLoginFormRequest $request)
    {
        if (auth("admin")->attempt($request->validated())) {
            return redirect(route("admin.index"));
        }

        return to_route('admin.login')->withErrors(["username" => trans('auth.failed')]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Donate;

class IndexController extends Controller
{
    public function index()
    {
        $donates = Donate::all();

        return view('index', [
            'donates' => $donates,
        ]);
    }

}

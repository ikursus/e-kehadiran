<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function welcome(Request $request)
    {
        dd($request->all());
        return view('welcome');
    }
}

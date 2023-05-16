<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('user.template-profile');
    }

    public function update(Request $request)
    {
        // return $request->all();
        // Die and dump - fungsi untuk membuat semakan result/data
        if ($request->has('email') && $request->filled('email'))
        {
            return 'Alamat email adalah: ' . $request->input('email');
        }

        if ($request->hasFile('gambar'))
        {
            return 'Ada gambar di attach';
        }

        dd($request->all());
    }
}

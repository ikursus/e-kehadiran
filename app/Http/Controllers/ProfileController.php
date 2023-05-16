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
        $request->validate([
            // 'nama' => 'required|min:3|string',
            // 'email' => 'required|email'
            'nama' => ['required', 'min:3', 'string'],
            'email' => ['required', 'email:filter'],
            'gambar' => ['required', 'mimes:jpg,png']
        ]);


        dd($request->all());
    }
}

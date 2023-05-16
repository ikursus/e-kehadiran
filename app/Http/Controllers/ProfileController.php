<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileUpdate;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('user.template-profile');
    }

    public function update(ProfileUpdate $request)
    {
        // $request->validate([
        //     // 'nama' => 'required|min:3|string',
        //     // 'email' => 'required|email'
        //     'nama' => ['required', 'min:3', 'string'],
        //     'email' => ['required', 'email:filter'],
        //     'gambar' => ['required', 'mimes:jpg,png'],
        //     'password' => ['confirmed', Password::min(4)]
        // ]);


        dd($request->all());
    }
}

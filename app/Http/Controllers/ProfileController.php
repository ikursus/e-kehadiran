<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $profile = User::find(auth()->id());

        $data = $request->except('password');

        if($request->hasFile('gambar'))
        {
            $file = $request->file('gambar');
            // Upload gambar ke dalam direectory profile yang berada di folder public/uploaded
            //'public_upload' ini adalah merupakan setting dalam filesystems.php
            // Setkan nama file yang diupload kepad $filename
            $filename = $file->store( 'profile' ,'public_upload');

            $data['gambar'] = $filename;
        }

        $profile->update($data);

        return redirect()->back();
    }
}

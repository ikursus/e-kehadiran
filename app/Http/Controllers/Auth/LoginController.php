<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function borangLogin() {

        //return view('auth/template-login');
        return view('auth.template-login');
    }

    public function terimaDataBorangLogin(Request $request) {
        // return 'Berjaya Login';
        return $request->except('_token');
    }
}

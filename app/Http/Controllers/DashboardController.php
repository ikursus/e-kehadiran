<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function __invoke() {

        $name = session('username');
        $email = 'test@gmail.com';
        $tajuk = '<script>alert("Dashboard");</script>';

        // Cara 1 passing data ke template
        // return view('user.template-dashboard')->with('name', $name)->with('email', $email);

        // Cara 2 passing data ke template
        // return view('user.template-dashboard', ['name' => $name, 'email' => $email]);

        // Cara 3 passing data ke template
        return view('user.template-dashboard', compact('name', 'email', 'tajuk'));
    }
}

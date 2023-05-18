<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke() {

        // Dapatkan rekod kehadiran terkini untuk aktiviti butang dan timer kehadiran
        $currentKehadiran = Kehadiran::where('user_id', '=', auth()->id())
        ->whereDate('created_at', now())
        ->whereNull('masa_keluar')
        ->first();

        // dd($currentKehadiran);

        // Cara 1 passing data ke template
        // return view('user.template-dashboard')->with('name', $name)->with('email', $email);

        // Cara 2 passing data ke template
        // return view('user.template-dashboard', ['name' => $name, 'email' => $email]);

        // Cara 3 passing data ke template
        return view('user.template-dashboard', compact('currentKehadiran'));
    }
}

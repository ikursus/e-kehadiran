<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KehadiranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.kehadiran.index');
    }

    public function show($id)
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function punchIn()
    {
        //
    }

    public function punchOut()
    {

    }
}

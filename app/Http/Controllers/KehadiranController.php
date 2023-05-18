<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use Illuminate\Http\Request;

class KehadiranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$senaraiKehadiran = DB::table('kehadiran')->get();
        $senaraiKehadiran = Kehadiran::get();

        return view('user.kehadiran.index', compact('senaraiKehadiran'));
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

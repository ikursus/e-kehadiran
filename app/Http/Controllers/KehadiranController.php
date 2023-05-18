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
        // Penggunaan ->get() akan keluarkan SEMUA data
        // $senaraiKehadiran = Kehadiran::where('user_id', auth()->id())->get();
        $senaraiKehadiran = Kehadiran::where('user_id', auth()->id())->paginate(10);

        return view('user.kehadiran.index', compact('senaraiKehadiran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function punchIn()
    {
        $kehadiran = new Kehadiran;
        $kehadiran->user_id = auth()->id();
        $kehadiran->tarikh_kehadiran = now();
        $kehadiran->masa_masuk = now();
        $kehadiran->save();

        return redirect()->back()->with('alert-success', 'Anda berjaya punch in');

    }

    public function punchOut()
    {

    }
}

<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        $senaraiKehadiran = Kehadiran::where('user_id', auth()->id())
        ->orderBy('id', 'desc')
        ->paginate(10);

        return view('user.kehadiran.index', compact('senaraiKehadiran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function punchIn()
    {
        // Cara 1 simpan data menggunakan model - new object
        $kehadiran = new Kehadiran;
        $kehadiran->user_id = auth()->id();
        $kehadiran->tarikh_kehadiran = now();
        $kehadiran->masa_masuk = now();
        $kehadiran->save();

        // Cara 2 simpan data menggunakan model create method
        // Kehadiran::create([
        //     'user_id' => auth()->id(),
        //     'tarikh_kehadiran' => now(),
        //     'masa_masuk' => now()
        // ]);

        return redirect()->back()->with('alert-success', 'Anda berjaya punch in');

    }

    public function punchOut()
    {
        // Semak dulu ada atau tidak rekod kehadiran hari ini?
        $kehadiran = Kehadiran::where('user_id', '=', auth()->id())
        ->whereDate('created_at', now())
        ->whereNull('masa_keluar')
        ->first();

        // Sekiranya tidak wujud, redirect dengan notis error
        if (is_null($kehadiran))
        {
            return redirect()->back()->with('alert-error', 'Anda belum punch in');
        }

        // Jika tidak null kehadiran, baru punch out.
        // Kira terlebih dahulu masa jumlah bekerja
        $masaMasuk = Carbon::createFromFormat('Y-m-d H:i:s', $kehadiran->masa_masuk);
        $masaKeluar = Carbon::createFromFormat('Y-m-d H:i:s', now());

        $perbezaan = $masaMasuk->diff($masaKeluar);
        $jamBekerja = $perbezaan->h * 60;  // Hari ->days, jam ->h, minute -> i, saat ->s
        $jumlahBekerja = $jamBekerja + $perbezaan->i;

        $kehadiran->update([
            'masa_keluar' => now(),
            'jumlah_bekerja' => $jumlahBekerja
        ]);

        return redirect()->back()->with('alert-success', 'Anda berjaya punch out');
    }
}

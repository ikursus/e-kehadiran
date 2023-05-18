<?php

namespace App\Http\Controllers\Pengurusan;

use App\Models\Kehadiran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KehadiranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$senaraiKehadiran = DB::table('kehadiran')->get();
        $senaraiKehadiran = Kehadiran::paginate(10);

        return view('pengurusan.kehadiran.index', compact('senaraiKehadiran'));
    }

    public function destroy($id)
    {
        $kehadiran = Kehadiran::find($id); // Kehadiran::findOrFail($id);

        $kehadiran->delete();

        return redirect()->route('pengurusan.kehadiran.index')->with('alert-success', 'Rekod berjaya dipadam');
    }
}

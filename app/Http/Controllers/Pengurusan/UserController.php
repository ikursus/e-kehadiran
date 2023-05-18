<?php

namespace App\Http\Controllers\Pengurusan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Dapatkan data users menggunakan Query Builder DB::table();
        $senaraiUsers = DB::table('users')->get();

        // Papakarn template index.blade.php dalam folder users dan passkan variable $users
        return view('pengurusan.users.index', compact('senaraiUsers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengurusan.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Dapatkan data hasil daripada validation borang
        $data = $request->validate([
            'nama' => ['required'],
            'email' => ['required', 'email:filter'],
            'password' => ['required', Password::min(4), 'confirmed'],
            'telefon' => ['nullable', 'sometimes', 'string'],
            'alamat' => ['nullable', 'sometimes', 'string'],
        ]);

        $data['password'] = bcrypt($data['password']);

        // Simpan data selepas validation
        DB::table('users')->insert($data);

        // Beri respon selesai
        return redirect()->route('pengurusan.users.index')->with('alert-success', 'Rekod Berjaya Disimpan!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $senaraiKehadiran = DB::table('users')
        ->join('kehadiran', 'pengurusan.users.id', '=', 'kehadiran.user_id')
        ->where('pengurusan.users.id', '=', $id)
        ->select('pengurusan.users.*', 'kehadiran.*')
        ->get();

        return view('pengurusan.users.show', compact('senaraiKehadiran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Dapatkan 1 rekod sahaja berdasarkan data dari $id
        $user = DB::table('users')->where('id', '=', $id)->first();

        return view('pengurusan.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Dapatkan data hasil daripada validation borang
        $data = $request->validate([
            'nama' => ['required'],
            'email' => ['required', 'email:filter'],
            'telefon' => ['nullable', 'sometimes', 'string'],
            'alamat' => ['nullable', 'sometimes', 'string'],
        ]);
        // Jika ruangan password di isi, buat validation dan kemudian encrypt password
        if ($request->has('password') && $request->filled('password'))
        {
            $request->validate([
                'password' => [Password::min(4), 'confirmed'],
            ]);

            $data['password'] = bcrypt($request->input('password'));
        }
        // Dapatkan rekod user yang ingin dikemaskini dan update
         DB::table('users')->where('id', '=', $id)->update($data);

         // Beri respon selesai
         return redirect()->back()->with('alert-success', 'Rekod Berjaya Dikemaskini!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('users')->where('id', '=', $id)->delete();

        // Beri respon selesai
        return redirect()->route('pengurusan.users.index')->with('alert-success', 'Rekod Berjaya Dihapuskan!');
    }
}

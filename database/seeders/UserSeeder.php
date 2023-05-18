<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cara 1 - Menggunakan Query Builder
        // DB::table('namatable')->insert($array);
        DB::table('users')->insert([
            'nama' => 'Ali',
            'email' => 'ali@gmail.com',
            // 'password' => Hash::make('1234')
            'password' => bcrypt('1234'),
            'telefon' => '0123456789',
            'alamat' => 'No 123, Taman Puchong Selangor',
        ]);

        // Cara 2 - Menggunakan Model
        // Kaedah 1 masukkan data menggunakan Model
        // User::create($array);

        // Kaedah 2 masukkan data menggunakan Model
        $user = new User;
        $user->nama = 'Abu';
        $user->email = 'abu@gmail.com';
        $user->password = bcrypt('1234');
        $user->telefon = '0123456789';
        $user->alamat = 'No 987 Taman Puchong Permai Selangor';
        $user->save();

        // User 3
        DB::table('users')->insert([
            'nama' => 'Siti',
            'email' => 'siti@gmail.com',
            // 'password' => Hash::make('1234')
            'password' => bcrypt('1234'),
            'telefon' => '0123456789',
            'alamat' => 'No 123, Taman Puchong Selangor',
        ]);

        // User 4
        DB::table('users')->insert([
            'nama' => 'Upin',
            'email' => 'upin@gmail.com',
            // 'password' => Hash::make('1234')
            'password' => bcrypt('1234'),
            'telefon' => '0123456789',
            'alamat' => 'No 123, Taman Puchong Selangor',
        ]);

    }
}

<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KehadiranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $senaraiUsers = DB::table('users')->pluck('id')->toArray();

        $bilanganKehadiran = 30;

        for ($i = 0; $i < $bilanganKehadiran; $i++)
        {

            $randomUserKey = array_rand($senaraiUsers);

            $kehadiran = [
                'user_id' => $senaraiUsers[$randomUserKey],
                'tarikh_kehadiran' => now(),
                'masa_masuk' => now(),
                'masa_keluar' => now()->addHours(8),
                'jumlah_bekerja' => 8,
                'alasan' => $senaraiUsers[$randomUserKey] . ' - ' . Str::random(8)
            ];

            DB::table('kehadiran')->insert($kehadiran);
        }

    }
}

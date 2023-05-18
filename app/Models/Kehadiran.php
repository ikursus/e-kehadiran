<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    use HasFactory;

    // Informasi nama table yang ingin dihubungi
    // (jika ejaan table tak menggunakan plural)
    protected $table = 'kehadiran';

    protected $fillable = [
        'user_id',
        'tarikh_kehadiran',
        'masa_masuk',
        'masa_keluar',
        'alasan',
        'jumlah_bekerja',
        'status_kelulusan'
    ];
}

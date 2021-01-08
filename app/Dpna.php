<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dpna extends Model
{
    protected $fillable = [
        'mahasiswa_id', 'kehadiran', 'ukhuwah_islamiyah', 'ukhuwah_wathoniyah', 'fardhu_kifayah', 'hafalan_doa', 'baca_quran', 'sholat', 'tilawatil_quran', 'dzikir', 'buku_harian',
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiPeriodik extends Model
{
    protected $fillable = [
        'user_id', 'keluarga', 'pekan_ke', 'tanggal', 'kehadiran', 'ukhuwah_islamiyah', 'ukhuwah_wathoniyah', 'fardu_kifayah', 'hafalan_doa', 'baca_quran', 'sholat_fardu', 'tilawatil_quran', 'dzikir', 'buku_harian'
    ];

    // protected $foreignKey = "mahasiswa_nim";

    public function User()
    {
        // return $this->belongsTo(Mahasiswa::class);
        return $this->hasMany(User::class);
        // return $this->belongsTo('App\User');
    }

    public function Mahasiswa()
    {
        // return $this->belongsTo(Mahasiswa::class);
        return $this->belongsTo('Mahasiswa');
    }
}

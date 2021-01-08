<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $fillable = [
        'user_id', 'pesan', 'tanggal', 'jam', 'balasan', 'tanggal_balas', 'jam_balas'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}

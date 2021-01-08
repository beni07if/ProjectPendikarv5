<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Tutor extends Authenticatable
{
    use Notifiable;

    protected $guard = 'tutor';
    // protected $guard = 'anggota-mahasiswa';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $table = 'mahasiswas';
    protected $fillable = [
        'name',  'nim', 'email', 'prodi', 'fakultas', 'no_hp', 'keluarga', 'foto', 'periode', 'role', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Role()
    {
        return $this->belongsTo(Role::class);
    }

    protected $primaryKey = "id";

    public function NilaiPeriodik()
    {
        // return $this->hasMany(NilaiPeriodik::class);
        return $this->hasMany('App\NilaiPeriodik');
    }
}

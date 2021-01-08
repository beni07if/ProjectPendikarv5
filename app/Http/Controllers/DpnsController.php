<?php

namespace App\Http\Controllers;

use App\NilaiPeriodik;
use App\Mahasiswa;
use App\User;
use Illuminate\Http\Request;

class DpnsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth:mahasiswa');
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function dpns11()
    // {
    // $nilaiPeriodik = NilaiPeriodik::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
    // $kehadiran = NilaiPeriodik::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->where('id', <5)->get('kehadiran');
    // $ukhuwahIslamiyah = NilaiPeriodik::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->where('id', <5)->get('ukhuwah_islamiyah');
    // $ukhuwahWathoniyah = NilaiPeriodik::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->where('id', <5)->get('ukhuwah_wathoniyah');
    // $farduKifayah = NilaiPeriodik::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->where('id', <5)->get('fardu_kifayah');
    // $hafalanDoa = NilaiPeriodik::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->where('id', <5)->get('hafalan_doa');
    // $bacaQuran = NilaiPeriodik::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->where('id', <5)->get('baca_quran');
    // $sholatFardu = NilaiPeriodik::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->where('id', <5)->get('sholat_fardu');
    // $tilawatilQuran = NilaiPeriodik::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->where('id', <5)->get('tilawatil_quran');
    // $dzikir = NilaiPeriodik::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->where('id', <5)->get('dzikir');
    // $bukuHarian = NilaiPeriodik::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->where('id', <5)->get('buku_harian');
    // $kehadiran = NilaiPeriodik::where('id', auth()->user()->id)->where('kehadiran', ->get();
    // $tugasTerstruktur = NilaiPeriodik::where('');
    // return view('adminSekretaris.nilaiPeriodik.index', compact('kehadiran', 'ukhuwahIslamiyah', 'ukhuwahWathoniyah', 'farduKifayah', 'hafalanDoa', 'bacaQuran', 'sholatFardu', 'tilawatilQuran', 'dzikir', 'bukuHarian' ));
    // $ujianKompetensi =
    // $aktivitasHarian =
    // $bukuHarian =
    {
        $user = $this->middleware('auth');
        // $eloquent = Mahasiswa::where(auth()->user()->keluarga)->get();
        $mahasiswa = User::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        // $nilaiPeriodik = NilaiPeriodik::all();
        $dpns1 = NilaiPeriodik::where('keluarga', auth()->user()->keluarga)->where('id', '<', 3)->get();
        return view('adminSekretaris.dpns.dpns1', compact('dpns1', 'mahasiswa', 'user'));
    }

    public function dpns22()
    {
        $user = $this->middleware('auth');
        // $eloquent = Mahasiswa::where(auth()->user()->keluarga)->get();
        $mahasiswa = User::where('id', auth()->user()->id)->where('periode', auth()->user()->periode)->get();
        // $nilaiPeriodik = NilaiPeriodik::all();
        $dpns2 = NilaiPeriodik::where('keluarga', auth()->user()->keluarga)->where('id', '<', 5)->get();
        return view('adminSekretaris.dpns.dpns2', compact('dpns2', 'mahasiswa', 'user'));
    }

    public function dpns33()
    {
        $user = $this->middleware('auth');
        // $eloquent = Mahasiswa::where(auth()->user()->keluarga)->get();
        $mahasiswa = User::where('id', auth()->user()->id)->where('periode', auth()->user()->periode)->get();
        // $nilaiPeriodik = NilaiPeriodik::all();s
        $dpns3 = NilaiPeriodik::where('keluarga', auth()->user()->keluarga)->where('id', '<', 7)->get();
        return view('adminSekretaris.dpns.dpns3', compact('dpns3', 'mahasiswa', 'user'));
    }

    public function dpna()
    {
        $user = $this->middleware('auth');
        // $eloquent = Mahasiswa::where(auth()->user()->keluarga)->get();
        $mahasiswa = User::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        // $nilaiPeriodik = NilaiPeriodik::all();
        $nilaiPeriodik = NilaiPeriodik::where('user_id', auth()->user()->id)->where('pekan_ke', '<', 13)->get();
        return view('adminSekretaris.dpna.index', compact('nilaiPeriodik', 'mahasiswa', 'user'));
    }
}

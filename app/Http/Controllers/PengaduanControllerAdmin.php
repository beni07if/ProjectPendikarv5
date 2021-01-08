<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\User;
use App\Admin;
use App\NilaiPeriodik;
use Session;
use Hash;
use Auth;
use App\Pengaduan;
use Alert;

class PengaduanControllerAdmin extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        // $this->middleware('auth:mahasiswa');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $mahasiswa = User::findOrFail($id);
        // if ($mahasiswa->id == 1 ){
        //     $test = 'oke';
        // }else{
        //     $test = 'sip';
        // }
        // $pengaduan = Pengaduan::all();
        $mahasiswa = User::all();
        // $pengaduan = Mahasiswa::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        // return view('authMahasiswa.register', compact('mahasiswa'));
        // $mahasiswa = User::where('id', auth()->user()->id)->get();
        $pengaduan = Pengaduan::where('user_id', 1)->get();
        return view('koordinator.pengaduan.pesanIndexVsKoor', compact('pengaduan', 'mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validasi = $request->validate([
        //     'user_id' => 'required',
        //     'pesan' => 'required'
        // ]);
        // $pengaduan = Pengaduan::create($validasi);
        $pengaduan = new Pengaduan;
        $pengaduan->user_id = $request->user_id;
        $pengaduan->admin_id = $request->admin_id;
        $pengaduan->pesan = $request->pesan;
        $pengaduan->tanggal = $request->tanggal;
        $pengaduan->jam = $request->jam;
        $pengaduan->save();
        // return redirect('adminSekretaris.pengaduan.pesanVsMhs', compact('pengaduan'));
        return redirect('pengaduanListKoordinator')->with('success', 'Pesan terkirim..', compact('pengaduan'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $validasi = $request->validate([
        //     'user_id' => 'required',
        //     'pesan' => 'required'
        // ]);
        // $pengaduan = Pengaduan::create($validasi);
        $pengaduan = Pengaduan::findOrFail($request->id);
        $pengaduan->user_id = $request->input('user_id');
        $pengaduan->pesan = $request->input('pesan');
        $pengaduan->tanggal = $request->input('tanggal');
        $pengaduan->jam = $request->input('jam');
        $pengaduan->balasan = $request->input('balasan');
        $pengaduan->tanggal_balas = $request->input('tanggal_balas');
        $pengaduan->jam_balas = $request->input('jam_balas');
        $pengaduan->save($request->all());
        return redirect('pengaduanListKoordinator')->with('success', 'Pesan terkirim..', compact('pengaduan'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pesanVsKoor($id)
    {
        $mahasiswa = User::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        $pengaduan = Pengaduan::where('id', $id)->get();
        // return view('authMahasiswa.register', compact('mahasiswa'));
        return view('koordinator.pengaduan.pesanVsKoor', compact('mahasiswa', 'pengaduan'));
    }

    public function pesanPersonalVsKoor($user_id)
    {
        $mahasiswa = User::where('id', $user_id);
        // $mahasiswa = User::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        // $pengaduan = Pengaduan::where('user_id', $user_id)->get();
        $pengaduan = Pengaduan::where('user_id', $user_id)->get();
        // return view('authMahasiswa.register', compact('mahasiswa'));
        return view('koordinator.pengaduan.pesanPersonalVsKoor', compact('pengaduan', 'mahasiswa'));
    }


}

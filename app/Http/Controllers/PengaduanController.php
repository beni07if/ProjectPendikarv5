<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\User;
use Session;
use Hash;
use Auth;
use App\Pengaduan;
use Alert;

class PengaduanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('auth:mahasiswa');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $mahasiswa = Mahasiswa::all();
        $mahasiswa = Pengaduan::where('id', auth()->user()->id)->where('periode', auth()->user()->periode)->get();
        // return view('authMahasiswa.register', compact('mahasiswa'));
        return view('adminSekretaris.pengaduan.index', compact('mahasiswa'));
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
        $pengaduan->pesan = $request->pesan;
        $pengaduan->tanggal = $request->tanggal;
        $pengaduan->jam = $request->jam;
        $pengaduan->balasan = $request->balasan;
        $pengaduan->tanggal_balas = $request->tanggal_balas;
        $pengaduan->jam_balas = $request->jam_balas;
        $pengaduan->save();
        // return redirect('adminSekretaris.pengaduan.pesanVsMhs', compact('pengaduan'));
        return redirect('/daftar-pengaduan-mhs')->with('message', 'Pesan terkirim..', compact('pengaduan'));
        // return back()->with('message', 'Pesan terkirim..');
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
        //
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
}

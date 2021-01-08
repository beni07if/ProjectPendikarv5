<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NilaiPeriodik;
use App\Mahasiswa;
use App\User;
use App\Admin;
use Yajra\Datatables\Datatables;
// use App\Http\Controllers\Datatables;
use Illuminate\Support\Facades\Auth;

class NilaiPeriodikControllerAdmin extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = $this->middleware('auth:admin');
        // $user = $this->middleware('auth:mahasiswa');
        // $eloquent = Mahasiswa::where(auth()->user()->keluarga)->get();
        $mahasiswa = Admin::all();
        $mahasiswaPendikar = user::all();
        // $nilaiPeriodik = NilaiPeriodik::all();
        // $nilaiPeriodik = NilaiPeriodik::where('keluarga', auth()->user()->keluarga)->get();
        $nilaiPeriodik = NilaiPeriodik::all();
        // $sholat = NilaiPeriodik::where('keluarga', auth()->user()->keluarga)->get();
        return view('koordinator.nilaiPeriodik.index', compact('nilaiPeriodik', 'mahasiswaPendikar', 'mahasiswa', 'user'));
    }
    public function indexTutor()
    {
        $user = $this->middleware('auth');
        // $user = $this->middleware('auth:mahasiswa');
        // $eloquent = Mahasiswa::where(auth()->user()->keluarga)->get();
        $mahasiswa = User::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        // $nilaiPeriodik = NilaiPeriodik::all();
        $nilaiPeriodik = NilaiPeriodik::where('keluarga', auth()->user()->keluarga)->get();
        return view('adminSekretaris.nilaiPeriodik.index', compact('nilaiPeriodik', 'mahasiswa', 'user'));
    }
    public function indexMahasiswa()
    {
        $user = $this->middleware('auth');
        // $user = $this->middleware('auth:mahasiswa');
        // $eloquent = Mahasiswa::where(auth()->user()->keluarga)->get();
        $mahasiswa = User::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        // $nilaiPeriodik = NilaiPeriodik::all();
        $nilaiPeriodik = NilaiPeriodik::where('keluarga', auth()->user()->keluarga)->get();
        return view('adminSekretaris.nilaiPeriodik.index', compact('nilaiPeriodik', 'mahasiswa', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = $this->middleware('auth:mahasiswa');
        $mahasiswa = Mahasiswa::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        $nilaiPeriodik = NilaiPeriodik::all();
        return view('adminSekretaris.nilaiPeriodik.create', compact('nilaiPeriodik', 'mahasiswa', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'user_id' => 'required',
            'keluarga' => 'required',
            'pekan_ke' => 'required',
            'tanggal' => 'required',
            'kehadiran' => 'required',
            'ukhuwah_islamiyah' => 'required',
            'ukhuwah_wathoniyah' => 'required',
            'fardu_kifayah' => 'required',
            'hafalan_doa' => 'required',
            'baca_quran' => 'required',
            'sholat_fardu' => 'required',
            'tilawatil_quran' => 'required',
            'dzikir' => 'required',
            'buku_harian' => 'required'

            // 'mahasiswa_id' => $request['mahasiswa_id'],
            // 'pekan_ke' => $request['pekan_ke'],
            // 'tanggal' => $request['tanggal'],
            // 'kehadiran' => $request['kehadiran'],
            // 'ukhuwah_islamiyah' => $request['ukhuwah_islamiyah'],
            // 'ukhuwah_wathoniyah' => $request['ukhuwah_wathoniyah'],
            // 'fardhu_kifayah' => $request['fardhu_kifayah'],
            // 'hafalan_doa' => $request['hafalan_doa'],
            // 'baca_quran' => $request['baca_quran'],
            // 'sholat_fardhu' => $request['sholat_fardhu'],
            // 'tilawatil_quran' => $request['tilawatil_quran'],
            // 'dzikir' => $request['dzikir'],
            // 'buku_harian' => $request['buku_harian']
        ]);
        $nilaiPeriodik = NilaiPeriodik::create($validasi);
        return redirect('nilaiPeriodik')->with('success', 'Nilai Periodik Berhasil Upload..', compact('nilaiPeriodik'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->middleware('auth');
        $mahasiswa = User::where('id', $id)->get();
        $nilaiPeriodik = NilaiPeriodik::find($id);
        return view('adminSekretaris.nilaiPeriodik.show', compact('nilaiPeriodik', 'mahasiswa', 'user'));

        // $user = $this->middleware('auth');
        // $user = $this->middleware('auth:mahasiswa');
        // $eloquent = Mahasiswa::where(auth()->user()->keluarga)->get();
        // $mahasiswa = User::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        // $nilaiPeriodik = NilaiPeriodik::all();
        // $nilaiPeriodik = NilaiPeriodik::where('keluarga', auth()->user()->keluarga)->get();
        // $sholat = NilaiPeriodik::where('keluarga', auth()->user()->keluarga)->get();
        // return view('adminSekretaris.nilaiPeriodik.index', compact('nilaiPeriodik', 'mahasiswa', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $mahasiswa = Mahasiswa::where('id', $id)->get();
        $koordinator = Admin::where('id', $id)->get();
        $mahasiswa = User::where('id', $id)->get();
        // $nilaiPeriodik = NilaiPeriodik::where('user_id', $user_id)->get();
        $nilaiPeriodik = NilaiPeriodik::find($id);
        return view('koordinator.nilaiPeriodik.edit', compact('nilaiPeriodik', 'mahasiswa', 'koordinator'));
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
        $nilaiPeriodik = NilaiPeriodik::findOrFail($id);
        // $nilaiPeriodik->user_id = $request->input('user_id');
        // $nilaiPeriodik->keluarga = $request->input('keluarga');
        $nilaiPeriodik->pekan_ke = $request->input('pekan_ke');
        $nilaiPeriodik->tanggal = $request->input('tanggal');
        $nilaiPeriodik->kehadiran = $request->input('kehadiran');
        $nilaiPeriodik->ukhuwah_islamiyah = $request->input('ukhuwah_islamiyah');
        $nilaiPeriodik->ukhuwah_wathoniyah = $request->input('ukhuwah_wathoniyah');
        $nilaiPeriodik->fardu_kifayah = $request->input('fardu_kifayah');
        $nilaiPeriodik->hafalan_doa = $request->input('hafalan_doa');
        $nilaiPeriodik->baca_quran = $request->input('baca_quran');
        $nilaiPeriodik->sholat_fardu = $request->input('sholat_fardu');
        $nilaiPeriodik->tilawatil_quran = $request->input('tilawatil_quran');
        $nilaiPeriodik->dzikir = $request->input('dzikir');
        $nilaiPeriodik->buku_harian = $request->input('buku_harian');
        $nilaiPeriodik->save($request->all());
        // $validasi = $request->validate([
        //     'user_id' => 'required',
        //     'keluarga' => 'required',
        //     'pekan_ke' => 'required',
        //     'tanggal' => 'required',
        //     'kehadiran' => 'required',
        //     'ukhuwah_islamiyah' => 'required',
        //     'ukhuwah_wathoniyah' => 'required',
        //     'fardu_kifayah' => 'required',
        //     'hafalan_doa' => 'required',
        //     'baca_quran' => 'required',
        //     'sholat_fardu' => 'required',
        //     'tilawatil_quran' => 'required',
        //     'dzikir' => 'required',
        //     'buku_harian' => 'required'
        // ]);

        // NilaiPeriodik::whereId($id)->update($validasi);
        return redirect('/nilai-periodik-admin-index')->with('success', 'Nilai Periodik Berhasil Diubah..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nilaiPeriodik = NilaiPeriodik::findOrFail($id);
        $nilaiPeriodik->delete();

        return redirect('/nilaiPeriodik')->with('Success', 'Data Berhasil Dihapus..');
    }
}

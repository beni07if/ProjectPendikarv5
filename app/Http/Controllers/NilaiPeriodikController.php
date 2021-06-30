<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NilaiPeriodik;
use App\Mahasiswa;
use App\User;
use Yajra\Datatables\Datatables;
// use App\Http\Controllers\Datatables;
use Illuminate\Support\Facades\Auth;

class NilaiPeriodikController extends Controller
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
    public function index()
    {
        if (Auth::user()->role == 'sekretaris') {
            $timbul = '';
            $pesan = 'Detail';
        } elseif (Auth::user()->role == 'tutor') {
            $timbul = '';
            $pesan = 'Detail';
        } else {
            $timbul = 'hidden';
            $pesan = 'Detail';
        }
        $user = $this->middleware('auth');
        // $user = $this->middleware('auth:mahasiswa');
        // $eloquent = Mahasiswa::where(auth()->user()->keluarga)->get();
        $mahasiswa = User::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        // $nilaiPeriodik = NilaiPeriodik::all();
        // $nilaiPeriodik = NilaiPeriodik::where('keluarga', auth()->user()->keluarga)->get();
        // $nilaiPeriodik = NilaiPeriodik::where('user_id', auth()->user()->id)->orderBy('tanggal', 'DESC')->get();
        $nilaiPeriodik = NilaiPeriodik::where('user_id', auth()->user()->id)->get();
        // $sholat = NilaiPeriodik::where('keluarga', auth()->user()->keluarga)->get();
        return view('adminSekretaris.nilaiPeriodik.index', compact('timbul', 'pesan', 'nilaiPeriodik', 'mahasiswa', 'user'));
    }

    public function indexAnggota()
    {
        $user = $this->middleware('auth');
        // $user = $this->middleware('auth:mahasiswa');
        // $eloquent = Mahasiswa::where(auth()->user()->keluarga)->get();
        $mahasiswa = User::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        // $nilaiPeriodik = NilaiPeriodik::all();
        $nilaiPeriodik = NilaiPeriodik::where('keluarga', auth()->user()->keluarga)->get();
        return view('anggotaKeluarga.nilaiPeriodik.index', compact('nilaiPeriodik', 'mahasiswa', 'user'));
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
        $nilaiPeriodik = NilaiPeriodik::find($id)->get();
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
        $mahasiswa = User::where('id', $id)->get();
        // $nilaiPeriodik = NilaiPeriodik::where('user_id', $user_id)->get();
        $nilaiPeriodik = NilaiPeriodik::find($id);
        if (Auth::user()->role == 'sekretaris') {
            $opsi = '';
            $pesan = 'Simpan';
        } elseif (Auth::user()->role == 'tutor') {
            $opsi = '';
            $pesan = 'Simpan';
        } else {
            $opsi = 'disabled';
            $pesan = 'Hanya Sekretaris yang dapat mengubah..';
        }

        if (Auth::user()->jenis_kelamin == 'laki-laki') {
            return view('adminSekretaris.nilaiPeriodik.editNPIkhwan', compact('pesan', 'nilaiPeriodik', 'mahasiswa', 'opsi'));
        } else {
            return view('adminSekretaris.nilaiPeriodik.edit', compact('pesan', 'nilaiPeriodik', 'mahasiswa', 'opsi'));
        }
    }

    //nilai periodik detail anggota
    public function nilaiPeriodikDetailAnggota($id)
    {
        // $mahasiswa = Mahasiswa::where('id', $id)->get();
        $mahasiswa = User::where('id', $id)->get();
        // $nilaiPeriodik = NilaiPeriodik::where('user_id', $user_id)->get();
        $nilaiPeriodik = NilaiPeriodik::find($id);
        return view('anggotaKeluarga.nilaiPeriodik.edit', compact('nilaiPeriodik', 'mahasiswa'));
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
        $validasi = $request->validate([
            // 'user_id' => 'required',
            // 'keluarga' => 'required',
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
        ]);

        NilaiPeriodik::whereId($id)->update($validasi);
        return redirect('/nilaiPeriodik')->with('success', 'Nilai Periodik Berhasil Diubah..');
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

        return redirect('/nilaiPeriodik')->with('success', 'Nilai Periodik Berhasil Dihapus..');
    }

    public function tambahNilaiPeriodik()
    {
        $user = $this->middleware('auth');
        // $user = $this->middleware('auth:mahasiswa');
        // $eloquent = Mahasiswa::where(auth()->user()->keluarga)->get();
        $mahasiswa = User::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->where('role', '!=', 'tutor')->get();
        // $nilaiPeriodik = NilaiPeriodik::all();
        // $nilaiPeriodik = NilaiPeriodik::where('keluarga', auth()->user()->keluarga)->get();
        $nilaiPeriodik = NilaiPeriodik::where('user_id', auth()->user()->id)->orderBy('tanggal', 'DESC')->get();

        if (Auth::user()->jenis_kelamin == 'laki-laki') {
            return view('adminSekretaris.nilaiPeriodik.tambahNilaiPeriodikIkhwan', compact('mahasiswa', 'user', 'nilaiPeriodik'));
        } else {
            return view('adminSekretaris.nilaiPeriodik.tambahNilaiPeriodik', compact('mahasiswa', 'user', 'nilaiPeriodik'));
        }
    }
}

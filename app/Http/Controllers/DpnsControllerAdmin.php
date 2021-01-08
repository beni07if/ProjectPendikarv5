<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\User;
use Session;
use Hash;
use Auth;
use App\NilaiPeriodik;
use App\Pengaduan;
use App\Http\Middleware\Role;

class DpnsControllerAdmin extends Controller
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
        //
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
        //
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

    public function dpns1Home()
    {
        $user = $this->middleware('auth:admin');
        // $eloquent = Mahasiswa::where(auth()->user()->keluarga)->get();
        $mahasiswa = User::all();
        // $mahasiswa = User::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        // $nilaiPeriodik = NilaiPeriodik::all();
        // $dpns1 = NilaiPeriodik::where('pekan_ke', '<', 2)->get();
        $dpns1 = NilaiPeriodik::where('id', auth()->user()->id)->where('pekan_ke', '<', 5)->get();
        return view('koordinator.dpns.dpns1Home', compact('dpns1', 'mahasiswa', 'user'));
        // return view('adminSekretaris.dpns1.index', compact('dpns1', 'mahasiswa', 'user'));
    }
    public function dpns1Detail($id)
    {
        $user = $this->middleware('auth:admin');
        // $eloquent = Mahasiswa::where(auth()->user()->keluarga)->get();
        // $mahasiswa = User::all();
        // $mahasiswa = User::where('id', $id)->get()
        $mahasiswa = User::where('id', $id)->get();
        // $nilaiPeriodik = NilaiPeriodik::all();
        // $dpns1 = NilaiPeriodik::all();
        $nilaiPeriodik = NilaiPeriodik::where('user_id', $id)->where('pekan_ke', '<', 5)->get();
        // $dpns1 = NilaiPeriodik::where('id', $id)->get();
        // return view('koordinator.dpns.dpns1', compact( 'mahasiswa', 'user'));
        return view('koordinator.dpns.dpns1Detail', compact('nilaiPeriodik', 'mahasiswa', 'user'));
    }
    public function detailNPDpns1($id)
    {
        $user = $this->middleware('auth:admin');
        $mahasiswa = User::where('id', $id)->get();
        $nilaiPeriodik = NilaiPeriodik::where('id', $id)->get();
        return view('koordinator.dpns.detailNPDpns1', compact('nilaiPeriodik', 'mahasiswa'));
    }

    //dpns 2
    public function dpns2Home()
    {
        $user = $this->middleware('auth:admin');
        // $eloquent = Mahasiswa::where(auth()->user()->keluarga)->get();
        $mahasiswa = User::all();
        // $mahasiswa = User::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        // $nilaiPeriodik = NilaiPeriodik::all();
        // $dpns1 = NilaiPeriodik::where('pekan_ke', '<', 2)->get();
        // $dpns1 = NilaiPeriodik::where('keluarga', auth()->user()->keluarga)->where('pekan_ke', '<', 5)->get();
        return view('koordinator.dpns.dpns2Home', compact( 'mahasiswa', 'user'));
        // return view('adminSekretaris.dpns1.index', compact('dpns1', 'mahasiswa', 'user'));
    }
    public function dpns2Detail($id)
    {
        $user = $this->middleware('auth:admin');
        // $eloquent = Mahasiswa::where(auth()->user()->keluarga)->get();
        // $mahasiswa = User::all();
        // $mahasiswa = User::where('id', $id)->get()
        $mahasiswa = User::where('id', $id)->get();
        // $nilaiPeriodik = NilaiPeriodik::all();
        // $dpns1 = NilaiPeriodik::all();
        $nilaiPeriodik = NilaiPeriodik::where('user_id', $id)->where('pekan_ke', '<', 9)->get();
        // $dpns1 = NilaiPeriodik::where('id', $id)->get();
        // return view('koordinator.dpns.dpns1', compact( 'mahasiswa', 'user'));
        return view('koordinator.dpns.dpns2Detail', compact('nilaiPeriodik', 'mahasiswa', 'user'));
    }
    public function detailNPDpns2($id)
    {
        $user = $this->middleware('auth:admin');
        $mahasiswa = User::where('id', $id)->get();
        $nilaiPeriodik = NilaiPeriodik::where('id', $id)->get();
        return view('koordinator.dpns.detailNPDpns2', compact('nilaiPeriodik', 'mahasiswa'));
    }
    //dpns2

    public function dpns3Home()
    {
        $user = $this->middleware('auth:admin');
        // $eloquent = Mahasiswa::where(auth()->user()->keluarga)->get();
        $mahasiswa = User::all();
        // $mahasiswa = User::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        // $nilaiPeriodik = NilaiPeriodik::all();
        // $dpns3 = NilaiPeriodik::where('pekan_ke', '<', 2)->get();
        // $dpns1 = NilaiPeriodik::where('keluarga', auth()->user()->keluarga)->where('pekan_ke', '<', 5)->get();
        return view('koordinator.dpns.dpns3Home', compact('mahasiswa', 'user'));
        // return view('adminSekretaris.dpns1.index', compact('dpns1', 'mahasiswa', 'user'));
    }
    public function dpns3Detail($id)
    {
        $user = $this->middleware('auth:admin');
        // $eloquent = Mahasiswa::where(auth()->user()->keluarga)->get();
        // $mahasiswa = User::all();
        // $mahasiswa = User::where('id', $id)->get()
        $mahasiswa = User::where('id', $id)->get();
        // $nilaiPeriodik = NilaiPeriodik::all();
        // $dpns1 = NilaiPeriodik::all();
        $nilaiPeriodik = NilaiPeriodik::where('user_id', $id)->where('pekan_ke', '<', 13)->get();
        // $dpns1 = NilaiPeriodik::where('id', $id)->get();
        // return view('koordinator.dpns.dpns1', compact( 'mahasiswa', 'user'));
        return view('koordinator.dpns.dpns3Detail', compact('nilaiPeriodik', 'mahasiswa', 'user'));
    }
    public function detailNPDpns3($id)
    {
        $user = $this->middleware('auth:admin');
        $mahasiswa = User::where('id', $id)->get();
        $nilaiPeriodik = NilaiPeriodik::where('id', $id)->get();
        return view('koordinator.dpns.detailNPDpns3', compact('nilaiPeriodik', 'mahasiswa'));
    }

    public function dpnaHome()
    {
        $user = $this->middleware('auth:admin');
        // $eloquent = Mahasiswa::where(auth()->user()->keluarga)->get();
        $mahasiswa = User::all();
        // $mahasiswa = User::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        // $nilaiPeriodik = NilaiPeriodik::all();
        // $dpns1 = NilaiPeriodik::where('pekan_ke', '<', 17)->get();
        $dpns1 = NilaiPeriodik::where('keluarga', auth()->user()->keluarga)->where('pekan_ke', '<', 5)->get();
        return view('koordinator.dpns.dpnaHome', compact('mahasiswa', 'user', 'dpns1'));
        // return view('adminSekretaris.dpns1.index', compact('dpns1', 'mahasiswa', 'user'));
    }
    public function dpnaDetail($id)
    {
        $user = $this->middleware('auth:admin');
        // $eloquent = Mahasiswa::where(auth()->user()->keluarga)->get();
        // $mahasiswa = User::all();
        // $mahasiswa = User::where('id', $id)->get()
        $mahasiswa = User::where('id', $id)->get();
        // $nilaiPeriodik = NilaiPeriodik::all();
        // $dpns1 = NilaiPeriodik::all();
        $dpna = NilaiPeriodik::where('id', $id)->where('pekan_ke',  '<', 17)->get();
        // $dpns1 = NilaiPeriodik::where('id', $id)->get();
        // return view('koordinator.dpns.dpns1', compact( 'mahasiswa', 'user'));
        return view('koordinator.dpns.dpnaDetail', compact('dpna', 'mahasiswa', 'user'));
    }
    public function detailNPDpna($id)
    {
        $user = $this->middleware('auth:admin');
        $mahasiswa = User::where('id', $id)->get();
        $nilaiPeriodik = NilaiPeriodik::where('id', $id)->get();
        return view('koordinator.dpns.detailNPDpna', compact('nilaiPeriodik', 'mahasiswa'));
    }
}

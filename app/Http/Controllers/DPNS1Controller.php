<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NilaiPeriodik;
use App\Mahasiswa;

class DPNS1Controller extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:mahasiswa');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    // {
    //     $dpns1 = NilaiPeriodik::all();
    //     return view('adminSekretaris.dpns1.index', compact('dpns1'));
    // }
    {
        $user = $this->middleware('auth:mahasiswa');
        // $eloquent = Mahasiswa::where(auth()->user()->keluarga)->get();
        $mahasiswa = Mahasiswa::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        // $nilaiPeriodik = NilaiPeriodik::all();
        $dpns1 = NilaiPeriodik::where('mahasiswa_id', auth()->user()->id)->where('pekan_ke', '<', 5)->get();
        return view('adminSekretaris.dpns1.index', compact('dpns1', 'mahasiswa', 'user'));
    }
    public function detailDpns1()
    {
        $mahasiswa = NilaiPeriodik::all();
        return view('adminSekretaris.dpns1.detailDpns1', compact('mahasiswa'));
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
    { {
            $user = $this->middleware('auth:mahasiswa');
            // $eloquent = Mahasiswa::where(auth()->user()->keluarga)->get();
            $mahasiswa = Mahasiswa::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
            // $nilaiPeriodik = NilaiPeriodik::all();
            $dpns1 = NilaiPeriodik::where('mahasiswa_id', auth()->user()->id)->where('pekan_ke', '<', 5)->get();
            return view('adminSekretaris.dpns1.index', compact('dpns1', 'mahasiswa', 'user'));
        }
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

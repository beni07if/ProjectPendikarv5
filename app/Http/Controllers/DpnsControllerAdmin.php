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
use DB;

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
        // $user = $this->middleware('auth:admin');
        // // $eloquent = Mahasiswa::where(auth()->user()->keluarga)->get();
        // $mahasiswa = User::all();
        // // $mahasiswa = User::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        // // $nilaiPeriodik = NilaiPeriodik::all();
        // $dpna = NilaiPeriodik::where('pekan_ke', '<', 17)->get();
        // // $dpns1 = NilaiPeriodik::where('keluarga', auth()->user()->keluarga)->where('pekan_ke', '<', 5)->get();
        // return view('koordinator.dpns.dpnaHome', compact('mahasiswa', 'user', 'dpna'));
        // // return view('adminSekretaris.dpns1.index', compact('dpns1', 'mahasiswa', 'user'));

        $data = DB::table('users')
            ->join('nilai_periodiks', 'users.id', '=', 'nilai_periodiks.user_id')
            ->select('*')
            ->get();
        $mahasiswa = User::all();

        $diolah = [];

        foreach ($data as $baris) {
        // echo $baris->name;
        $objk= (object)[];
        $objk->name = $baris->name;
        $objk->user_id = (int)$baris->user_id;
        $objk->keluarga = (int)$baris->keluarga;
        $objk->prodi = $baris->prodi;
        $objk->jenis_kelamin = $baris->jenis_kelamin;

        //kalkulasi sholat
        $sholats = $baris->sholat_fardu;
            if (($sholats) > 32){
                $sholat = 100;
            } elseif (($sholats) > 28){
                $sholat = 90;
            }elseif (($sholats) > 25){
                $sholat = 80;
            }elseif (($sholats) > 21){
                $sholat = 70;
            }elseif (($sholats) > 18){
                $sholat = 60;
            }elseif (($sholats) > 14){
                $sholat = 50;
            }elseif (($sholats) > 11){
                $sholat = 40;
            }elseif (($sholats) > 7){
                $sholat = 30;
            }elseif (($sholats) > 4){
                $sholat = 20;
            }elseif (($sholats) > 0){
                $sholat = 10;
            }else{
                $sholat = 0;
            }

        // end kalkulasi sholat

        //kalkulasi dzikir
        $dzikirs =  $baris->dzikir;
            if (($dzikirs) > 105){
                $dzikir = 100;
            }elseif (($dzikirs) > 83){
                $dzikir = 80;
            }elseif (($dzikirs) > 62){
                $dzikir = 60;
            }elseif (($dzikirs) > 41){
                $dzikir = 40;
            }elseif (($dzikirs) > 20){
                $dzikir = 20;
            }elseif (($dzikirs) > 0){
                $dzikir = 10;
            }else{
                $dzikir = 0;
            }

        //end kalkulasi dzikir

        // $jenisKelamin = $objk->jenis_kelamin;
        // if (($jenisKelamin) = 'laki-laki'){

        // }
        //kalkulasi tilawah
        $saritilawahs = $baris->tilawatil_quran;
            if (($saritilawahs) > 45){
                $saritilawah = 100;
            }elseif (($saritilawahs) > 40){
                $saritilawah = 90;
            }elseif (($saritilawahs) > 35){
                $saritilawah = 80;
            }elseif (($saritilawahs) > 30){
                $saritilawah = 70;
            }elseif (($saritilawahs) > 25){
                $saritilawah = 60;
            }elseif (($saritilawahs) > 20){
                $saritilawah = 50;
            }elseif (($saritilawahs) > 15){
                $saritilawah = 40;
            }elseif (($saritilawahs) > 5){
                $saritilawah = 20;
            }elseif (($saritilawahs) > 0){
                $saritilawah = 10;
            }else{
                $saritilawah = 0;
            }
        //end kalkulasi tilawah
        $kehadiran = (( $baris->kehadiran)*10/100);

        $ukhuwahIslamiyah = (($baris->ukhuwah_islamiyah)*10/100);
        $ukhuwahWathoniyah = (($baris->ukhuwah_wathoniyah)*10/100);

        $farduKifayah = (($baris->fardu_kifayah )*10/100);
        $hafalanDoa = (($baris->hafalan_doa)*10/100);
        $bacaQuran = (($baris->baca_quran)*10/100);

        $shlt = ($sholat*10/100);
        $tilawah = ($saritilawah*10/100);
        $dzikr = ($dzikir*10/100);

        $bukuHarian = (($baris->buku_harian)*10/100);

        $tugasTerstruktur = ($ukhuwahIslamiyah+$ukhuwahWathoniyah);
        $ujianKompetensi = ($farduKifayah+$hafalanDoa+$bacaQuran);
        $aktivitasHarian = ($shlt+$dzikr+$tilawah);
        $dpnaa = ($kehadiran+$tugasTerstruktur+$ujianKompetensi+$aktivitasHarian+$bukuHarian);

        $objk->dpnaa = $dpnaa;

        array_push($diolah, $objk);

        // $diolah[] = $objk;
        // echo ($i>0&& $i<$banyak_nilai ?',':'').json_encode($objk);

        }

        usort($diolah,function($first,$second){
            return $first->user_id > $second->user_id;
        });

        $data_akhir = [];
        $data_sementara = (object)[];

        for ($j = 0; $j < count($diolah); $j++) {
        // echo count($diolah);
        // echo $diolah[$j]->name;
            if($j == 0){
                $data_sementara->name = $diolah[$j]->name;
                $data_sementara->dpnaa = $diolah[$j]->dpnaa;
                $data_sementara->user_id = $diolah[$j]->user_id;
                $data_sementara->keluarga = $diolah[$j]->keluarga;
                $data_sementara->prodi = $diolah[$j]->prodi;
                $data_sementara->jenis_kelamin = $diolah[$j]->jenis_kelamin;

            } else {


                if($data_sementara->user_id == $diolah[$j]->user_id){
                    $prev_dpna = $data_sementara->dpnaa;
                    $data_sementara = (object)[];
                    $data_sementara->name = $diolah[$j]->name;
                    $data_sementara->dpnaa = $diolah[$j]->dpnaa + $prev_dpna;
                    $data_sementara->user_id = $diolah[$j]->user_id;
                    $data_sementara->keluarga = $diolah[$j]->keluarga;
                    $data_sementara->prodi = $diolah[$j]->prodi;
                    $data_sementara->jenis_kelamin = $diolah[$j]->jenis_kelamin;

                } else {
                    $data_sementara->dpna_hasil = $data_sementara->dpnaa / 16;
                    array_push($data_akhir, $data_sementara);
                    $data_sementara = (object)[];
                    $data_sementara->name = $diolah[$j]->name;
                    $data_sementara->dpnaa = $diolah[$j]->dpnaa;
                    $data_sementara->user_id = $diolah[$j]->user_id;
                    $data_sementara->keluarga = $diolah[$j]->keluarga;
                    $data_sementara->prodi = $diolah[$j]->prodi;
                    $data_sementara->jenis_kelamin = $diolah[$j]->jenis_kelamin;
                    // echo $j;
                    // echo count($diolah)-1;
                    // echo $j == count($diolah)-1;
                    if($j == count($diolah)-1 ){
                        $data_sementara->dpna_hasil = $data_sementara->dpnaa / 16;
                        array_push($data_akhir, $data_sementara);
                    }
                }
            }


        }
        // echo "\n\nData akhir:\n";
        // foreach ($data_akhir as $data_akhirr) {
        //     echo $data_akhirr->name;
        // }
        // $mahasiswa = User::get();
        // foreach($mahasiswa as $mhs){
        //     $id_mhs = $mhs->id;
        //     $data = NilaiPeriodik::selectRaw('count(id) as jlh_data','SUM(kehadiran + ukhuwah_islamiyah + ukhuwah_wathoniyah + fardu_kifayah + hafalan_doa + baca_quran + sholat_fardu + tilawatil_quran + dzikir + buku_harian) as total_nilai_akhir')->where('id_user', $id_mhs)->first();
        //     $rata_rata = $data->total_nilai_akhir / $data->jlh_data;
        // }
        // return $data_akhir;
        return view('koordinator.dpns.dpnaHome', compact('data_akhir', 'mahasiswa'));
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

        public function dpnaSortByKeluarga($keluarga)
    {
        // $user = $this->middleware('auth:admin');
        // // $eloquent = Mahasiswa::where(auth()->user()->keluarga)->get();
        // $mahasiswa = User::all();
        // // $mahasiswa = User::where('keluarga', auth()->user()->keluarga)->where('periode', auth()->user()->periode)->get();
        // // $nilaiPeriodik = NilaiPeriodik::all();
        // $dpna = NilaiPeriodik::where('pekan_ke', '<', 17)->get();
        // // $dpns1 = NilaiPeriodik::where('keluarga', auth()->user()->keluarga)->where('pekan_ke', '<', 5)->get();
        // return view('koordinator.dpns.dpnaHome', compact('mahasiswa', 'user', 'dpna'));
        // // return view('adminSekretaris.dpns1.index', compact('dpns1', 'mahasiswa', 'user'));

        // $nilaiPeriodik = NilaiPeriodik::where('keluarga', $keluarga)->get();
        // $data = DB::table('users')
        //     ->join('nilai_periodiks', 'users.user_id', '=', 'nilai_periodiks.id')
        //     ->select(['user.id', 'nilai_periodiks.keluarga'])
        //     ->get();
        // $mahasiswa = User::all();
        $data = DB::table('users')
        ->join('nilai_periodiks', 'users.id', '=', 'nilai_periodiks.user_id')
        ->select(['users.prodi', '=', $keluarga])
        ->get();

        $diolah = [];

        foreach ($data as $baris) {

        $objk= (object)[];
        $objk->name = $baris->name;
        $objk->user_id = (int)$baris->user_id;
        $objk->keluarga = (int)$baris->keluarga;
        $objk->prodi = $baris->prodi;

        //kalkulasi sholat
        $sholats = $baris->sholat_fardu;
            if (($sholats) > 32){
                $sholat = 100;
            } elseif (($sholats) > 28){
                $sholat = 90;
            }elseif (($sholats) > 25){
                $sholat = 80;
            }elseif (($sholats) > 21){
                $sholat = 70;
            }elseif (($sholats) > 18){
                $sholat = 60;
            }elseif (($sholats) > 14){
                $sholat = 50;
            }elseif (($sholats) > 11){
                $sholat = 40;
            }elseif (($sholats) > 7){
                $sholat = 30;
            }elseif (($sholats) > 4){
                $sholat = 20;
            }elseif (($sholats) > 0){
                $sholat = 10;
            }else{
                $sholat = 0;
            }

        // end kalkulasi sholat

        //kalkulasi dzikir
        $dzikirs =  $baris->dzikir;
            if (($dzikirs) > 105){
                $dzikir = 100;
            }elseif (($dzikirs) > 83){
                $dzikir = 80;
            }elseif (($dzikirs) > 62){
                $dzikir = 60;
            }elseif (($dzikirs) > 41){
                $dzikir = 40;
            }elseif (($dzikirs) > 20){
                $dzikir = 20;
            }elseif (($dzikirs) > 0){
                $dzikir = 10;
            }else{
                $dzikir = 0;
            }

        //end kalkulasi dzikir

        //kalkulasi tilawah
        $saritilawahs = $baris->tilawatil_quran;
            if (($saritilawahs) > 45){
                $saritilawah = 100;
            }elseif (($saritilawahs) > 40){
                $saritilawah = 90;
            }elseif (($saritilawahs) > 35){
                $saritilawah = 80;
            }elseif (($saritilawahs) > 30){
                $saritilawah = 70;
            }elseif (($saritilawahs) > 25){
                $saritilawah = 60;
            }elseif (($saritilawahs) > 20){
                $saritilawah = 50;
            }elseif (($saritilawahs) > 15){
                $saritilawah = 40;
            }elseif (($saritilawahs) > 5){
                $saritilawah = 20;
            }elseif (($saritilawahs) > 0){
                $saritilawah = 10;
            }else{
                $saritilawah = 0;
            }

        //end kalkulasi tilawah
        $kehadiran = (( $baris->kehadiran)*10/100);

        $ukhuwahIslamiyah = (($baris->ukhuwah_islamiyah)*10/100);
        $ukhuwahWathoniyah = (($baris->ukhuwah_wathoniyah)*10/100);

        $farduKifayah = (($baris->fardu_kifayah )*10/100);
        $hafalanDoa = (($baris->hafalan_doa)*10/100);
        $bacaQuran = (($baris->baca_quran)*10/100);

        $shlt = ($sholat*10/100);
        $tilawah = ($saritilawah*10/100);
        $dzikr = ($dzikir*10/100);

        $bukuHarian = (($baris->buku_harian)*10/100);

        $tugasTerstruktur = ($ukhuwahIslamiyah+$ukhuwahWathoniyah);
        $ujianKompetensi = ($farduKifayah+$hafalanDoa+$bacaQuran);
        $aktivitasHarian = ($shlt+$dzikr+$tilawah);
        $dpnaa = ($kehadiran+$tugasTerstruktur+$ujianKompetensi+$aktivitasHarian+$bukuHarian);

        $objk->dpnaa = $dpnaa;

        array_push($diolah, $objk);

        }

        usort($diolah,function($first,$second){
            return $first->user_id > $second->user_id;
        });

        $data_akhir = [];
        $data_sementara = (object)[];

        for ($j = 0; $j < count($diolah); $j++) {

        if($j == 0){
            $data_sementara->name = $diolah[$j]->name;
            $data_sementara->dpnaa = $diolah[$j]->dpnaa;
            $data_sementara->user_id = $diolah[$j]->user_id;
            $data_sementara->keluarga = $diolah[$j]->keluarga;
            $data_sementara->prodi = $diolah[$j]->prodi;

        } else {
            if($data_sementara->user_id == $diolah[$j]->user_id){
            $prev_dpna = $data_sementara->dpnaa;
            $data_sementara = (object)[];
            $data_sementara->name = $diolah[$j]->name;
            $data_sementara->dpnaa = $diolah[$j]->dpnaa + $prev_dpna;
            $data_sementara->user_id = $diolah[$j]->user_id;
            $data_sementara->keluarga = $diolah[$j]->keluarga;
            $data_sementara->prodi = $diolah[$j]->prodi;

            } else {
            $data_sementara->dpna_hasil = $data_sementara->dpnaa / 16;
            array_push($data_akhir, $data_sementara);
            $data_sementara = (object)[];
            $data_sementara->name = $diolah[$j]->name;
            $data_sementara->dpnaa = $diolah[$j]->dpnaa;
            $data_sementara->user_id = $diolah[$j]->user_id;
            $data_sementara->keluarga = $diolah[$j]->keluarga;
            $data_sementara->prodi = $diolah[$j]->prodi;
            }
        }
        }

        // $mahasiswa = User::get();
        // foreach($mahasiswa as $mhs){
        //     $id_mhs = $mhs->id;
        //     $data = NilaiPeriodik::selectRaw('count(id) as jlh_data','SUM(kehadiran + ukhuwah_islamiyah + ukhuwah_wathoniyah + fardu_kifayah + hafalan_doa + baca_quran + sholat_fardu + tilawatil_quran + dzikir + buku_harian) as total_nilai_akhir')->where('id_user', $id_mhs)->first();
        //     $rata_rata = $data->total_nilai_akhir / $data->jlh_data;
        // }
        // return $data_akhir;
        return view('koordinator.dpns.dpnaHome', compact('data_akhir', 'mahasiswa'));
    }

    public function apiStore(Request $request){
        $this->validate($request, [
            'nama' => 'required',
            'nim' => 'required',
            'email' => 'required',
            'jenis_kelamin' => 'required',
            'prodi' => 'required',
            'fakultas' => 'required',
            'no_hp' => 'required',
            'keluarga' => 'required',
            'foto' => 'required',
            'periode' => 'required',
            'role' => 'required',
            'password' => 'required',
        ]);
        $name = $request->input('name');
        $nim = $request->input('nim');
        $email = $request->input('email');
        $jenis_kelamin = $request->input('jenis_kelamin');
        $prodi = $request->input('prodi');
        $fakultas = $request->input('fakultas');
        $no_hp = $request->input('no_hp');
        $keluarga = $request->input('keluarga');
        $foto = $request->input('foto');
        $periode = $request->input('periode');
        $role = $request->input('role');
        $password = $request->input('password');

        $user = new User ([
            'name' => $name,
            'nim' => $nim,
            'email' => $email,
            'jenis_kelamin' => $jenis_kelamin,
            'prodi' => $prodi,
            'fakultas' => $fakultas,
            'no_hp' => $no_hp,
            'keluarga' => $keluarga,
            'foto' => $foto,
            'periode' => $periode,
            'role' => $role,
            'password' => bcrypt($password),
        ]);
        if ($user->save()) {
            $user->signin = [
                'href' => 'api/v1/user/signin',
                'method' => 'POST',
                'params' => 'email, password'
            ];
            $response = [
                'msg' => 'User created',
                'user' => $user
            ];
            return response()->json($response);
        }
        $response = [
            'msg' => 'error'
        ];
        return response()->json($response);
    }
}

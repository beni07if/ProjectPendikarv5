<?php

namespace App\Http\Controllers;

use App\NilaiPeriodik;
use App\Mahasiswa;
use App\User;
use DB;


use Illuminate\Http\Request;

class ApiController extends Controller
{
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

    // untuk menjalankan ini matikan  contruct auth
    public function testApiNP()
    {
        $nilaiPeriodik = NilaiPeriodik::all();
        return $nilaiPeriodik;
    }
    // untuk menjalankan ini matikan contruct auth/


    public function ApiDpnaPendikar()
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
        $mhs_tak_ada_nilai = [];

        foreach ($mahasiswa as $mhs) {
            $ada = false;
            foreach ($data as $dt) {
                if ($mhs->name == $dt->name) {
                    $ada = true;
                }
            }
            if (!$ada) {
                $objk = (object)[];
                $objk->name = $mhs->name;
                $objk->nim = $mhs->nim;
                // $objk->user_id = (int)$mhs->user_id;
                $objk->keluarga = (int)$mhs->keluarga;
                $objk->prodi = $mhs->prodi;
                $objk->jenis_kelamin = $mhs->jenis_kelamin;
                $objk->dpna_hasil = 0;
                array_push($mhs_tak_ada_nilai, $objk);
            }
        }
        $diolah = [];

        foreach ($data as $baris) {
            // echo $baris->name;
            $objk = (object)[];
            $objk->name = $baris->name;
            $objk->nim = $baris->nim;
            $objk->user_id = (int)$baris->user_id;
            $objk->keluarga = (int)$baris->keluarga;
            $objk->prodi = $baris->prodi;
            $objk->jenis_kelamin = $baris->jenis_kelamin;

            //kalkulasi sholat
            $sholats = $baris->sholat_fardu;
            if (($sholats) > 32) {
                $sholat = 100;
            } elseif (($sholats) > 28) {
                $sholat = 90;
            } elseif (($sholats) > 25) {
                $sholat = 80;
            } elseif (($sholats) > 21) {
                $sholat = 70;
            } elseif (($sholats) > 18) {
                $sholat = 60;
            } elseif (($sholats) > 14) {
                $sholat = 50;
            } elseif (($sholats) > 11) {
                $sholat = 40;
            } elseif (($sholats) > 7) {
                $sholat = 30;
            } elseif (($sholats) > 4) {
                $sholat = 20;
            } elseif (($sholats) > 0) {
                $sholat = 10;
            } else {
                $sholat = 0;
            }

            // end kalkulasi sholat

            //kalkulasi dzikir
            $dzikirs =  $baris->dzikir;
            if (($dzikirs) > 105) {
                $dzikir = 100;
            } elseif (($dzikirs) > 83) {
                $dzikir = 80;
            } elseif (($dzikirs) > 62) {
                $dzikir = 60;
            } elseif (($dzikirs) > 41) {
                $dzikir = 40;
            } elseif (($dzikirs) > 20) {
                $dzikir = 20;
            } elseif (($dzikirs) > 0) {
                $dzikir = 10;
            } else {
                $dzikir = 0;
            }

            //end kalkulasi dzikir

            // $jenisKelamin = $objk->jenis_kelamin;
            // if (($jenisKelamin) = 'laki-laki'){

            // }
            //kalkulasi tilawah
            $saritilawahs = $baris->tilawatil_quran;
            if (($saritilawahs) > 45) {
                $saritilawah = 100;
            } elseif (($saritilawahs) > 40) {
                $saritilawah = 90;
            } elseif (($saritilawahs) > 35) {
                $saritilawah = 80;
            } elseif (($saritilawahs) > 30) {
                $saritilawah = 70;
            } elseif (($saritilawahs) > 25) {
                $saritilawah = 60;
            } elseif (($saritilawahs) > 20) {
                $saritilawah = 50;
            } elseif (($saritilawahs) > 15) {
                $saritilawah = 40;
            } elseif (($saritilawahs) > 5) {
                $saritilawah = 20;
            } elseif (($saritilawahs) > 0) {
                $saritilawah = 10;
            } else {
                $saritilawah = 0;
            }
            //end kalkulasi tilawah
            $kehadiran = (($baris->kehadiran) * 10 / 100);

            $ukhuwahIslamiyah = (($baris->ukhuwah_islamiyah) * 10 / 100);
            $ukhuwahWathoniyah = (($baris->ukhuwah_wathoniyah) * 10 / 100);

            $farduKifayah = (($baris->fardu_kifayah) * 10 / 100);
            $hafalanDoa = (($baris->hafalan_doa) * 10 / 100);
            $bacaQuran = (($baris->baca_quran) * 10 / 100);

            $shlt = ($sholat * 10 / 100);
            $tilawah = ($saritilawah * 10 / 100);
            $dzikr = ($dzikir * 10 / 100);

            $bukuHarian = (($baris->buku_harian) * 10 / 100);

            $tugasTerstruktur = ($ukhuwahIslamiyah + $ukhuwahWathoniyah);
            $ujianKompetensi = ($farduKifayah + $hafalanDoa + $bacaQuran);
            $aktivitasHarian = ($shlt + $dzikr + $tilawah);
            $dpnaa = ($kehadiran + $tugasTerstruktur + $ujianKompetensi + $aktivitasHarian + $bukuHarian);

            $objk->dpnaa = $dpnaa;

            array_push($diolah, $objk);

            // $diolah[] = $objk;
            // echo ($i>0&& $i<$banyak_nilai ?',':'').json_encode($objk);

        }

        usort($diolah, function ($first, $second) {
            return $first->user_id > $second->user_id;
        });

        $data_akhir = [];
        $data_sementara = (object)[];

        for ($j = 0; $j < count($diolah); $j++) {
            // echo count($diolah);
            // echo $diolah[$j]->name;
            if ($j == 0) {
                $data_sementara->name = $diolah[$j]->name;
                $data_sementara->nim = $diolah[$j]->nim;
                $data_sementara->dpnaa = $diolah[$j]->dpnaa;
                $data_sementara->user_id = $diolah[$j]->user_id;
                $data_sementara->keluarga = $diolah[$j]->keluarga;
                $data_sementara->prodi = $diolah[$j]->prodi;
                $data_sementara->jenis_kelamin = $diolah[$j]->jenis_kelamin;
            } else {


                if ($data_sementara->user_id == $diolah[$j]->user_id) {
                    $prev_dpna = $data_sementara->dpnaa;
                    $data_sementara = (object)[];
                    $data_sementara->name = $diolah[$j]->name;
                    $data_sementara->nim = $diolah[$j]->nim;
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
                    $data_sementara->nim = $diolah[$j]->nim;
                    $data_sementara->dpnaa = $diolah[$j]->dpnaa;
                    $data_sementara->user_id = $diolah[$j]->user_id;
                    $data_sementara->keluarga = $diolah[$j]->keluarga;
                    $data_sementara->prodi = $diolah[$j]->prodi;
                    $data_sementara->jenis_kelamin = $diolah[$j]->jenis_kelamin;
                    // echo $j;
                    // echo count($diolah)-1;
                    // echo $j == count($diolah)-1;
                    if ($j == count($diolah) - 1) {
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
        // return view('koordinator.dpns.dpnaHome', compact('data_akhir', 'mahasiswa'));
        return array_merge($data_akhir, $mhs_tak_ada_nilai);
    }

    public function ApiDpnaPendikarProdi($prodi)
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
            ->where('users.prodi', $prodi)
            ->get();
        $mahasiswa = DB::table('users')
            ->select('*')
            ->where('prodi', $prodi)
            ->get();

        $mhs_tak_ada_nilai = [];

        foreach ($mahasiswa as $mhs) {
            $ada = false;
            foreach ($data as $dt) {
                if ($mhs->name == $dt->name) {
                    $ada = true;
                }
            }
            if (!$ada) {
                $objk = (object)[];
                $objk->name = $mhs->name;
                $objk->nim = $mhs->nim;
                // $objk->user_id = (int)$mhs->user_id;
                $objk->keluarga = (int)$mhs->keluarga;
                $objk->prodi = $mhs->prodi;
                $objk->jenis_kelamin = $mhs->jenis_kelamin;
                $objk->dpna_hasil = 0;
                array_push($mhs_tak_ada_nilai, $objk);
            }
        }

        // echo $diolah;
        // foreach ($mhs_tak_ada_nilai as $mhs) {
        //     echo $mhs->name;
        //     echo "\n";
        // }
        // echo $prodi;
        // echo "\n";
        // echo $mahasiswa;
        // echo "\n";
        // echo $data;
        // echo "\n";

        $diolah = [];

        foreach ($data as $baris) {
            // echo $baris->name;
            $objk = (object)[];
            $objk->name = $baris->name;
            $objk->nim = $baris->nim;
            $objk->user_id = (int)$baris->user_id;
            $objk->keluarga = (int)$baris->keluarga;
            $objk->prodi = $baris->prodi;
            $objk->jenis_kelamin = $baris->jenis_kelamin;

            //kalkulasi sholat
            $sholats = $baris->sholat_fardu;
            if (($sholats) > 32) {
                $sholat = 100;
            } elseif (($sholats) > 28) {
                $sholat = 90;
            } elseif (($sholats) > 25) {
                $sholat = 80;
            } elseif (($sholats) > 21) {
                $sholat = 70;
            } elseif (($sholats) > 18) {
                $sholat = 60;
            } elseif (($sholats) > 14) {
                $sholat = 50;
            } elseif (($sholats) > 11) {
                $sholat = 40;
            } elseif (($sholats) > 7) {
                $sholat = 30;
            } elseif (($sholats) > 4) {
                $sholat = 20;
            } elseif (($sholats) > 0) {
                $sholat = 10;
            } else {
                $sholat = 0;
            }

            // end kalkulasi sholat

            //kalkulasi dzikir
            $dzikirs =  $baris->dzikir;
            if (($dzikirs) > 105) {
                $dzikir = 100;
            } elseif (($dzikirs) > 83) {
                $dzikir = 80;
            } elseif (($dzikirs) > 62) {
                $dzikir = 60;
            } elseif (($dzikirs) > 41) {
                $dzikir = 40;
            } elseif (($dzikirs) > 20) {
                $dzikir = 20;
            } elseif (($dzikirs) > 0) {
                $dzikir = 10;
            } else {
                $dzikir = 0;
            }

            //end kalkulasi dzikir

            // $jenisKelamin = $objk->jenis_kelamin;
            // if (($jenisKelamin) = 'laki-laki'){

            // }
            //kalkulasi tilawah
            $saritilawahs = $baris->tilawatil_quran;
            if (($saritilawahs) > 45) {
                $saritilawah = 100;
            } elseif (($saritilawahs) > 40) {
                $saritilawah = 90;
            } elseif (($saritilawahs) > 35) {
                $saritilawah = 80;
            } elseif (($saritilawahs) > 30) {
                $saritilawah = 70;
            } elseif (($saritilawahs) > 25) {
                $saritilawah = 60;
            } elseif (($saritilawahs) > 20) {
                $saritilawah = 50;
            } elseif (($saritilawahs) > 15) {
                $saritilawah = 40;
            } elseif (($saritilawahs) > 5) {
                $saritilawah = 20;
            } elseif (($saritilawahs) > 0) {
                $saritilawah = 10;
            } else {
                $saritilawah = 0;
            }
            //end kalkulasi tilawah
            $kehadiran = (($baris->kehadiran) * 10 / 100);

            $ukhuwahIslamiyah = (($baris->ukhuwah_islamiyah) * 10 / 100);
            $ukhuwahWathoniyah = (($baris->ukhuwah_wathoniyah) * 10 / 100);

            $farduKifayah = (($baris->fardu_kifayah) * 10 / 100);
            $hafalanDoa = (($baris->hafalan_doa) * 10 / 100);
            $bacaQuran = (($baris->baca_quran) * 10 / 100);

            $shlt = ($sholat * 10 / 100);
            $tilawah = ($saritilawah * 10 / 100);
            $dzikr = ($dzikir * 10 / 100);

            $bukuHarian = (($baris->buku_harian) * 10 / 100);

            $tugasTerstruktur = ($ukhuwahIslamiyah + $ukhuwahWathoniyah);
            $ujianKompetensi = ($farduKifayah + $hafalanDoa + $bacaQuran);
            $aktivitasHarian = ($shlt + $dzikr + $tilawah);
            $dpnaa = ($kehadiran + $tugasTerstruktur + $ujianKompetensi + $aktivitasHarian + $bukuHarian);

            $objk->dpnaa = $dpnaa;

            array_push($diolah, $objk);

            // $diolah[] = $objk;
            // echo ($i>0&& $i<$banyak_nilai ?',':'').json_encode($objk);

        }

        usort($diolah, function ($first, $second) {
            return $first->user_id > $second->user_id;
        });

        // echo $diolah;
        // foreach ($diolah as $diolahh) {
        //     echo $diolahh->name;
        //     echo "\n";
        // }
        $data_akhir = [];
        $data_sementara = (object)[];

        for ($j = 0; $j < count($diolah); $j++) {
            // echo count($diolah);
            // echo "\n";
            // echo $diolah[$j]->name;
            // echo "\n";

            if ($j == 0) {
                echo "count 0\n";
                $data_sementara->name = $diolah[$j]->name;
                $data_sementara->nim = $diolah[$j]->nim;
                $data_sementara->dpnaa = $diolah[$j]->dpnaa;
                $data_sementara->user_id = $diolah[$j]->user_id;
                $data_sementara->keluarga = $diolah[$j]->keluarga;
                $data_sementara->prodi = $diolah[$j]->prodi;
                $data_sementara->jenis_kelamin = $diolah[$j]->jenis_kelamin;
            } else {


                if ($data_sementara->user_id == $diolah[$j]->user_id) {
                    $prev_dpna = $data_sementara->dpnaa;
                    $data_sementara = (object)[];
                    $data_sementara->name = $diolah[$j]->name;
                    $data_sementara->nim = $diolah[$j]->nim;
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
                    $data_sementara->nim = $diolah[$j]->nim;
                    $data_sementara->dpnaa = $diolah[$j]->dpnaa;
                    $data_sementara->user_id = $diolah[$j]->user_id;
                    $data_sementara->keluarga = $diolah[$j]->keluarga;
                    $data_sementara->prodi = $diolah[$j]->prodi;
                    $data_sementara->jenis_kelamin = $diolah[$j]->jenis_kelamin;
                }
            }
            // echo $j;
            // echo count($diolah) - 1;
            // echo $j == count($diolah) - 1;
            if ($j == count($diolah) - 1) {
                // echo "ketringger";
                $data_sementara->dpna_hasil = $data_sementara->dpnaa / 16;
                array_push($data_akhir, $data_sementara);
            }
        }
        echo "\n\nData akhir:\n";
        foreach ($data_akhir as $data_akhirr) {
            echo $data_akhirr->name;
        }
        // $mahasiswa = User::get();
        // foreach($mahasiswa as $mhs){
        //     $id_mhs = $mhs->id;
        //     $data = NilaiPeriodik::selectRaw('count(id) as jlh_data','SUM(kehadiran + ukhuwah_islamiyah + ukhuwah_wathoniyah + fardu_kifayah + hafalan_doa + baca_quran + sholat_fardu + tilawatil_quran + dzikir + buku_harian) as total_nilai_akhir')->where('id_user', $id_mhs)->first();
        //     $rata_rata = $data->total_nilai_akhir / $data->jlh_data;
        // }
        // return $data_akhir;
        // return view('koordinator.dpns.dpnaHome', compact('data_akhir', 'mahasiswa'));
        return array_merge($data_akhir, $mhs_tak_ada_nilai);
    }
}

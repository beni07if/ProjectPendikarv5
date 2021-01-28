@extends('layouts.masterKoordinator')

@section('navbarTitle2')
<a href="#" class="nav-link">DPNS 3</a>
@endsection

@section('breadcrumb')
<a href="#" class="nav-link">Sistem Penilaian Pendikar / DPNS 3</a>
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{--  <h1>DPNS 1</h1>  --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('mahasiswa.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">DPNS 3</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @foreach($mahasiswa as $mhs)
                        <h3 class="card-title">{{$mhs->name}} ( {{$mhs->nim}} )</h3>
                        @endforeach
                        {{--  <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>  --}}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th> No </th>
                                    {{--  <th> Nama </th>  --}}
                                    <th>Kehadiran</th>
                                    <th>Tugas Terstruktur</th>
                                    <th>Ujian Kompetensi</th>
                                    <th>Aktivitas Harian</th>
                                    <th>Buku Harian</th>
                                    <th>Tanggal </th>
                                    <th>NP </th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;?>

                                {{-- @for ($i = 0; $i < 10; $i++) --}}

                                @if (Auth::check())
                                @foreach($mahasiswa as $mhs)
                                @foreach($mhs->NilaiPeriodik as $nPeriodik)
                                <?php
                                $no++;
                                                                            //kalkulasi sholat
                                                                            $sholats = $nPeriodik->sholat_fardu;
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
                                                                            $dzikirs = $nPeriodik->dzikir;
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
                                                                            $saritilawahs = $nPeriodik->tilawatil_quran;
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
                                                                            $kehadiran = (($nPeriodik->kehadiran)*10/100);

                                                                            $ukhuwahIslamiyah = (($nPeriodik->ukhuwah_islamiyah)*10/100);
                                                                            $ukhuwahWathoniyah = (($nPeriodik->ukhuwah_wathoniyah)*10/100);

                                                                            $farduKifayah = (($nPeriodik->fardu_kifayah)*10/100);
                                                                            $hafalanDoa = (($nPeriodik->hafalan_doa)*10/100);
                                                                            $bacaQuran = (($nPeriodik->baca_quran)*10/100);

                                                                            $shlt = ($sholat*10/100);
                                                                            $tilawah = ($saritilawah*10/100);
                                                                            $dzikr = ($dzikir*10/100);

                                                                            $bukuHarian = (($nPeriodik->buku_harian)*10/100);

                                                                            $tugasTerstruktur = ($ukhuwahIslamiyah+$ukhuwahWathoniyah);
                                                                            $ujianKompetensi = ($farduKifayah+$hafalanDoa+$bacaQuran);
                                                                            $aktivitasHarian = ($shlt+$dzikr+$tilawah);
                                                                            $dpns3 = ($kehadiran+$tugasTerstruktur+$ujianKompetensi+$aktivitasHarian+$bukuHarian);
                                                                            ?>
                                <tr>
                                    <td>{{ $no }}({{$nPeriodik->id}})</td>
                                    {{--  <td>{{ $mhs->name }}</td> --}}
                                    <td>{{ $kehadiran }}</td>
                                    <td>{{ $tugasTerstruktur }}</td>
                                    <td>{{ number_format($ujianKompetensi,2) }}</td>
                                    <td>{{ number_format($aktivitasHarian,2) }}</td>
                                    <td>{{ $bukuHarian }}</td>
                                    <td>{{ $nPeriodik->tanggal }}</td>
                                    <td>{{ $dpns3 }}</td>
                                    <td>
                                        <a href="{{ route('detailNPDpna', $nPeriodik->id) }}"
                                            class="btn btn-info">Detail</a>
                                        @if(session()->get('success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('success') }}
                                        </div><br />
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                @endforeach
                                @endif
                                {{-- @endfor --}}
                            </tbody>
                        </table>
                        <div class="card-header">
                            <?php $dpns33Hasil = 0; ?>
                            @if (Auth::check())
                            @foreach($mahasiswa as $mhs)
                            @foreach($mhs->NilaiPeriodik as $nPeriodik)
                            <?php
                                                                                //kalkulasi sholat
                                                                                $sholats = $nPeriodik->sholat_fardu;
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
                                                                                $dzikirs = $nPeriodik->dzikir;
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
                                                                                $saritilawahs = $nPeriodik->tilawatil_quran;
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
                                                                                $kehadiran = (($nPeriodik->kehadiran)*10/100);

                                                                                $ukhuwahIslamiyah = (($nPeriodik->ukhuwah_islamiyah)*10/100);
                                                                                $ukhuwahWathoniyah = (($nPeriodik->ukhuwah_wathoniyah)*10/100);

                                                                                $farduKifayah = (($nPeriodik->fardu_kifayah)*10/100);
                                                                                $hafalanDoa = (($nPeriodik->hafalan_doa)*10/100);
                                                                                $bacaQuran = (($nPeriodik->baca_quran)*10/100);

                                                                                $shlt = ($sholat*10/100);
                                                                                $tilawah = ($saritilawah*10/100);
                                                                                $dzikr = ($dzikir*10/100);

                                                                                $bukuHarian = (($nPeriodik->buku_harian)*10/100);

                                                                                $tugasTerstruktur = ($ukhuwahIslamiyah+$ukhuwahWathoniyah);
                                                                                $ujianKompetensi = ($farduKifayah+$hafalanDoa+$bacaQuran);
                                                                                $aktivitasHarian = ($shlt+$dzikr+$tilawah);
                                                                                $dpns33 = ($kehadiran+$tugasTerstruktur+$ujianKompetensi+$aktivitasHarian+$bukuHarian);
                                                                                $dpns33Hasil += $dpns33;
                                                                                ?>
                            @endforeach
                            @endforeach
                            @endif
                            <b>DPNS 3</b> <a class="float-right text-muted">{{ number_format($dpns33Hasil,2) }} | {{ number_format($dpns33Hasil,2)/12 }}</a>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

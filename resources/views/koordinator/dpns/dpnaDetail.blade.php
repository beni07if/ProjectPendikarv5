@extends('layouts.masterKoordinator')

@section('navbarTitle2')
<a href="#" class="nav-link">DPNA</a>
@endsection

@section('breadcrumb')
<a href="#" class="nav-link">Sistem Penilaian Pendikar / DPNA</a>
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{--  <h1>DPNA</h1>  --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('mahasiswa.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">DPNA</li>
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
                                                                            $dpna = ($kehadiran+$tugasTerstruktur+$ujianKompetensi+$aktivitasHarian+$bukuHarian);
                                                                            ?>
                                <tr>
                                    <td>{{ $no }} ({{$nPeriodik->id}})</td>
                                    {{--  <td>{{ $mhs->name }}</td>  --}}
                                    <td>{{ $kehadiran }}</td>
                                    <td>{{ $tugasTerstruktur }}</td>
                                    <td>{{ number_format($ujianKompetensi,2) }}</td>
                                    <td>{{ number_format($aktivitasHarian,2) }}</td>
                                    <td>{{ $bukuHarian }}</td>
                                    <td>{{ $nPeriodik->tanggal }}</td>
                                    <td>{{ $dpna }}</td>
                                    <td>
                                            <a href="{{ route('detailNPDpna', $nPeriodik->id) }}" class="btn btn-info">Detail</a>
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
                                                                                $dpnaa = ($kehadiran+$tugasTerstruktur+$ujianKompetensi+$aktivitasHarian+$bukuHarian);
                                                                                ?>
    @endforeach
    @endforeach
    @endif
    <b>DPNA</b> <a class="float-right text-muted">{{ number_format($dpnaa,2) }} | {{ number_format($dpnaa,2)/16 }}</a>
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


<!-- tambah rilis -->
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Nilai Periodik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- form start -->
                <form method="POST" action="{{ route('nilaiPeriodik.store') }} ">
                    @csrf
                    <div class="form-group row">
                        <label for="mahasiswa_id" class="col-md-2 col-form-label text-md-left">{{ __('Nama') }}</label>

                        <div class="col-md-4">
                            <select class="form-control select2" required="Minimal 0" name="user_id"
                                style="width: 100%;">
                                {{--  @if(count($nilaiPeriodik) > 0)
                                @foreach($nilaiPeriodik as $nPeriodik)
                                <option value="{{ $nPeriodik->baca_quran }}">{{ $nPeriodik->baca_quran }}</option>
                                @endforeach
                                @else
                                @endif --}}

                                @if (Auth::check())
                                @foreach($mahasiswa as $mahasiswa)
                                <option value="{{ $mahasiswa->id }}">{{ $mahasiswa->name }}</option>
                                {{--  @endif  --}}
                                @endforeach
                                @endif

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keluarga" class="col-md-2 col-form-label text-md-left">{{ __('Keluarga') }}</label>

                        <div class="col-md-4">
                            @if (Auth::check())
                            <input type="text" class="form-control" id="keluarga" value="{{ Auth::user()->keluarga }}"
                                name="keluarga" required placeholder="Masukan Keluarga.." readonly>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="pekan_ke"
                            class="col-md-2 col-form-label text-md-left">{{ __('Pertemuan Ke') }}</label>
                        <div class="col-md-4">
                            <select class="form-control select2" required="Minimal 0" name="pekan_ke"
                                style="width: 100%;">
                                <option selected="selected" value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal" class="col-md-2 col-form-label text-md-left">{{ __('Tanggal') }}</label>

                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                {{--  <input type="date" required="Minimal 0" name="tanggal" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>  --}}
                                <input type="date" required="Minimal 0" name="tanggal" class="form-control"
                                    value=date_default_timezone_set('Asia/Jakarta'); echo date('d-m-Y H:i:s');>

                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="card-body">
                        <h5>Kehadiran</h5>
                        <div class="form-group row">
                            <label for="kehadiran"
                                class="col-md-4 col-form-label text-md-right">{{ __('Kehadiran') }}</label>

                            <div class="col-md-6">
                                <select class="form-control select2" required="Minimal 0" name="kehadiran"
                                    style="width: 100%;">
                                    <option selected="selected" value="0">Tidak Hadir</option>
                                    <option value="10">Hadir</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.row -->

                        <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-body">
                        <h5>Tugas Terstruktur</h5>
                        <div class="form-group row">
                            <label for="ukhuwah_islamiyah"
                                class="col-md-4 col-form-label text-md-right">{{ __('Ukhuwah Islamiyah') }}</label>

                            <div class="col-md-6">
                                <select class="form-control select2" required="Minimal 0" name="ukhuwah_islamiyah"
                                    style="width: 100%;">
                                    <option selected="selected" value="0">Tidak Hadir</option>
                                    <option value="10">Hadir</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.row -->
                        <div class="form-group row">
                            <label for="ukhuwah_wathoniyah"
                                class="col-md-4 col-form-label text-md-right">{{ __('Ukhuwah Wathoniyah') }}</label>

                            <div class="col-md-6">
                                <select class="form-control select2" required="Minimal 0" name="ukhuwah_wathoniyah"
                                    style="width: 100%;">
                                    <option selected="selected" value="0">Tidak Hadir</option>
                                    <option value="10">Hadir</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.row -->

                        <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-body">
                        <h5>Ujian Kompetensi</h5>
                        <div class="form-group row">
                            <label for="hafalan_doa"
                                class="col-md-4 col-form-label text-md-right">{{ __('Hafalan Doa Sholat') }}</label>

                            <div class="col-md-6">
                                <select class="form-control select2" required="Minimal 0" name="hafalan_doa"
                                    style="width: 100%;">
                                    <option selected="selected" value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                    <option value="50">50</option>
                                    <option value="60">60</option>
                                    <option value="70">70</option>
                                    <option value="80">80</option>
                                    <option value="90">90</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.row -->
                        <div class="form-group row">
                            <label for="fardu_kifayah"
                                class="col-md-4 col-form-label text-md-right">{{ __('Fardu Kifayah') }}</label>

                            <div class="col-md-6">
                                <select class="form-control select2" required="Minimal 0" name="fardu_kifayah"
                                    style="width: 100%;">
                                    <option selected="selected" value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                    <option value="50">50</option>
                                    <option value="60">60</option>
                                    <option value="70">70</option>
                                    <option value="80">80</option>
                                    <option value="90">90</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.row -->
                        <div class="form-group row">
                            <label for="baca_quran"
                                class="col-md-4 col-form-label text-md-right">{{ __('Baca Al-Quran') }}</label>

                            <div class="col-md-6">
                                <select class="form-control select2" required="Minimal 0" name="baca_quran" value="10"
                                    style="width: 100%;">
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                    <option value="50">50</option>
                                    <option value="60">60</option>
                                    <option value="70">70</option>
                                    <option value="80">80</option>
                                    <option value="90">90</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.row -->

                        <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-body">
                        <h5>Aktivitas Harian</h5>
                        <div class="form-group row">
                            <label for="sholat_fardu"
                                class="col-md-4 col-form-label text-md-right">{{ __('Sholat Fardhu') }}</label>

                            <div class="col-md-6">
                                <select class="form-control select2" required="Minimal 0" name="sholat_fardu"
                                    style="width: 100%;">
                                    <option selected="selected" value="1">1</option>
                                    <option value="1">2</option>
                                    <option value="2">3</option>
                                    <option value="3">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                    <option value="32">32</option>
                                    <option value="33">33</option>
                                    <option value="34">34</option>
                                    <option value="35">35</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.row -->
                        <div class="form-group row">
                            <label for="tilawatil_quran"
                                class="col-md-4 col-form-label text-md-right">{{ __('Tilawatil Quran') }}</label>

                            <div class="col-md-6">
                                <input type="integer" class="form-control" id="tilawatil_quran" required="Minimal 0"
                                    name="tilawatil_quran" placeholder="Halaman Terakhir">
                            </div>
                        </div>
                        <!-- /.row -->
                        <div class="form-group row">
                            <label for="dzikir" class="col-md-4 col-form-label text-md-right">{{ __('dzikir') }}</label>

                            <div class="col-md-6">
                                <input type="integer" required="Minimal 0" name="dzikir" class="form-control"
                                    id="dzikir" placeholder="Total Dzikir">
                            </div>
                        </div>
                        <!-- /.row -->
                        <!-- /.row -->
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <h5>Buku Harian</h5>
                        <div class="form-group row">
                            <label for="buku_harian"
                                class="col-md-4 col-form-label text-md-right">{{ __('Buku Harian') }}</label>

                            <div class="col-md-6">
                                <select class="form-control select2" required="Minimal 0" name="buku_harian"
                                    style="width: 100%;">
                                    <option selected="selected" value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                    <option value="50">50</option>
                                    <option value="60">60</option>
                                    <option value="70">70</option>
                                    <option value="80">80</option>
                                    <option value="90">90</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.row -->

                        <!-- /.row -->
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    <!-- /.card-body -->

                </form>
            </div>
            <!-- <div class="modal-footer">

        </div> -->
        </div>
    </div>
</div>

@extends('layouts.masterKoordinator')

@section('navbarTitle2')
<a href="#" class="nav-link">DPNS 2</a>
@endsection

@section('breadcrumb')
<a href="#" class="nav-link">Sistem Penilaian Pendikar / DPNS 2</a>
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{--  <h1>DPNS 2</h1>  --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('mahasiswa.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">DPNS 2</li>
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
                                                      //kalkulasi sholat
                                                                       $sholat = $nPeriodik->sholat_fardu;
                                                                    if (($sholat) > 32)
                                                                        $sholat = 100;
                                                                    elseif (($sholat) > 28)
                                                                    $sholat = 90;
                                                                    elseif (($sholat) > 25)
                                                                    $sholat = 80;
                                                                    elseif (($sholat) > 21)
                                                                    $sholat = 70;
                                                                    elseif (($sholat) > 18)
                                                                    $sholat = 60;
                                                                    elseif (($sholat) > 14)
                                                                    $sholat = 50;
                                                                    elseif (($sholat) > 11)
                                                                    $sholat = 40;
                                                                    elseif (($sholat) > 7)
                                                                    $sholat = 30;
                                                                    elseif (($sholat) > 4)
                                                                    $sholat = 20;
                                                                    elseif (($sholat) > 0)
                                                                    $sholat = 10;
                                                                    else
                                                                    $sholat = 0;
                                                        // end kalkulasi sholat

                                                        //kalkulasi dzikir
                                                                    $dzikir = $nPeriodik->dzikir;
                                                                    if (($dzikir) > 105)
                                                                        $dzikir = 100;
                                                                    elseif (($dzikir) > 83)
                                                                    $dzikir = 80;
                                                                    elseif (($dzikir) > 62)
                                                                    $dzikir = 60;
                                                                    elseif (($dzikir) > 41)
                                                                    $dzikir = 40;
                                                                    elseif (($dzikir) > 20)
                                                                    $dzikir = 20;
                                                                    elseif (($dzikir) > 0)
                                                                    $dzikir = 10;
                                                                    else
                                                                    $dzikir = 0;
                                                        //end kalkulasi dzikir

                                                        //kalkulasi tilawah
                                                        $saritilawah = $nPeriodik->tilawatil_quran;
                                                        if (($saritilawah) > 45)
                                                            $saritilawah = 100;
                                                        elseif (($saritilawah) > 40)
                                                        $saritilawah = 90;
                                                        elseif (($saritilawah) > 35)
                                                        $saritilawah = 80;
                                                        elseif (($saritilawah) > 30)
                                                        $saritilawah = 70;
                                                        elseif (($saritilawah) > 25)
                                                        $saritilawah = 60;
                                                        elseif (($saritilawah) > 20)
                                                        $saritilawah = 50;
                                                        elseif (($saritilawah) > 15)
                                                        $saritilawah = 40;
                                                        elseif (($saritilawah) > 5)
                                                        $saritilawah = 20;
                                                        elseif (($saritilawah) > 0)
                                                        $saritilawah = 10;
                                                        else
                                                        $saritilawah = 0;
                                                        //end kalkulasi tilawah
                                                                ?>
                                <?php $no++;
                                                                       $tugasTerstruktur = (($nPeriodik->ukhuwah_islamiyah)+($nPeriodik->ukhuwah_wathoniyah))/2;
                                                                       $ujianKompetensi = (($nPeriodik->fardu_kifayah)+($nPeriodik->hafalan_doa)+($nPeriodik->baca_quran))/3;
                                                                       $aktivitasHarian = (($sholat)+($nPeriodik->dzikir)+($nPeriodik->tilawatil_quran))/3;
                                                                       ?>
                                <tr>
                                    <td>{{ $no }}</td>
                                    {{--  <td>{{ $mhs->name }}</td>  --}}
                                    <td>{{ $nPeriodik->kehadiran }}</td>
                                    <td>{{ $tugasTerstruktur }}</td>
                                    <td>{{ number_format($ujianKompetensi,2) }}</td>
                                    <td>{{ number_format($aktivitasHarian,2) }}</td>
                                    <td>{{ $nPeriodik->buku_harian }}</td>
                                    <td>{{ $nPeriodik->tanggal }}</td>
                                    <td>
                                            <a href="{{ route('dpns1HomeKoordinator') }}" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-sm">Detail</a>
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
                                     $sholat = $nPeriodik->sholat_fardu;
                                  if (($sholat) > 32)
                                      $sholat = 100;
                                  elseif (($sholat) > 28)
                                  $sholat = 90;
                                  elseif (($sholat) > 25)
                                  $sholat = 80;
                                  elseif (($sholat) > 21)
                                  $sholat = 70;
                                  elseif (($sholat) > 18)
                                  $sholat = 60;
                                  elseif (($sholat) > 14)
                                  $sholat = 50;
                                  elseif (($sholat) > 11)
                                  $sholat = 40;
                                  elseif (($sholat) > 7)
                                  $sholat = 30;
                                  elseif (($sholat) > 4)
                                  $sholat = 20;
                                  elseif (($sholat) > 0)
                                  $sholat = 10;
                                  else
                                  $sholat = 0;
                      // end kalkulasi sholat

                      //kalkulasi dzikir
                                  $dzikir = $nPeriodik->dzikir;
                                  if (($dzikir) > 105)
                                      $dzikir = 100;
                                  elseif (($dzikir) > 83)
                                  $dzikir = 80;
                                  elseif (($dzikir) > 62)
                                  $dzikir = 60;
                                  elseif (($dzikir) > 41)
                                  $dzikir = 40;
                                  elseif (($dzikir) > 20)
                                  $dzikir = 20;
                                  elseif (($dzikir) > 0)
                                  $dzikir = 10;
                                  else
                                  $dzikir = 0;
                      //end kalkulasi dzikir

                      //kalkulasi tilawah
                      $saritilawah = $nPeriodik->tilawatil_quran;
                      if (($saritilawah) > 45)
                          $saritilawah = 100;
                      elseif (($saritilawah) > 40)
                      $saritilawah = 90;
                      elseif (($saritilawah) > 35)
                      $saritilawah = 80;
                      elseif (($saritilawah) > 30)
                      $saritilawah = 70;
                      elseif (($saritilawah) > 25)
                      $saritilawah = 60;
                      elseif (($saritilawah) > 20)
                      $saritilawah = 50;
                      elseif (($saritilawah) > 15)
                      $saritilawah = 40;
                      elseif (($saritilawah) > 5)
                      $saritilawah = 20;
                      elseif (($saritilawah) > 0)
                      $saritilawah = 10;
                      else
                      $saritilawah = 0;
                      //end kalkulasi tilawah
                              ?>
    <?php
                                    $tugasTerstruktur = (($nPeriodik->ukhuwah_islamiyah)+($nPeriodik->ukhuwah_wathoniyah))/2;
                                    $ujianKompetensi = (($nPeriodik->fardu_kifayah)+($nPeriodik->hafalan_doa)+($nPeriodik->baca_quran))/3;
                                    $aktivitasHarian = (($sholat)+($nPeriodik->dzikir)+($nPeriodik->tilawatil_quran))/3;
                                    $dpns11 = (($nPeriodik->kehadiran)+($tugasTerstruktur)+($ujianKompetensi)+($aktivitasHarian));
                                    ?>
    @endforeach
    @endforeach
    @endif
    <b>DPNS 2</b> <a class="float-right text-muted">{{ $dpns11 }}</a>
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

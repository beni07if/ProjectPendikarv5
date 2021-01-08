@extends('layouts.master')

@section('navbarTitle2')
<a href="#" class="nav-link">DPNS 1</a>
@endsection

@section('breadcrumb')
<a href="#" class="nav-link">Sistem Penilaian Pendikar / DPNS 1</a>
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
            <li class="breadcrumb-item active">DPNS 2</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-3">
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src="{{ asset('foto/adminSekretaris/' . auth()->user()->foto) }}"
                alt="User profile picture">
            </div>
            <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
            <p class="text-muted text-center">{{ Auth::user()->nim }}</p>
            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Keluarga</b> <a class="float-right text-muted">{{ Auth::user()->keluarga }}</a>
              </li>
              <li class="list-group-item">
                <b>Prodi</b> <a class="float-right text-muted">{{ Auth::user()->prodi }}</a>
              </li>
              <li class="list-group-item">
                <b>Fakultas</b> <a class="float-right text-muted">{{ Auth::user()->fakultas }}</a>
              </li>
            </ul>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card">
          <!-- /.card-header -->
          <div class="card-body table-responsive">
            <div class="row mt-4">
              <nav class="w-100">
                <div class="nav nav-tabs" id="product-tab" role="tablist">
                  <a class="nav-item nav-link  active" id="product-desc-tab" href="" role="tab"
                    aria-controls="product-desc" aria-selected="true">DPNS 1</a>
                  {{--  <a class="nav-item nav-link" id="product-comments-tab"  href="#product-comments"  aria-controls="product-comments" aria-selected="false">DPNS 2</a>  --}}
                  <a class="nav-item nav-link" id="product-comments-tab" href="{{ route('dpns22') }}"
                    aria-controls="product-comments" aria-selected="false">DPNS 2</a>
                  <a class="nav-item nav-link" id="product-rating-tab" href="{{ route('dpns33') }}"
                    aria-controls="product-rating" aria-selected="false">DPNS 3</a>
                </div>
              </nav>
              <div class="tab-content p-3" id="nav-tabContent">
                <div class="tab-pane fade show active" id="product-desc" role="tabpanel"
                  aria-labelledby="product-desc-tab">
                  <table class="table table-striped table-responsive">
                    <thead>
                      <tr>
                        <th> No </th>
                        {{--  <th> Nama </th>  --}}
                        <th>Kehadiran</th>
                        <th>Tugas Terstruktur</th>
                        <th>Ujian Kompetensi</th>
                        <th>Aktivitas Harian</th>
                        <th>Buku Harian</th>
                        <th>Keterangan </th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                        @if (Auth::check())
                        @foreach ($dpns1 as $user)
                        {{--  @for ($user->id = 0; $user->id < 5; $user->id++)  --}}
                                <td> {{ $user->kehadiran }}</td>
                                <td> {{ $user->ukhuwah_islamiyah }}</td>
                                <td> {{ $user->ukhuwah_wathoniyah }}</td>
                                <td> {{ $user->fardu_kifayah }}</td>
                                <td> {{ $user->hafalan_doa }}</td>
                                <td> {{ $user->baca_quran }}</td>
                                <td> {{ $user->sholar_fardu }}</td>
                            </tr>
                            {{--  @endfor  --}}
                            @endforeach
                        @endif
                    </tbody>
                  </table>
                  <div class="card-header">
                    @if (Auth::check())
                    @foreach($dpns1 as $nPeriodik)
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
                    @endif
                    <b>DPNS 1</b> <a class="float-right text-muted">{{ number_format($dpns11,2)/4 }}</a>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection


@extends('layouts.master')

@section('navbarTitle2')
<a href="#" class="nav-link">Home</a>
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Selamat Datang, {{ Auth::user()->name }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">User Profile</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-5">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                     src="{{ asset('assets/images/pendikarv1/beni.png') }}"
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
                <li class="list-group-item">
                    @if (Auth::check())
                    @foreach($nilaiPeriodik1 as $nPeriodik)
                    <?php
                    $tugasTerstruktur = (($nPeriodik->ukhuwah_islamiyah)+($nPeriodik->ukhuwah_wathoniyah))/2;
                    $ujianKompetensi = (($nPeriodik->fardu_kifayah)+($nPeriodik->hafalan_doa)+($nPeriodik->baca_quran))/3;
                    $aktivitasHarian = (($nPeriodik->sholat_fardu)+($nPeriodik->dzikir)+($nPeriodik->tilawatil_quran))/3;
                    $dpns1 = (($nPeriodik->kehadiran)+($tugasTerstruktur)+($ujianKompetensi)+($aktivitasHarian));
                    ?>
                    @endforeach
                    @endif
                     <b>DPNS 1</b> <a class="float-right text-muted">{{ number_format($dpns1,2)/2 }}</a>
                </li>
                <li class="list-group-item">
                    @if (Auth::check())
                    @foreach($nilaiPeriodik2 as $nPeriodik)
                    <?php
                    $tugasTerstruktur = (($nPeriodik->ukhuwah_islamiyah)+($nPeriodik->ukhuwah_wathoniyah))/2;
                    $ujianKompetensi = (($nPeriodik->fardu_kifayah)+($nPeriodik->hafalan_doa)+($nPeriodik->baca_quran))/3;
                    $aktivitasHarian = (($nPeriodik->sholat_fardu)+($nPeriodik->dzikir)+($nPeriodik->tilawatil_quran))/3;
                    $dpns2 = (($nPeriodik->kehadiran)+($tugasTerstruktur)+($ujianKompetensi)+($aktivitasHarian));
                    ?>
                    @endforeach
                    @endif
                     <b>DPNS 2</b> <a class="float-right text-muted">{{ number_format($dpns2,2)/2 }}</a>
                </li>
                <li class="list-group-item">
                    @if (Auth::check())
                   @foreach($nilaiPeriodik3 as $nPeriodik)
                   <?php
                   $tugasTerstruktur = (($nPeriodik->ukhuwah_islamiyah)+($nPeriodik->ukhuwah_wathoniyah))/2;
                   $ujianKompetensi = (($nPeriodik->fardu_kifayah)+($nPeriodik->hafalan_doa)+($nPeriodik->baca_quran))/3;
                   $aktivitasHarian = (($nPeriodik->sholat_fardu)+($nPeriodik->dzikir)+($nPeriodik->tilawatil_quran))/3;
                   $dpns3 = (($nPeriodik->kehadiran)+($tugasTerstruktur)+($ujianKompetensi)+($aktivitasHarian));
                   ?>
                   @endforeach
                   @endif
                    <b>DPNS 3</b> <a class="float-right text-muted">{{ number_format($dpns3,2)/2 }}</a>
              </ul>

              {{--  <b href="#" class="btn btn-primary btn-block"><b>Follow</b></b>  --}}
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col -->
        <div class="col-md-7">
          <div class="card">
            {{--  <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item nav-link text-muted " >Pilih DPNS</li>
               </ul>
            </div><!-- /.card-header -->  --}}
            <div class="card-body">
                <!-- Horizontal Form -->
              <!-- form start -->
              <form class="form-horizontal">
                <div class="form-group">
                    <label>Pilih DPNS</label>
                    <select class="form-control select2" style="width: 100%;">
                      <option selected="selected">DPNS 1</option>
                      <option value="haha">DPNS 2</option>
                      <option><a href="{{ route('dpns3.home') }}" class="nav-link">
                        <p>DPNS 3</p>
                        </a></option>
                      <option disabled="disabled">DPNS 4</option>
                    </select>
                  </div>
                  <!-- /.form-group -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Pilih</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div><!-- /.card-body -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

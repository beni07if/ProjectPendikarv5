@extends('layouts.master')

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
                    {{--  <h1>DPNS 1</h1>  --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('mahasiswa.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">DPNA </li>
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

                         @if (Auth::check())

                         @foreach($dpna as $nPeriodik)

                         <?php
                         $tugasTerstruktur = (($nPeriodik->ukhuwah_islamiyah)+($nPeriodik->ukhuwah_wathoniyah))/2;
                         $ujianKompetensi = (($nPeriodik->fardu_kifayah)+($nPeriodik->hafalan_doa)+($nPeriodik->baca_quran))/3;
                         $aktivitasHarian = (($nPeriodik->sholat_fardu)+($nPeriodik->dzikir)+($nPeriodik->tilawatil_quran))/3;
                         $dpnaa = (($nPeriodik->kehadiran)+($tugasTerstruktur)+($ujianKompetensi)+($aktivitasHarian));
                         ?>
                         @endforeach
                         @endif
                          {{--  <b>DPNS 3</b> <a class="float-right text-muted">{{ number_format($dpnaa,2)/2 }}</a>  --}}

                    </ul>

                    {{--  <b href="#" class="btn btn-primary btn-block"><b>Follow</b></b>  --}}
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
                            {{-- <nav class="w-100">
                              <div class="nav nav-tabs" id="product-tab" role="tablist">
                                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">DPNA</a>
                              </div> --}}
                            </nav>
                            <div class="tab-content p-3" id="nav-tabContent">
                              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                                <table class="table table-striped table-responsive">
                                    <thead>
                                      <tr>
                                        <th> No </th>
                                        <th> Nama </th>
                                        <th>Kehadiran</th>
                                        <th>Tugas Terstruktur</th>
                                        <th>Ujian Kompetensi</th>
                                        <th>Aktivitas Harian</th>
                                        <th>Buku Harian</th>
                                        {{-- <th>Action </th> --}}
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0;?>

                                        {{-- @for ($i = 0; $i < 10; $i++) --}}

                                       @if (Auth::check())
                                       @foreach($dpna as $nPeriodik)
                                       <?php
                                if (($nPeriodik->sholat_fardu) > 32)
                                        $sholat = 100;
                                    elseif (($nPeriodik->sholat_fardu) > 28)
                                    $sholat = 90;
                                    elseif (($nPeriodik->sholat_fardu) > 25)
                                    $sholat = 80;
                                    elseif (($nPeriodik->sholat_fardu) > 21)
                                    $sholat = 70;
                                    elseif (($nPeriodik->sholat_fardu) > 18)
                                    $sholat = 60;
                                    elseif (($nPeriodik->sholat_fardu) > 14)
                                    $sholat = 50;
                                    elseif (($nPeriodik->sholat_fardu) > 11)
                                    $sholat = 40;
                                    elseif (($nPeriodik->sholat_fardu) > 7)
                                    $sholat = 30;
                                    elseif (($nPeriodik->sholat_fardu) > 4)
                                    $sholat = 20;
                                    elseif (($nPeriodik->sholat_fardu) > 0)
                                    $sholat = 10;
                                else
                                    $sholat = 0;
                                ?>
                                       <?php $no++;
                                       $tugasTerstruktur = (($nPeriodik->ukhuwah_islamiyah)+($nPeriodik->ukhuwah_wathoniyah))/2;
                                       $ujianKompetensi = (($nPeriodik->fardu_kifayah)+($nPeriodik->hafalan_doa)+($nPeriodik->baca_quran))/3;
                                       $aktivitasHarian = (($nPeriodik->sholat_fardu)+($nPeriodik->dzikir)+($nPeriodik->tilawatil_quran))/3;
                                       ?>
                                       <tr>
                                            <td>{{ $no }}</td>
                                           <td>{{ $nPeriodik->id }}</td>
                                           <td>{{ $nPeriodik->kehadiran }}</td>
                                           <td>{{ $tugasTerstruktur }}</td>
                                           <td>{{ number_format($ujianKompetensi,2) }}</td>
                                           <td>{{ number_format($aktivitasHarian,2) }}</td>
                                           <td>{{ $nPeriodik->buku_harian }}</td>
                                           <td>
                                            {{-- <a href="{{ route('dpns1.show', $nPeriodik->id)}}" type="button" class="btn btn-sm btn-info">Detail</a> --}}
                                               {{--  <p class="btn btn-warning btn-xs"><a href="{{ route('editdpns1', $nPeriodik->id) }}">edit</p>  --}}
                                                   {{--  <a href="{{ route('dpns1.edit', $nPeriodik->id)}}" type="button" class="btn btn-sm btn-warning">Ubah</a>  --}}
                                               {{--  <p class="btn btn-danger btn-xs">delete</p>  --}}
                                               {{--  <form action="{{ route('dpns1.destroy', $nPeriodik->id)}}" method="post">
                                                   @csrf
                                                   @method('DELETE')
                                                   <button class="btn btn-danger" type="submit">Delete</button>
                                                 </form>  --}}
                                           </td>
                                       </tr>
                                       @endforeach
                                       @endif
                                        {{-- @endfor --}}
                                    </tbody>
                                  </table>
                                  <div class="card-header">
                                    <b>DPNA</b> <a class="float-right text-muted">{{ number_format($dpnaa,2)/2 }}</a>
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



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
                                        <th> Pekan Ke </th>
                                        <th>Kehadiran</th>
                                        <th>Tugas Terstruktur</th>
                                        <th>Ujian Kompetensi</th>
                                        <th>Aktivitas Harian</th>
                                        <th>Buku Harian</th>
                                        <th>Jumlah</th>
                                        <th>Keterangan </th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0;?>

                                        {{-- @for ($i = 0; $i < 10; $i++) --}}

                                        @if (Auth::check())
                                        @foreach($dpna as $nPeriodik)
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
                                                if (($saritilawahs) > 95){
                                                    $saritilawah = 200;
                                                }elseif (($saritilawahs) > 90){
                                                    $saritilawah = 190;
                                                }elseif (($saritilawahs) > 85){
                                                    $saritilawah = 180;
                                                }elseif (($saritilawahs) > 80){
                                                    $saritilawah = 170;
                                                }elseif (($saritilawahs) > 75){
                                                    $saritilawah = 160;
                                                }elseif (($saritilawahs) > 70){
                                                    $saritilawah = 150;
                                                }elseif (($saritilawahs) > 65){
                                                    $saritilawah = 140;
                                                }elseif (($saritilawahs) > 60){
                                                    $saritilawah = 130;
                                                }elseif (($saritilawahs) > 55){
                                                    $saritilawah = 120;
                                                }elseif (($saritilawahs) > 50){
                                                    $saritilawah = 110;
                                                }

                                            elseif (($saritilawahs) > 45){
                                                    $saritilawah = 100;
                                                }elseif (($saritilawahs) > 40){
                                                    $saritilawah = 90;
                                                }elseif (($saritilawahs) > 35){
                                                    $saritilawah = 80;
                                                }elseif (($saritilawahs) > 33){
                                                    $saritilawah = 70;
                                                }elseif (($saritilawahs) > 25){
                                                    $saritilawah = 60;
                                                }elseif (($saritilawahs) > 20){
                                                    $saritilawah = 50;
                                                }elseif (($saritilawahs) > 15){
                                                    $saritilawah = 40;
                                                }elseif (($saritilawahs) > 10){
                                                    $saritilawah = 30;
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
                                            $dpns = ($kehadiran+$tugasTerstruktur+$ujianKompetensi+$aktivitasHarian+$bukuHarian);
                                            ?>
                                            <tr>
                                            {{--  <td>{{ $no }}</td>  --}}
                                            <td>{{ $nPeriodik->pekan_ke }}</td>
                                            <td>{{ $kehadiran }}</td>
                                            <td>{{ $tugasTerstruktur }}</td>
                                            <td>{{ number_format($ujianKompetensi,2) }}</td>
                                            <td>{{ number_format($aktivitasHarian,2) }}</td>
                                            <td>{{ $bukuHarian }}</td>
                                            <td>{{ $dpns }}</td>
                                            {{--  <td>{{ $nPeriodik->tanggal }}</td> --}}
                                            <td>
                                                <a href="{{ route('nilaiPeriodik.edit', $nPeriodik->id)}}" type="button" class="btn btn-sm
                                                                  btn-info btn-sm"><i class="fas fa-eye"></i> Detail</a>
                                                {{--  <p class="btn btn-warning btn-xs"><a href="{{ route('editdpns1', $nPeriodik->id) }}">edit
                                                </p> --}}
                                                {{--  <a href="{{ route('dpns1.edit', $nPeriodik->id)}}" type="button" class="btn btn-sm
                                                btn-warning">Ubah</a> --}}
                                                {{--  <p class="btn btn-danger btn-xs">delete</p>  --}}
                                                {{--  <form action="{{ route('dpns1.destroy', $nPeriodik->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                                </form> --}}
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                        {{-- @endfor --}}
                                    </tbody>
                                  </table>
                                  <div class="card-header">
                                    <?php $no = 0;
                                          $dpnaHasil =0;
                                    ?>
                                   @if (Auth::check())
                                    @foreach($dpna as $nPeriodik)
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
                                            if (($saritilawahs) > 95){
                                                    $saritilawah = 200;
                                                }elseif (($saritilawahs) > 90){
                                                    $saritilawah = 190;
                                                }elseif (($saritilawahs) > 85){
                                                    $saritilawah = 180;
                                                }elseif (($saritilawahs) > 80){
                                                    $saritilawah = 170;
                                                }elseif (($saritilawahs) > 75){
                                                    $saritilawah = 160;
                                                }elseif (($saritilawahs) > 70){
                                                    $saritilawah = 150;
                                                }elseif (($saritilawahs) > 65){
                                                    $saritilawah = 140;
                                                }elseif (($saritilawahs) > 60){
                                                    $saritilawah = 130;
                                                }elseif (($saritilawahs) > 55){
                                                    $saritilawah = 120;
                                                }elseif (($saritilawahs) > 50){
                                                    $saritilawah = 110;
                                                }

                                            elseif (($saritilawahs) > 45){
                                                    $saritilawah = 100;
                                                }elseif (($saritilawahs) > 40){
                                                    $saritilawah = 90;
                                                }elseif (($saritilawahs) > 35){
                                                    $saritilawah = 80;
                                                }elseif (($saritilawahs) > 33){
                                                    $saritilawah = 70;
                                                }elseif (($saritilawahs) > 25){
                                                    $saritilawah = 60;
                                                }elseif (($saritilawahs) > 20){
                                                    $saritilawah = 50;
                                                }elseif (($saritilawahs) > 15){
                                                    $saritilawah = 40;
                                                }elseif (($saritilawahs) > 10){
                                                    $saritilawah = 30;
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
                                    $dpna2 = ($kehadiran+$tugasTerstruktur+$ujianKompetensi+$aktivitasHarian+$bukuHarian);
                                    $dpnaHasil += $dpna2;
                                    ?>

                                @endforeach
                                @endif
                                <b>Total | DPNA</b> <a class="float-right text-muted">{{ number_format($dpnaHasil,2) }} | {{ number_format($dpnaHasil,2)/16 }}</a><br>
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



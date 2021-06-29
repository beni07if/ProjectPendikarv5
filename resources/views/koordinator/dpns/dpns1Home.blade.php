@extends('layouts.masterKoordinator')

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
                    <h1>DPNS 1</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('mahasiswa.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">DPNS 1</li>
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
                        {{-- <a href="{{ route('dpns1ByProdi') }}" class="btn btn-info">Tambah Anggota Keluarga</a> --}}

                        {{-- <a href="{{ route('mahasiswa.create') }}" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-sm">Tambah Nilai Periodik</a> --}}
                        {{-- <button type="button" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>  --}}
                        {{-- <div class="card-body">

                        </div>  --}}
                        {{-- @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div><br />
                    @endif --}}
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">


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
                        $tugasTerstruktur = (($nPeriodik->ukhuwah_islamiyah) + ($nPeriodik->ukhuwah_wathoniyah)) / 2;
                        $ujianKompetensi = (($nPeriodik->fardu_kifayah) + ($nPeriodik->hafalan_doa) + ($nPeriodik->baca_quran)) / 3;
                        $aktivitasHarian = (($sholat) + ($nPeriodik->dzikir) + ($nPeriodik->tilawatil_quran)) / 3;
                        $dpns11 = (($nPeriodik->kehadiran) + ($tugasTerstruktur) + ($ujianKompetensi) + ($aktivitasHarian));
                        ?>
                        @endforeach
                        @endforeach
                        @endif
                        {{-- <b>DPNS 1</b> <a class="float-right text-muted">{{ $dpns11 }}</a> --}}

                        <table id="example" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Keluarga</th>
                                    {{-- <th>DPNS 1</th>  --}}
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>

                                @if (Auth::check())
                                @foreach($mahasiswa as $mhs)
                                <?php $no++; ?>
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $mhs->name }}</td>
                                    <td>Keluarga {{ $mhs->keluarga }}</td>
                                    {{-- <td>{{ number_format($dpns11,2) }}</td> --}}
                                    <td>
                                        <a href="{{ route('dpns1DetailKoordinator', $mhs->id) }}" type="button" class="btn btn-sm btn-info fas fa-eye">Detail DPNS 1</a>

                                    </td>
                                </tr>
                                @endforeach
                                @endif
                                {{-- @endfor --}}
                            </tbody>
                        </table>

                    </div>
                    <!-- /.card-body -->
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
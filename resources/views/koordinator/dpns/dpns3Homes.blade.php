@extends('layouts.masterKoordinator')

@section('dpnaHeaderExport')
Daftar Peserta Nilai Akhir (DPNS 3) Mahasiswa Tahun 2021/2022
@endsection

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
                    <h1>DPNS 3</h1>
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
                        {{--  <a href="{{ route('tambahMahasiswa') }}" class="btn btn-info">Tambah Anggota Keluarga</a>
                        --}}
                        {{--  <a href="{{ route('mahasiswa.create') }}" class="btn btn-info" data-toggle="modal"
                        data-target=".bd-example-modal-sm">Tambah Nilai Periodik</a> --}}
                        {{--  <button type="button" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>  --}}

                    </div>
                    @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div><br />
                    @endif
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">

                        <table id="example1"  class="table display table-bordered table-striped">

                            <thead>
                                <tr>
                                    {{--  <th>No</th>  --}}
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Keluarga</th>
                                    <th>Prodi</th>
                                    <th>Jenis Kelamin</th>
                                    <th>DPNS 3</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;?>

                                @if (Auth::check())
                                @foreach($data_akhir as $nilai)
                                <?php $no++; ?>

                                <tr>
                                    <td>{{$no}}</td>
                                    <td> {{ $nilai->name}}</td>
                                    <td> Keluarga {{ $nilai->keluarga }}</td>
                                    <td> {{ $nilai->prodi }}</td>
                                    <td> {{ $nilai->jenis_kelamin }}</td>
                                    <td>
                                        {{ ($nilai->dpna_hasil)}}
                                    </td>
                                    <td>
                                        <a href="{{ route('dpnaDetailKoordinator', $nilai->user_id) }}" type="button"
                                            class="btn btn-sm btn-info"><i class="fas fa-eye"></i> Detail DPNS 3</a>

                                    </td>
                                </tr>
                                @endforeach
                                @endif
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

@section('styleExportExcel')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">


@endsection



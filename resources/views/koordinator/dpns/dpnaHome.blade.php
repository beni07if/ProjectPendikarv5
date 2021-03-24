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
                    <h1>DPNA</h1>
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

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    {{--  <th>No</th>  --}}
                                    <th>Nama</th>
                                    <th>Keluarga</th>
                                    <th>DPNA</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;?>

                                @if (Auth::check())
                                @foreach($data_akhir as $nilai)

                                <tr>
                                    <td> {{ $nilai->name}}</td>
                                    <td> {{ $nilai->keluarga }}</td>
                                    <td>
                                        {{ ($nilai->dpna_hasil)}}
                                    </td>
                                    <td>
                                        <a href="{{ route('dpnaDetailKoordinator', $nilai->user_id) }}" type="button"
                                            class="btn btn-sm btn-info">Detail DPNA</a>

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

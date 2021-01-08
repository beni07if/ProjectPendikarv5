@extends('layouts.master')

@section('navbarTitle2')
<a href="#" class="nav-link">DPNA</a>
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
                    {{--  <div class="card-header">
                        <h3 class="card-title">DPNA Mahasiswa</h3><br>
                        <a href="{{ route('createdpna') }}" class="btn btn-primary">Input Nilai</a>
                    </div>  --}}
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Pekan Ke</th>
                                    <th>Kehadiran</th>
                                    <th>Tugas Terstruktur</th>
                                    <th>Ujian Kompetensi</th>
                                    <th>Aktivitas Harian</th>
                                    <th>Buku Harian</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($dpna) > 0)
                                @foreach($dpna as $nPeriodik)
                                <tr>
                                    <td>{{ $nPeriodik->id }}</td>
                                    <td>{{ $nPeriodik->fardu_kifayah }}</td>
                                    <td>{{ $nPeriodik->hafalan_doa }}</td>
                                    <td>{{ $nPeriodik->baca_quran }}</td>
                                    <td>{{ $nPeriodik->dzikir }}</td>
                                    <td>{{ $nPeriodik->sholat }}</td>
                                    <td>
                                        {{--  <p class="btn btn-info btn-xs"><a href="{{ route('showdpna', $nPeriodik->id) }}">view</p>  --}}
                                        {{--  <p class="btn btn-warning btn-xs"><a href="{{ route('dpna.edit') }}">edit</p>  --}}
                                        {{--  <p class="btn btn-danger btn-xs">delete</p>  --}}
                                    </td>
                                </tr>
                                @endforeach
                                @else
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



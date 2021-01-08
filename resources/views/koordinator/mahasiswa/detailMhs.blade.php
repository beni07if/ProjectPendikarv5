@extends('layouts.masterKoordinator')

@section('navbarTitle2')
<a href="#" class="nav-link">Home</a>
@endsection

@section('breadcrumb')
<a href="#" class="nav-link">Sistem Penilaian Pendikar / Home</a>
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @if (Auth::check())
    @foreach($mahasiswa as $mhs)
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Biodata {{ $mhs->name }}</h1>
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
                <div class="col-md-12">
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        {{--  <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> AdminLTE, Inc.
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>  --}}
                        <!-- info row -->
                        <div class="row invoice-info">

                            <div class="col-sm-4 invoice-col">
                                {{--  <img class="profile-user-img-lg img-fluid img-circle" src="{{ asset('foto/adminSekretaris/' . auth()->user()->foto) }}" alt="User profile picture">  --}}
                                <img class="profile-user-img-lg img-fluid img-circle" src="{{ asset('foto/adminSekretaris/' . $mhs->foto) }}" alt="User profile picture">
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <a class="text-muted">Nama</a>  <b><a class="float-right text-muted ">{{ $mhs->name }}</a><br></b>
                                <a class="text-muted">NIM</a> <b><a class="float-right text-muted">{{ $mhs->nim }}</a><br></b>
                                <a class="text-muted">Prodi</a> <b><a class="float-right text-muted">{{ $mhs->prodi }}</a><br></b>
                                <a class="text-muted">Fakultas</a> <b><a class="float-right text-muted">{{ $mhs->fakultas }}</a><br></b>
                                <a class="text-muted">Email</a> <b><a class="float-right text-muted">{{ $mhs->email }}</a><br></b>
                                <a class="text-muted">No Hp</a> <b><a class="float-right text-muted">{{ $mhs->no_hp }}</a><br></b>
                                <a class="text-muted">Keluarga</a> <b><a class="float-right text-muted">{{ $mhs->keluarga }}</a><br></b>
                                <a class="text-muted">Status</a> <b><a class="float-right text-muted">{{ $mhs->role }}</a><br></b>
                                <a class="text-muted">Angkatan</a> <b><a class="float-right text-muted">{{ $mhs->periode }}</a><br></b>
                            </div><br>
                            <!-- /.col -->

                        </div><a href="{{ route('editDetailMhs', $mhs->id)}}">Ubah Mahasiswa</a>
                        <!-- /.row -->

                    </div>
                    <!-- /.invoice -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endforeach
@endif
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

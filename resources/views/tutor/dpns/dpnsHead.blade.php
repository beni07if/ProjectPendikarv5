@extends('layouts.master')

@section('navbarTitle2')
<a href="#" class="nav-link">DPNS 1</a>
@endsection

@section('breadcrumb')
<a href="#" class="nav-link">Sistem Penilaian Pendikar / DPNS</a>
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
                        <li class="breadcrumb-item active">DPNS </li>
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


                    </ul>

                    <b href="#" class="btn btn-primary btn-block"><b>Follow</b></b>
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
                                <a class="nav-item nav-link active" id="product-desc-tab"  href="" role="tab" aria-controls="product-desc" aria-selected="true">DPNS 1</a>
                                {{--  <a class="nav-item nav-link" id="product-comments-tab"  href="{{ route('dpns11') }}"  aria-controls="product-comments" aria-selected="false">DPNS 2</a>  --}}
                                <a class="nav-item nav-link" id="product-comments-tab"  href="{{ route('dpns22') }}"  aria-controls="product-comments" aria-selected="false">DPNS 22</a>
                                <a class="nav-item nav-link" id="product-rating-tab"  href="{{ route('dpns33') }}"  aria-controls="product-rating" aria-selected="false">DPNS 3</a>
                              </div>
                            </nav>

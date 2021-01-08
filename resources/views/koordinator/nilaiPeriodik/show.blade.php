@extends('layouts.masterKoordinator')

@section('navbarTitle2')
<a href="#" class="nav-link">Detail Nilai Periodik</a>
@endsection

@section('content')

@if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Nilai Periodik</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail Nilai Periodik</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- form start -->
                    <form method="POST" >
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-left">{{ __('Nama') }}</label>
                            @if (Auth::check())
                            @foreach($mahasiswa as $mhs)

                            <div class="col-md-6">
                                <input type="integer" disabled class="form-control" value="{{ $mhs->name }}">
                            </div>
                            @endforeach
                            @endif
                          </div>
                        <div>
                        <div class="form-group row">
                            <label for="keluarga" class="col-md-2 col-form-label text-md-left">{{ __('Keluarga') }}</label>

                            <div class="col-md-6">
                                <input type="integer" disabled class="form-control" value="{{ $nilaiPeriodik->keluarga }}">
                            </div>
                          </div>
                        <div>
                            {{--  @if (Auth::check())
                                    @foreach($nilaiPeriodik as $np)
                                    @if($np->keluarga === $user->keluarga)  --}}
                            <div class="form-group row">
                                <label for="pekan_ke"
                                    class="col-md-2 col-form-label text-md-left">{{ __('Pertemuan Ke') }}</label>
                                    <div class="col-md-6">
                                        <input type="integer" disabled class="form-control" value="{{ $nilaiPeriodik->pekan_ke }}">
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal"
                                    class="col-md-2 col-form-label text-md-left">{{ __('Tanggal') }}</label>

                                <div class="col-md-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" disabled  class="form-control" data-inputmask-alias="datetime" value="{{ $nilaiPeriodik->tanggal }}"
                                            data-inputmask-inputformat="yyyy-mm-dd" data-mask>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="card-body">
                                <h5>Kehadiran</h5>
                                <div class="form-group row">
                                    <label for="kehadiran"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Kehadiran') }}</label>

                                        <div class="col-md-6">
                                            <input type="integer" disabled class="form-control" value="{{ $nilaiPeriodik->kehadiran }}">
                                        </div>
                                </div>
                                <!-- /.row -->

                                <!-- /.row -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-body">
                                <h5>Tugas Terstruktur</h5>
                                <div class="form-group row">
                                    <label for="ukhuwah_islamiyah"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Ukhuwah Islamiyah') }}</label>

                                        <div class="col-md-6">
                                            <input type="integer" disabled class="form-control" value="{{ $nilaiPeriodik->ukhuwah_islamiyah }}">
                                        </div>
                                </div>
                                <!-- /.row -->
                                <div class="form-group row">
                                    <label for="ukhuwah_wathoniyah"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Ukhuwah Wathoniyah') }}</label>

                                        <div class="col-md-6">
                                            <input type="integer" disabled class="form-control" value="{{ $nilaiPeriodik->ukhuwah_wathoniyah }}">
                                        </div>
                                </div>
                                <!-- /.row -->

                                <!-- /.row -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-body">
                                <h5>Ujian Kompetensi</h5>
                                <div class="form-group row">
                                    <label for="hafalan_doa"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Hafalan Doa Sholat') }}</label>

                                        <div class="col-md-6">
                                            <input type="integer" disabled class="form-control" value="{{ $nilaiPeriodik->hafalan_doa }}">
                                        </div>
                                </div>
                                <!-- /.row -->
                                <div class="form-group row">
                                    <label for="fardu_kifayah"
                                        class="col-md-4 col-form-label text-md-right">{{ __('fardu Kifayah') }}</label>

                                        <div class="col-md-6">
                                            <input type="integer" disabled class="form-control" value="{{ $nilaiPeriodik->fardu_kifayah }}">
                                        </div>
                                </div>
                                <!-- /.row -->
                                <div class="form-group row">
                                    <label for="baca_quran"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Baca Al-Quran') }}</label>

                                        <div class="col-md-6">
                                            <input type="integer" disabled class="form-control" value="{{ $nilaiPeriodik->baca_quran }}">
                                        </div>
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-body">
                                <h5>Aktivitas Harian</h5>
                                <div class="form-group row">
                                    <label for="sholat_fardu"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Sholat fardu') }}</label>
                                        <div class="col-md-6">
                                            <input type="integer" disabled class="form-control" value="{{ $nilaiPeriodik->sholat_fardu }}">
                                        </div>
                                </div>
                                <!-- /.row -->
                                <div class="form-group row">
                                    <label for="tilawatil_quran"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Tilawatil Quran') }}</label>

                                    <div class="col-md-6">
                                        <input type="integer" class="form-control" disabled value="{{ $nilaiPeriodik->tilawatil_quran }}">
                                    </div>
                                </div>
                                <!-- /.row -->
                                <div class="form-group row">
                                    <label for="dzikir"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Dzikir') }}</label>

                                    <div class="col-md-6">
                                        <input type="integer" disabled class="form-control" value="{{ $nilaiPeriodik->dzikir }}">
                                    </div>
                                </div>
                                <!-- /.row -->
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <h5>Buku Harian</h5>
                                <div class="form-group row">
                                    <label for="buku_harian"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Buku Harian') }}</label>

                                        <div class="col-md-6">
                                            <input type="integer" disabled class="form-control" value="{{ $nilaiPeriodik->buku_harian }}">
                                        </div>
                                </div>
                                <!-- /.row -->
                            </div>
                            {{--  <div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>  --}}
                            <!-- /.card-body -->
                        </div>

                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>

    </section>
</div>

@endsection

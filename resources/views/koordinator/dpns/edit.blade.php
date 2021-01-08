@extends('layouts.master')

@section('navbarTitle2')
<a href="#" class="nav-link">Edit Nilai Periodik</a>
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
                    <h1>Edit Nilai Periodik</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Nilai Periodik</li>
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
                {{--  <div class="card-header">
                    <h3 class="card-title">Edit Nilai Periodik</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                class="fas fa-remove"></i></button>
                    </div>
                </div>  --}}

                <!-- /.card-header -->
                <div class="card-body">
                    <!-- form start -->
                    <form method="POST" action="{{ route('nilaiPeriodik.update', $nilaiPeriodik->id) }} " enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name"
                                class="col-md-2 col-form-label text-md-left">{{ __('Nama Mahasiswa') }}</label>

                            <div class="col-md-4">
                                <select class="form-control select2" style="width: 100%;" required="Minimal 0" name="user_id">
                                    {{-- @if(count($nilaiPeriodik) > 0)
                                @foreach($nilaiPeriodik as $nilaiPeriodik)
                                <option value="{{ $nilaiPeriodik->baca_quran }}">{{ $nilaiPeriodik->baca_quran }}</option>
                                    @endforeach
                                    @else
                                    @endif --}}

                                   // @if (Auth::check())
                                   // @foreach($mahasiswa as $mhs)
                                    {{-- @if($mhs->keluarga === $user->keluarga) --}}
                                    {{-- <option selected="selected" value="{{ $mhs->name }}"></option> --}}
                                    {{-- @foreach ($mahasiswa as $mhs) --}}
                                        {{-- @foreach ($nilaiPeriodik->mahasiswas as $mhs) --}}
                                         {{-- @foreach ($mhs->NilaiPeriodik as $nP) --}}
                                        {{-- <option value="{{ $nP->id }}" required="Minimal 0" name="mahasiswa_id">{{ $mhs->name }}</option> --}}
                                     //   <option value="{{ $mhs->id }}" required="Minimal 0" name="user_id">{{ $mhs->name }}</option>

                                        {{--  @endforeach  --}}
                                        {{-- @endforeach --}}
                                    {{-- @endforeach --}}
                                    {{-- @endif --}}
                                   // @endforeach
                                   // @endif

                                    {{--  @if (Auth::check())
                                    @foreach($mahasiswa as $mhs)
                                        @foreach ($mhs->NilaiPeriodik as $nP)
                                        <option value="{{ $nP->kehadiran }}" required="Minimal 0" name="mahasiswa_nim">{{ $nP->kehadiran }}</option>
                                        @endforeach
                                    @endforeach
                                    @endif  --}}

                                    @if (Auth::check())
                                    @foreach($mahasiswa as $mhs)
                                        @foreach ($mhs->NilaiPeriodik as $nP)
                                        <option value="{{ $mhs->id }}" required="Minimal 0" >{{ $nP->id }}</option>
                                        @endforeach
                                    @endforeach
                                    @endif

                                    {{-- <tbody>
                                        @foreach($nilaiPeriodik as $nilaiPeriodik)
                                        <tr>
                                            <td>{{ $nilaiPeriodik->kehadiran }}</td>
                                            <td>
                                                @foreach($a->mahasiswas as $t)
                                                    {{$t->email}}
                                                @endforeach
                                            </td>
                                            <td class="text-center">{{ $a->tags->count() }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody> --}}

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="keluarga" class="col-md-2 col-form-label text-md-left">{{ __('Keluarga') }}</label>

                            <div class="col-md-4">
                              <select class="form-control select2" required="Minimal 0" name="keluarga" style="width: 100%;">

                                @if (Auth::check())
                                {{--  @foreach($nilaiPeriodik as $mhs)  --}}
                                <option value="{{ $nilaiPeriodik->keluarga }}" >{{ $nilaiPeriodik->keluarga }}</option>
                                {{--  @endforeach  --}}
                                @endif

                              </select>
                            </div>
                          </div>
                        <div>
                            {{--  @if (Auth::check())
                                    @foreach($nilaiPeriodik as $np)
                                    @if($np->keluarga === $user->keluarga)  --}}
                            <div class="form-group row">
                                <label for="pekan_ke"
                                    class="col-md-2 col-form-label text-md-left">{{ __('Pertemuan Ke') }}</label>
                                <div class="col-md-4">
                                    <select class="form-control select2" style="width: 100%;" required="Minimal 0" name="pekan_ke">
                                        {{-- @foreach($mahasiswa as $mhs)
                                        @foreach ($mhs->NilaiPeriodik as $nP)
                                        <option selected value="{{ $nP->pekan_ke }}" required="Minimal 0" name="pekan_ke">{{ $nP->pekan_ke }}</option> --}}
                                        <option selected value="{{ $nilaiPeriodik->pekan_ke }}" required="Minimal 0" name="pekan_ke">{{ $nilaiPeriodik->pekan_ke }}</option>

                                        {{-- @endforeach
                                        @endforeach --}}
                                        {{--  <option selected="selected" required="Minimal 0" name="pekan_ke" value="{{ $nilaiPeriodik->pekan_ke }}">{{ $nilaiPeriodik->pekan_ke }}</option>  --}}
                                        <option required="Minimal 0" name="pekan_ke" value="1">1</option>
                                        <option required="Minimal 0" name="pekan_ke" value="2">2</option>
                                        <option required="Minimal 0" name="pekan_ke" value="3">3</option>
                                        <option required="Minimal 0" name="pekan_ke" value="4">4</option>
                                        <option required="Minimal 0" name="pekan_ke" value="5">5</option>
                                        <option required="Minimal 0" name="pekan_ke" value="6">6</option>
                                        <option required="Minimal 0" name="pekan_ke" value="7">7</option>
                                        <option required="Minimal 0" name="pekan_ke" value="8">8</option>
                                        <option required="Minimal 0" name="pekan_ke" value="9">9</option>
                                        <option required="Minimal 0" name="pekan_ke" value="10">10</option>
                                        <option required="Minimal 0" name="pekan_ke" value="11">11</option>
                                        <option required="Minimal 0" name="pekan_ke" value="12">12</option>
                                        <option required="Minimal 0" name="pekan_ke" value="13">13</option>
                                        <option required="Minimal 0" name="pekan_ke" value="14">14</option>
                                        <option required="Minimal 0" name="pekan_ke" value="15">15</option>
                                        <option required="Minimal 0" name="pekan_ke" value="16">16</option>
                                    </select>
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
                                        <input type="date" required="Minimal 0" name="tanggal" class="form-control" data-inputmask-alias="datetime" value="{{ $nilaiPeriodik->tanggal }}"
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
                                        <select class="form-control select2" style="width: 100%;" required="Minimal 0" name="kehadiran">
                                            <option required="Minimal 0" name="kehadiran" selected="selected" value="{{ $nilaiPeriodik->kehadiran }}">{{ $nilaiPeriodik->kehadiran }}</option>
                                            <option required="Minimal 0" name="kehadiran" value="0">Tidak Hadir</option>
                                            <option required="Minimal 0" name="kehadiran" value="10">Hadir</option>
                                        </select>
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
                                        <select class="form-control select2" style="width: 100%;" required="Minimal 0" name="ukhuwah_islamiyah" >
                                            <option required="Minimal 0" name="ukhuwah_islamiyah" selected="selected" value="{{ $nilaiPeriodik->ukhuwah_islamiyah }}">{{ $nilaiPeriodik->ukhuwah_islamiyah }}</option>
                                            <option required="Minimal 0" name="ukhuwah_islamiyah" value="0">Tidak Hadir</option>
                                            <option required="Minimal 0" name="ukhuwah_islamiyah" value="10">Hadir</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <div class="form-group row">
                                    <label for="ukhuwah_wathoniyah"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Ukhuwah Wathoniyah') }}</label>

                                    <div class="col-md-6">
                                        <select class="form-control select2" style="width: 100%;" required="Minimal 0" name="ukhuwah_wathoniyah">
                                            <option required="Minimal 0" name="kehadiran" selected="selected" value="{{ $nilaiPeriodik->ukhuwah_wathoniyah }}">{{ $nilaiPeriodik->ukhuwah_wathoniyah }}</option>
                                            <option required="Minimal 0" name="ukhuwah_wathoniyah" value="0">Tidak Hadir</option>
                                            <option required="Minimal 0" name="ukhuwah_wathoniyah" value="10">Hadir</option>
                                        </select>
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
                                        <select class="form-control select2" style="width: 100%;" required="Minimal 0" name="hafalan_doa">
                                            <option required="Minimal 0" name="hafalan_doa" selected="selected" value="{{ $nilaiPeriodik->hafalan_doa }}">{{ $nilaiPeriodik->hafalan_doa }}</option>
                                            <option required="Minimal 0" name="hafalan_doa" value="10">10</option>
                                            <option required="Minimal 0" name="hafalan_doa" value="20">20</option>
                                            <option required="Minimal 0" name="hafalan_doa" value="30">30</option>
                                            <option required="Minimal 0" name="hafalan_doa" value="40">40</option>
                                            <option required="Minimal 0" name="hafalan_doa" value="50">50</option>
                                            <option required="Minimal 0" name="hafalan_doa" value="60">60</option>
                                            <option required="Minimal 0" name="hafalan_doa" value="70">70</option>
                                            <option required="Minimal 0" name="hafalan_doa" value="80">80</option>
                                            <option required="Minimal 0" name="hafalan_doa" value="90">90</option>
                                            <option required="Minimal 0" name="hafalan_doa" value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <div class="form-group row">
                                    <label for="fardu_kifayah"
                                        class="col-md-4 col-form-label text-md-right">{{ __('fardu Kifayah') }}</label>

                                    <div class="col-md-6">
                                        <select class="form-control select2" style="width: 100%;" required="Minimal 0" name="fardu_kifayah">
                                            <option required="Minimal 0" name="fardu_kifayah" selected="selected" value="{{ $nilaiPeriodik->fardu_kifayah }}">{{ $nilaiPeriodik->fardu_kifayah }}</option>
                                            <option required="Minimal 0" name="fardu_kifayah" value="10">10</option>
                                            <option required="Minimal 0" name="fardu_kifayah" value="20">20</option>
                                            <option required="Minimal 0" name="fardu_kifayah" value="30">30</option>
                                            <option required="Minimal 0" name="fardu_kifayah" value="40">40</option>
                                            <option required="Minimal 0" name="fardu_kifayah" value="50">50</option>
                                            <option required="Minimal 0" name="fardu_kifayah" value="60">60</option>
                                            <option required="Minimal 0" name="fardu_kifayah" value="70">70</option>
                                            <option required="Minimal 0" name="fardu_kifayah" value="80">80</option>
                                            <option required="Minimal 0" name="fardu_kifayah" value="90">90</option>
                                            <option required="Minimal 0" name="fardu_kifayah" value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <div class="form-group row">
                                    <label for="baca_quran"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Baca Al-Quran') }}</label>

                                    <div class="col-md-6">
                                        <select class="form-control select2" required="Minimal 0" name="baca_quran" value="10" style="width: 100%;">
                                            <option required="Minimal 0" name="baca_quran" selected="selected" value="{{ $nilaiPeriodik->baca_quran }}">{{ $nilaiPeriodik->baca_quran }}</option>
                                            <option required="Minimal 0" name="baca_quran" value="20">20</option>
                                            <option required="Minimal 0" name="baca_quran" value="30">30</option>
                                            <option required="Minimal 0" name="baca_quran" value="40">40</option>
                                            <option required="Minimal 0" name="baca_quran" value="50">50</option>
                                            <option required="Minimal 0" name="baca_quran" value="60">60</option>
                                            <option required="Minimal 0" name="baca_quran" value="70">70</option>
                                            <option required="Minimal 0" name="baca_quran" value="80">80</option>
                                            <option required="Minimal 0" name="baca_quran" value="90">90</option>
                                            <option required="Minimal 0" name="baca_quran" value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.row -->

                                <!-- /.row -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-body">
                                <h5>Aktivitas Harian</h5>
                                <div class="form-group row">
                                    <label for="sholat_fardu"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Sholat fardu') }}</label>

                                    <div class="col-md-6">
                                        <select class="form-control select2" style="width: 100%;" required="Minimal 0" name="sholat_fardu">
                                            <option required="Minimal 0" name="sholat_fardu" selected="selected" value="{{ $nilaiPeriodik->sholat_fardu }}">{{ $nilaiPeriodik->sholat_fardu }}</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="1">1</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="2">2</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="3">3</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="4">4</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="5">5</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="6">6</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="7">7</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="8">8</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="9">9</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="10">10</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="11">11</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="12">12</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="13">13</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="14">14</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="15">15</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="16">16</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="17">17</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="18">18</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="19">19</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="20">20</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="21">21</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="22">22</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="23">23</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="24">24</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="25">25</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="26">26</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="27">27</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="28">28</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="29">29</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="30">30</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="31">31</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="32">32</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="33">33</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="34">34</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="35">35</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <div class="form-group row">
                                    <label for="tilawatil_quran"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Tilawatil Quran') }}</label>

                                    <div class="col-md-6">
                                        <input type="integer" class="form-control" id="tilawatil_quran" required="Minimal 0" name="tilawatil_quran" value="{{ $nilaiPeriodik->tilawatil_quran }}"
                                            placeholder="Halaman Terakhir">
                                    </div>
                                </div>
                                <!-- /.row -->
                                <div class="form-group row">
                                    <label for="dzikir"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Dzikir') }}</label>

                                    <div class="col-md-6">
                                        <input type="integer" class="form-control" id="dzikir" required="Minimal 0" name="dzikir" value="{{ $nilaiPeriodik->dzikir }}"
                                            placeholder="Total Dzikir">
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
                                        <select class="form-control select2" style="width: 100%;" required="Minimal 0" name="buku_harian">
                                            <option selected="selected" required="Minimal 0" name="buku_harian" value="{{ $nilaiPeriodik->buku_harian }}">{{ $nilaiPeriodik->buku_harian }}</option>
                                            <option required="Minimal 0" name="buku_harian" value="20">20</option>
                                            <option required="Minimal 0" name="buku_harian" value="30">30</option>
                                            <option required="Minimal 0" name="buku_harian" value="40">40</option>
                                            <option required="Minimal 0" name="buku_harian" value="50">50</option>
                                            <option required="Minimal 0" name="buku_harian" value="60">60</option>
                                            <option required="Minimal 0" name="buku_harian" value="70">70</option>
                                            <option required="Minimal 0" name="buku_harian" value="80">80</option>
                                            <option required="Minimal 0" name="buku_harian" value="90">90</option>
                                            <option required="Minimal 0" name="buku_harian" value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.row -->

                                <!-- /.row -->
                            </div>
                            <div>
                                <button type="submit" class="btn btn-success swalDefaultSuccessEdit">Simpan</button>
                            </div>
                            <!-- /.card-body -->
                            {{--  @endif
                            @endforeach
                            @endif  --}}
                        </div>

                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>

    </section>
</div>

@endsection

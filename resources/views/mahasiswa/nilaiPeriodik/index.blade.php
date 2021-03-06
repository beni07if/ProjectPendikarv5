@extends('layouts.master')

@section('navbarTitle2')
<a href="#" class="nav-link">Nilai Periodik</a>
@endsection

@section('breadcrumb')
<a href="#" class="nav-link">Sistem Penilaian Pendikar / Nilai Periodik</a>
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Nilai Periodik</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('mahasiswa.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Nilai Periodik</li>
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
                        {{--  <a href="{{ route('tambahMahasiswa') }}" class="btn btn-info">Tambah Anggota Keluarga</a>  --}}
                        <a href="{{ route('mahasiswa.create') }}" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-sm">Tambah Nilai Periodikq</a>
                        {{--  <button type="button" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>  --}}

                    </div>
                    @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br/>
  @endif
                     <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                     <th>No</th>
                                    <th>Nama</th>
                                    <th>Kehadiran</th>
                                    <th>Tugas Terstruktur</th>
                                    <th>Ujian Kompetensi</th>
                                    <th>Aktivitas Harian</th>
                                    <th>Buku Harian</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;?>

                                 {{-- @for ($i = 0; $i < 10; $i++) --}}

                                @if (Auth::check())
                                @foreach($nilaiPeriodik as $nPeriodik)
                                <?php $no++;
                                $kehadiran = $nPeriodik->kehadiran;
                                $tugasTerstruktur = (($nPeriodik->ukhuwah_islamiyah)+($nPeriodik->ukhuwah_wathoniyah))/2;
                                $ujianKompetensi = (($nPeriodik->fardu_kifayah)+($nPeriodik->hafalan_doa)+($nPeriodik->baca_quran))/3;
                                $aktivitasHarian = (($nPeriodik->sholat_fardu)+($nPeriodik->dzikir)+($nPeriodik->tilawatil_quran))/3;
                                ?>
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $nPeriodik->id }}</td>
                                    <td>{{ $kehadiran }}</td>
                                    <td>{{ $tugasTerstruktur }}</td>
                                    <td>{{ number_format($ujianKompetensi,2) }}</td>
                                    <td>{{ number_format($aktivitasHarian,2) }}</td>
                                    <td>{{ $nPeriodik->buku_harian }}</td>
                                    <td>
                                        <a href="{{ route('nilaiPeriodik.show', $nPeriodik->id) }}" type="button" class="btn btn-sm btn-info">view</a>
                                        {{--  <p class="btn btn-warning btn-xs"><a href="{{ route('editNilaiPeriodik', $nPeriodik->id, $nPeriodik->mahasiswa_id) }}">edit</p>  --}}
                                            <a href="{{ route('nilaiPeriodik.edit', $nPeriodik->id)}}" type="button" class="btn btn-sm btn-warning">Edit</a>
                                        {{--  <p class="btn btn-danger btn-xs">delete</p>  --}}
                                        <form action="{{ route('nilaiPeriodik.destroy', $nPeriodik->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            {{--  <button class="btn btn-danger" type="submit">Delete</button>  --}}
                                          </form>
                                    </td>
                                </button>
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


<!-- tambah rilis -->
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai Periodik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
                <!-- form start -->
          <form method="POST" action="{{ route('nilaiPeriodik.store') }} "  >
            @csrf
            <div class="form-group row">
              <label for="mahasiswa_id" class="col-md-2 col-form-label text-md-left">{{ __('Nama') }}</label>

              <div class="col-md-4">
                <select class="form-control select2" required="Minimal 0" name="user_id" style="width: 100%;">
                  {{--  @if(count($nilaiPeriodik) > 0)
                                @foreach($nilaiPeriodik as $nPeriodik)
                                <option value="{{ $nPeriodik->baca_quran }}">{{ $nPeriodik->baca_quran }}</option>
                  @endforeach
                  @else
                  @endif  --}}

                  @if (Auth::check())
                  @foreach($mahasiswa as $mahasiswa)
                  <option value="{{ $mahasiswa->id }}" >{{ $mahasiswa->name }}</option>
                  {{--  @endif  --}}
                  @endforeach
                  @endif

                </select>
              </div>
            </div>
            <div class="form-group row">
                <label for="keluarga" class="col-md-2 col-form-label text-md-left">{{ __('Keluarga') }}</label>

                <div class="col-md-4">
                    @if (Auth::check())
                    <input type="text" class="form-control" id="keluarga" value="{{ Auth::user()->keluarga }}" name="keluarga" required placeholder="Masukan Keluarga.." readonly>
                    @endif
                  </div>
              </div>

            <div class="form-group row">
              <label for="pekan_ke" class="col-md-2 col-form-label text-md-left">{{ __('Pertemuan Ke') }}</label>
              <div class="col-md-4">
                <select class="form-control select2" required="Minimal 0" name="pekan_ke" style="width: 100%;">
                  <option selected="selected"  value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="13">13</option>
                  <option value="14">14</option>
                  <option value="15">15</option>
                  <option value="16">16</option>

                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="tanggal" class="col-md-2 col-form-label text-md-left">{{ __('Tanggal') }}</label>

              <div class="col-md-4">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                  </div>
                  <input type="date" required="Minimal 0" name="tanggal" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>
                </div>
              </div>
            </div>
            <!-- /.row -->

            <div class="card-body">
              <h5>Kehadiran</h5>
              <div class="form-group row">
                <label for="kehadiran" class="col-md-4 col-form-label text-md-right">{{ __('Kehadiran') }}</label>

                <div class="col-md-6">
                  <select class="form-control select2" required="Minimal 0" name="kehadiran" style="width: 100%;">
                    <option selected="selected" value="0">Tidak Hadir</option>
                    <option value="10">Hadir</option>
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
                <label for="ukhuwah_islamiyah" class="col-md-4 col-form-label text-md-right">{{ __('Ukhuwah Islamiyah') }}</label>

                <div class="col-md-6">
                  <select class="form-control select2" required="Minimal 0" name="ukhuwah_islamiyah" style="width: 100%;">
                    <option selected="selected" value="0">Tidak Hadir</option>
                    <option value="10">Hadir</option>
                  </select>
                </div>
              </div>
              <!-- /.row -->
              <div class="form-group row">
                <label for="ukhuwah_wathoniyah" class="col-md-4 col-form-label text-md-right">{{ __('Ukhuwah Wathoniyah') }}</label>

                <div class="col-md-6">
                  <select class="form-control select2" required="Minimal 0" name="ukhuwah_wathoniyah" style="width: 100%;">
                    <option selected="selected" value="0">Tidak Hadir</option>
                    <option value="10">Hadir</option>
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
                <label for="hafalan_doa" class="col-md-4 col-form-label text-md-right">{{ __('Hafalan Doa Sholat') }}</label>

                <div class="col-md-6">
                  <select class="form-control select2" required="Minimal 0" name="hafalan_doa" style="width: 100%;">
                    <option selected="selected"  value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>
                    <option value="50">50</option>
                    <option value="60">60</option>
                    <option value="70">70</option>
                    <option value="80">80</option>
                    <option value="90">90</option>
                    <option value="100">100</option>
                  </select>
                </div>
              </div>
              <!-- /.row -->
              <div class="form-group row">
                <label for="fardu_kifayah" class="col-md-4 col-form-label text-md-right">{{ __('Fardu Kifayah') }}</label>

                <div class="col-md-6">
                  <select class="form-control select2" required="Minimal 0" name="fardu_kifayah" style="width: 100%;">
                    <option selected="selected" value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>
                    <option value="50">50</option>
                    <option value="60">60</option>
                    <option value="70">70</option>
                    <option value="80">80</option>
                    <option value="90">90</option>
                    <option value="100">100</option>
                  </select>
                </div>
              </div>
              <!-- /.row -->
              <div class="form-group row">
                <label for="baca_quran" class="col-md-4 col-form-label text-md-right">{{ __('Baca Al-Quran') }}</label>

                <div class="col-md-6">
                  <select class="form-control select2" required="Minimal 0" name="baca_quran" value="10" style="width: 100%;">
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>
                    <option value="50">50</option>
                    <option value="60">60</option>
                    <option value="70">70</option>
                    <option value="80">80</option>
                    <option value="90">90</option>
                    <option value="100">100</option>
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
                <label for="sholat_fardu" class="col-md-4 col-form-label text-md-right">{{ __('Sholat Fardhu') }}</label>

                <div class="col-md-6">
                  <select class="form-control select2" required="Minimal 0" name="sholat_fardu" style="width: 100%;">
                    <option selected="selected" value="1">1</option>
                    <option value="1">2</option>
                    <option value="2">3</option>
                    <option value="3">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                    <option value="32">32</option>
                    <option value="33">33</option>
                    <option value="34">34</option>
                    <option value="35">35</option>
                  </select>
                </div>
              </div>
              <!-- /.row -->
              <div class="form-group row">
                <label for="tilawatil_quran" class="col-md-4 col-form-label text-md-right">{{ __('Tilawatil Quran') }}</label>

                <div class="col-md-6">
                  <input type="integer" class="form-control" id="tilawatil_quran" required="Minimal 0" name="tilawatil_quran" placeholder="Halaman Terakhir">
                </div>
              </div>
              <!-- /.row -->
              <div class="form-group row">
                <label for="dzikir" class="col-md-4 col-form-label text-md-right">{{ __('dzikir') }}</label>

                <div class="col-md-6">
                  <input type="integer" required="Minimal 0" name="dzikir" class="form-control" id="dzikir" placeholder="Total Dzikir">
                </div>
              </div>
              <!-- /.row -->
              <!-- /.row -->
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <h5>Buku Harian</h5>
              <div class="form-group row">
                <label for="buku_harian" class="col-md-4 col-form-label text-md-right">{{ __('Buku Harian') }}</label>

                <div class="col-md-6">
                  <select class="form-control select2" required="Minimal 0" name="buku_harian" style="width: 100%;">
                    <option selected="selected" value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>
                    <option value="50">50</option>
                    <option value="60">60</option>
                    <option value="70">70</option>
                    <option value="80">80</option>
                    <option value="90">90</option>
                    <option value="100">100</option>
                  </select>
                </div>
              </div>
              <!-- /.row -->

              <!-- /.row -->
            </div>
            <div>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <!-- /.card-body -->

          </form>
            </div>
            <!-- <div class="modal-footer">

        </div> -->
        </div>
    </div>
</div>





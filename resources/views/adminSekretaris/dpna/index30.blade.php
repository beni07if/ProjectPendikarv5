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
                                        {{--  <th> Nama </th>  --}}
                                        <th>Kehadiran</th>
                                        <th>Tugas Terstruktur</th>
                                        <th>Ujian Kompetensi</th>
                                        <th>Aktivitas Harian</th>
                                        <th>Buku Harian</th>
                                        <th>NP </th>
                                        <th>Keterangan </th>
                                      </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                  </table>
                                  <div class="card-header">
                                    <?php $no = 0; ?>
                                   @if (Auth::check())
                                   @foreach($dpna as $nP)
                                    $nP->pekan_ke;
                                    @endforeach
                                   @endif
                                                                                {{--  <b>DPNA</b> <a class="float-right text-muted">{{ number_format($dpna,2) }} | {{ number_format($dpna2,2)/16 }}</a><br>  --}}
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




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
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Panduan</h1>
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

          <!-- Profile Image -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#beranda" data-toggle="tab">Beranda</a></li>
                  <li class="nav-item"><a class="nav-link" href="#nilaiPeriodik" data-toggle="tab">Nilai Periodik</a></li>
                  <li class="nav-item"><a class="nav-link" href="#dpns" data-toggle="tab">dpns</a></li>
                  <li class="nav-item"><a class="nav-link" href="#dpna" data-toggle="tab">dpna</a></li>
                  <li class="nav-item"><a class="nav-link" href="#pengaduan" data-toggle="tab">pengaduan</a></li>
                  <li class="nav-item"><a class="nav-link" href="#keluarga" data-toggle="tab">keluarga</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="beranda">
                    <!-- Post -->
                    <div class="post">
                        <h5>Info Beranda</h5>
                      <div class="card-body box-profile">
                        <div class="text-center">
                        <img id="gambarPengaduan" src="{{ asset('assets/images/beranda.png') }}" alt="User profile picture">
                        <p>
                        beranda
                      </p>
                        </div>
                      </div>
                      <!-- /.user-block -->


                      <h5>Edit Mahasiswa</h5>
                      <div class="card-body box-profile">
                        <div class="text-center">
                        <img id="gambarPengaduan" src="{{ asset('assets/images/berandaEditMhs.png') }}" alt="User profile picture">
                        <p>
                        beranda
                      </p>
                        </div>
                      </div>
                      <!-- /.user-block -->
                    </div>
                    <!-- /.post -->

                  </div>
                  <div class="tab-pane" id="nilaiPeriodik">
                    <!-- Post -->
                    <div class="post">
                        <h5>Info Nilai Periodik (Sekretaris, Tutor, Mahasiswa)</h5>
                      <div class="card-body box-profile">
                        <div class="text-center">
                        <img id="gambarPengaduan" src="{{ asset('assets/images/panduanMhs/nilaiPeriodikMhs.png') }}" alt="User profile picture">
                        <p>
                        nilai periodik
                      </p>
                        </div>
                      </div>
                      <!-- /.user-block -->
                      <h5>Info Tambah Nilai Periodik (Sekretaris)</h5>
                      <div class="card-body box-profile">
                        <div class="text-center">
                        <img id="gambarPengaduan" src="{{ asset('assets/images/panduanMhs/nilaiPeriodikMhs.png') }}" alt="User profile picture">
                        <p>
                        nilai periodik
                      </p>
                        </div>
                      </div>
                      <!-- /.user-block -->
                    </div>
                    <!-- /.post -->

                  </div>

                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="dpns">
                    <!-- Post -->
                    <div class="post">
                        <h5>Info DPNS</h5>
                      <div class="card-body box-profile">
                        <div class="text-center">
                        <img id="gambarPengaduan" src="{{ asset('assets/images/panduanMhs/dpnsMhs.png') }}" alt="User profile picture">
                        <p>
                        dpns
                      </p>
                        </div>
                      </div>
                      <!-- /.user-block -->
                    </div>
                    <!-- /.post -->

                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="dpna">
                    <!-- Post -->
                    <div class="post">
                        <h5>Info DPNA</h5>
                      <div class="card-body box-profile">
                        <div class="text-center">
                        <img id="gambarPengaduan" src="{{ asset('assets/images/panduanMhs/dpnaMhs.png') }}" alt="User profile picture">
                        <p>
                        dpna
                      </p>
                        </div>
                      </div>
                      <!-- /.user-block -->
                    </div>
                    <!-- /.post -->

                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="pengaduan">
                    <!-- Post -->
                    <div class="post">
                        <h5>Info Pengaduan</h5>
                      <div class="card-body box-profile">
                        <div class="text-center">
                        <img id="gambarPengaduan" src="{{ asset('assets/images/panduanMhs/pengaduanMhs.png') }}" alt="User profile picture">
                        <p>
                        pengaduan
                      </p>
                        </div>
                      </div>
                      <!-- /.user-block -->
                    </div>
                    <!-- /.post -->

                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="keluarga">
                    <!-- Post -->
                    <div class="post">
                        <h5>Info Keluarga</h5>
                      <div class="card-body box-profile">
                        <div class="text-center">
                        <img id="gambarPengaduan" src="{{ asset('assets/images/panduanMhs/daftarKeluargaMhs.png') }}" alt="User profile picture">
                        <p>
                        keluarga
                      </p>
                        </div>
                      </div>
                      <!-- /.user-block -->
                    </div>
                    <!-- /.post -->

                  </div>
                  <!-- /.tab-pane -->

                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col -->
        </div
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


@endsection

<!-- jQuery -->
<script src="{{asset ('assets/dist/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset ('assets/dist/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{asset ('assets/dist/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset ('assets/dist/dist/js/demo.js') }}"></script>

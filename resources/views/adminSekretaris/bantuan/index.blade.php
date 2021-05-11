
@extends('layouts.master')

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
                  <li class="nav-item"><a class="nav-link active" href="#simulasiPenilaian" data-toggle="tab">Simulasi Kegiatan Pendikar</a></li>
                  <li class="nav-item"><a class="nav-link" href="#komponenPenilaian" data-toggle="tab">Komponen Penilaian</a></li>
                  <li class="nav-item"><a class="nav-link" href="#rumusPenilaian" data-toggle="tab">Rumus Penilaian</a></li>
                  <li class="nav-item"><a class="nav-link" href="#nilaiPeriodik" data-toggle="tab">Nilai Periodik</a></li>
                  <li class="nav-item"><a class="nav-link" href="#dpnsDanDpna" data-toggle="tab">DPNS dan DPNA</a></li>
                  <li class="nav-item"><a class="nav-link" href="#pengaduan" data-toggle="tab">Pengaduan</a></li>
                  <li class="nav-item"><a class="nav-link" href="#keluarga" data-toggle="tab">Keluarga</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="simulasiPenilaian">
                    <!-- Post -->
                    <div class="post">
                        <h5><b>Simulasi Kegiatan Pendikar</b></h5>
                      <div class="card-body box-profile">
                        <div class="text-center">
                        <img id="gambarPengaduan" src="{{ asset('assets/images/panduanMhs/simulasi-kegiatan-pendikar.png') }}" alt="User profile picture">
                        <p>
                        Simulasi Kegiatan Pendikar
                      </p>
                        </div>
                      </div>
                      <!-- /.user-block -->
                    </div>
                    <!-- /.post -->

                  </div>
                  <div class="tab-pane" id="komponenPenilaian">
                    <!-- Post -->
                    <div class="post">
                      <h5><b>Komponen Penilaian</b></h5>
                      <div class="card-body box-profile">
                        <div class="text-center">
                        <img id="gambarPengaduan" src="{{ asset('assets/images/panduanMhs/komponen-bobot-penilaian.png') }}" alt="User profile picture">
                        <p></p>
                        </div>
                      </div>
                      <!-- /.user-block -->

                      <h5><b>Tabel Konversi nilai Sholat</b></h5>
                      <div class="card-body box-profile">
                        <div class="text-center">
                        <img id="gambarPengaduan" src="{{ asset('assets/images/panduanMhs/tabel-konversi-nilai-sholat.png') }}" alt="User profile picture">
                        <p></p>
                        </div>
                      </div>
                      <!-- /.user-block -->

                      <h5><b>Tabel Konversi nilai Tilawatil Quran</b></h5>
                      <div class="card-body box-profile">
                        <div class="text-center">
                        <img id="gambarPengaduan" src="{{ asset('assets/images/panduanMhs/tabel-konversi-nilai-tilawatil-quran.png') }}" alt="User profile picture">
                        <p></p>
                        </div>
                      </div>
                      <!-- /.user-block -->
                    </div>
                    <!-- /.post -->

                  </div>
                  <div class="tab-pane" id="rumusPenilaian">
                    <!-- Post -->
                    <div class="post">
                      <h5><b>Rumus Penilaian</b></h5>
                      <div class="card-body box-profile">
                        <div class="text-center">
                        <img id="gambarPengaduan" src="{{ asset('assets/images/panduanMhs/rumus-perhitungan-nilai-periodik.png') }}" alt="User profile picture">
                        <p></p>
                        </div>
                      </div>
                      <!-- /.user-block -->

                      <h5><b>Simulasi Perhitungan DPNS</b></h5>
                      <div class="card-body box-profile">
                        <div class="text-center">
                        <img id="gambarPengaduan" src="{{ asset('assets/images/panduanMhs/simulasi-penilaian-dpns.png') }}" alt="User profile picture">
                        <p></p>
                        </div>
                      </div>
                      <!-- /.user-block -->
                    </div>
                    <!-- /.post -->

                  </div>

                  <div class="tab-pane" id="nilaiPeriodik">
                    <!-- Post -->
                    <div class="post">
                      <h5><b>Nilai Periodik</b></h5>
                      <div class="card-body box-profile">
                        <div class="text-align-left">
                        <img id="gambarPengaduan" src="{{ asset('assets/images/panduanMhs/nilaiPeriodikMhs.png') }}" alt="User profile picture">
                        <ul>
                            <li>Nilai Periodik adalah rekap nilai mahasiswa setiap pertemuan per-pekan.</li>
                            <li>Mahasiswa melaporkan aktivitas  selama satu pekan kepada sekretaris seperti sholat, dzikir, saritilawah, membaca al-quran, dan buku harian. </li>
                            <li>Mahasiswa yang bertugas sebagai sekretaris akan menginputkan nilai/aktivitas mahasiswa selama satu pekan ke dalam sistem.</li>

                          </ul>
                        </div>
                      </div>
                      <!-- /.user-block -->
                    </div>
                    <!-- /.post -->

                  </div>

                  <div class="tab-pane" id="dpnsDanDpna">
                    <!-- Post -->
                    <div class="post">
                      <h5><b>DPNS</b></h5>
                      <div class="card-body box-profile">
                        <div class="text-align-left">
                        <img id="gambarPengaduan" src="{{ asset('assets/images/panduanMhs/dpnsMhs.png') }}" alt="User profile picture">
                        <p>
                            DPNS (Data Peserta Nilai Sementara) adalah nilai sementara mahasiswa. <br>
                            DPNS 1 merupakan akumulasi nilai periodik mahasiswa satu bulan pertama yang terdiri dari 4 pekan. <br>
                            DPNS 2 merupakan akumulasi nilai periodik mahasiswa dua bulan berikutnya yang terdiri dari 8 pekan. <br>
                            DPNS 3 merupakan akumulasi nilai periodik mahasiswa tiga bulan berikutnya yang terdiri dari 12 pekan.
                        </p>
                        </div>
                      </div>
                      <!-- /.user-block -->
                      <h5><b>DPNA</b></h5>
                      <div class="card-body box-profile">
                        <div class="text-align-left">
                        <img id="gambarPengaduan" src="{{ asset('assets/images/panduanMhs/dpnsMhs.png') }}" alt="User profile picture">
                        <p>
                            DPNA (Data Peserta Nilai Akhir) adalah nilai akhir mahasiswa dalam mengikuti program PENDIKAR UNTAN yang merupakan akumulasi semua nilai periodik sebanyak maksimal 16 pekan.
                        </p>
                        </div>
                      </div>
                      <!-- /.user-block -->
                    </div>
                    <!-- /.post -->
                  </div>

                  <div class="tab-pane" id="pengaduan">
                    <!-- Post -->
                    <div class="post">
                      <h5><b>Pengaduan</b></h5>
                      <div class="card-body box-profile">
                        <div class="text-align-left">
                        <img id="gambarPengaduan" src="{{ asset('assets/images/panduanMhs/pengaduanMhs.png') }}" alt="User profile picture">
                        <p>
                            Menu pengaduan adalah fitur yang dapat digunakan oleh mahasiswa untuk mengirimkan dan menerima pesan ke Koordinator umum PENDIKAR Pancasila UNTAN. <br>
                        </p>
                        </div>
                      </div>
                      <!-- /.user-block -->
                    </div>
                    <!-- /.post -->

                  </div>
                  <div class="tab-pane" id="keluarga">
                    <!-- Post -->
                    <div class="post">
                      <h5><b>Keluarga</b></h5>
                      <div class="card-body box-profile">
                        <div class="text-align-left">
                        <img id="gambarPengaduan" src="{{ asset('assets/images/panduanMhs/daftarKeluargaMhs.png') }}" alt="User profile picture">
                        <p>
                            <ul>
                                <li>Keluarga adalah kumpulan dari beberapa mahasiswa yang satu kelompok dalam program PENDIKAR Pancasila UNTAN. </li>
                                <li>Dalam menu keluarga menampilkan daftar mahasiswa yang satu keluarga dengan user yang sedang login.</li>
                                <li>Pada menu keluarga mahasiswa dapat mengubah data pribadi kecuali NIM, keluarga, dan angkatan. Jika mahasiswa ingin mengubah ketiga data tersebut mereka harus menghubungi Koordinator umum PENDIKAR. Beliau yang memiliki akses penuh terhadap sistem penilaian PENDIKAR Pancasila UNTAN. </li>
                            </ul>
                        </p>
                        </div>
                      </div>
                      <!-- /.user-block -->
                    </div>
                    <!-- /.post -->

                  </div>

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

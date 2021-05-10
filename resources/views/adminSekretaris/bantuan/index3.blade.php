
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
                  <li class="nav-item"><a class="nav-link" href="#nilaiPeriodik" data-toggle="tab">nilaiPeriodik</a></li>
                  <li class="nav-item"><a class="nav-link" href="#dpns" data-toggle="tab">dpns</a></li>
                  <li class="nav-item"><a class="nav-link" href="#dpna" data-toggle="tab">dpna</a></li>
                  <li class="nav-item"><a class="nav-link" href="#pengaduan" data-toggle="tab">pengaduan</a></li>
                  <li class="nav-item"><a class="nav-link" href="#keluarga" data-toggle="tab">keluarga</a></li>
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
                        <img id="gambarPengaduan" src="{{ asset('assets/images/panduanMhs/komponen-penilaian.png') }}" alt="User profile picture">
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
                        <h5><b>Rumus Perhitungan DPNS</b> </h5>
                      <div class="card-body box-profile">
                        <div class="text-center">
                        <img id="gambarPengaduan" src="{{ asset('assets/images/panduanMhs/rumus-perhitungan-nilai-periodik.png') }}" alt="User profile picture">
                        {{--  <p><b>Sholat fardhu </b></p><br>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp; = 35(pekan ke-1) + 30(pekan ke-2) + 25(pekan ke-3) + 20(pekan ke-4)</p><br>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp; = 132(total) dibagi 4(pekan)</p><br>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp; = 27,5</p><br>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp; = 27,5 dikonversi menggunakan tabel konversi sholat, maka menghasilkan nilai <b>80</b></p><br>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp; = 80 x 10%</p><br>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp; = <b>8</b></p><br>

                        <p><b>Dzikir </b></p><br>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp; = 100 (pekan ke-1) + 97 (pekan ke-2) + 98 (pekan ke-3) + 105 (pekan ke-4)</p><br>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp; = 400(total) dibagi 4(pekan)</p><br>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp; = 100</p><br>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp; = 100 dikonversi menggunakan tabel konversi dzikir, maka menghasilkan nilai <b>80</b></p><br>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp; = 80 x 10%</p><br>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp; = <b>8</b></p><br>  --}}
                        </div>
                      </div>
                      <!-- /.user-block -->
                      <h5><b>Simulasi Perhitungan DPNS</b> </h5>
                      <div class="card-body box-profile">
                        <div class="text-center">
                        <img id="gambarPengaduan" src="{{ asset('assets/images/panduanMhs/simulasi-penilaian-dpns.png') }}" alt="User profile picture">
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
                  <div class="tab-pane" id="nilaiPeriodik"
                    <div class="post">
                        <h5>Nilai Periodik</h5>
                      <div class="card-body box-profile">
                        <div class="text-align-left">
                        <img id="nilaiPeriodik" src="{{ asset('assets/images/panduanMhs/nilaiPeriodik.png') }}" alt="User profile picture">
                        <p>
                          <ul>
                            <li>Nilai Periodik adalah rekap nilai mahasiswa setiap pertemuan per-pekan.</li>
                            <li>Mahasiswa melaporkan aktivitas  selama satu pekan kepada sekretaris seperti sholat, dzikir, saritilawah, membaca al-quran, dan buku harian. </li>
                            <li>Mahasiswa yang bertugas sebagai sekretaris akan menginputkan nilai/aktivitas mahasiswa selama satu pekan ke dalam sistem.</li>
                            <li></li>
                          </ul>
                        </p>
                        </div>
                      </div>
                      <!-- /.user-block -->
                    </div>
                    <!-- /.post -->
                  </div>
                  <div class="tab-pane" id="pengaduan"
                    <div class="post">
                        <h5>Pengaduaannn</h5>
                      <div class="card-body box-profile">
                        <div class="text-align-left">
                        <img id="pengaduan" src="{{ asset('assets/images/panduanMhs/nilaiPeriodik.png') }}" alt="User profile picture">
                        <p>
                          <ul>
                            <li>Nilai Periodik adalah rekap nilai mahasiswa setiap pertemuan per-pekan.</li>
                            <li>Mahasiswa melaporkan aktivitas  selama satu pekan kepada sekretaris seperti sholat, dzikir, saritilawah, membaca al-quran, dan buku harian. </li>
                            <li>Mahasiswa yang bertugas sebagai sekretaris akan menginputkan nilai/aktivitas mahasiswa selama satu pekan ke dalam sistem.</li>
                            <li></li>
                          </ul>
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
                        <h5>Menu Pengaduan</h5>
                      <div class="card-body box-profile">
                        <div class="text-align-left">
                        <img id="gambarPengaduan" src="{{ asset('assets/images/panduanMhs/pengaduanMhs.png') }}" alt="User profile picture">
                        <p>
                            Menu pengaduan adalah fitur yang dapat digunakan oleh mahasiswa untuk mengirimkan dan menerima pesan ke Koordinator umum PENDIKAR Pancasila UNTAN yaitu Pak Riadi Budiman ST.,MT. <br>
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
                        <h5>Menu Keluarga</h5>
                      <div class="card-body box-profile">
                        <div class="text-align-left">
                        <img id="gambarPengaduan" src="{{ asset('assets/images/panduanMhs/daftarKeluargaMhs.png') }}" alt="User profile picture">
                        <p>
                          <ul>
                            <li>Keluarga adalah kumpulan dari beberapa mahasiswa yang satu kelompok dalam program PENDIKAR Pancasila UNTAN. </li>
                            <li>Dalam menu keluarga menampilkan daftar mahasiswa yang satu keluarga dengan user yang sedang login.</li>
                            <li>Pada menu keluarga mahasiswa dapat mengubah data pribadi kecuali NIM, keluarga, dan angkatan. Jika mahasiswa ingin mengubah ketiga data tersebut mereka harus menghubungi Pak Riadi Budiman. Beliau yang memiliki akses penuh terhadap sistem penilaian PENDIKAR Pancasila UNTAN. </li>
                          </ul>



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

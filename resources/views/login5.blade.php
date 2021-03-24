@extends('layouts.app')
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Penilaian | PENDIKAR Muslim</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  </head>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card card-primary card-outline float-left" style="width: 300px">
            <div style="padding-top: 15px"></div>

            {{-- <div class="card-header">{{ __('Login') }}</div> --}}
            <h3 class="profile-username text-center">Sistem Penilaian</h3>

            <p class="text-muted text-center">PENDIKAR MUSLIM</p>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                            <div class="social-auth-links text-center mb-3 ">
                                {{-- <p>- Login with -</p> --}}
                                <a href="{{ route('sekretarisIndex') }}" class="btn btn-block btn-info">
                                  <i class=""></i> MAHASISWAaqz
                                </a>
                                {{--  <a href="{{ route('tutorHome') }}" class="btn btn-block btn-info">
                                  <i class=""></i> TUTOR
                                </a>
                                <a href="{{ route('anggotaKeluargaHome') }}" class="btn btn-block btn-info">
                                  <i class=""></i> MAHASISWA
                                </a>  --}}
                                <a href="{{ route('koordinatorIndex') }}" class="btn btn-block btn-info">
                                  <i class=""></i> KOORDINATOR
                                </a>
                              </div>
                              <div class="text-md-left">
                                {{--  <a href="{{ route('register')}}" >Register Sekretaris</a>  --}}
                                {{--  <a href="{{ route('mahasiswa.register')}}" >Register Sekretaris</a>  --}}
                                {{--  <a href="{{ route('mahasiswa.register')}}" >Register Sekretaris</a>  --}}
                            </div>
                        </form>
                        <a href=""  data-toggle="modal" data-target=".bd-example-modal-sm">Register Sekretaris</a><br>
                        {{--  <a href=""  data-toggle="modal" data-target=".bd-example-modal-sm-admin">Register Admin</a>  --}}
            </div>
        </div>
    </div>
</div>

<!-- Register Sekretaris -->
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Register Sekretaris
            <div class="modal-body">
                <form method="POST" action="{{ route('register.mahasiswa.store') }} " enctype="multipart/form-data">
                    @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" required placeholder="Masukan Nama..">
                  </div>
                  <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" required placeholder="Masukan NIM..">
                  </div>
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" required placeholder="Enter email">
                  </div>
                  <div class="form-group">
                      <label for="fakultas">Fakultas</label>
                      <input type="text" class="form-control" id="fakultas" name="fakultas" required placeholder="Masukan Fakultas">
                  </div>
                  <div class="form-group">
                        <label for="prodi">Program Studi</label>
                        <input type="text" class="form-control" id="prodi" name="prodi" required placeholder="Masukan Prodi..">
                 </div>
                  <div class="form-group">
                    <label for="no_hp">Nomor HP</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" required placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="keluarga">Keluarga</label>
                    <input type="text" class="form-control" id="keluarga" name="keluarga" required placeholder="Keluarga">
                </div>
                  <div class="form-group">
                    <label for="foto" class="form-control-label">Foto</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="foto" class="custom-file-input" required placeholder="Masukkan foto"
                                oninvalid="this.setCustomValidity('Masukkan foto')" oninput="this.setCustomValidity('')">
                            <label class="custom-file-label">Choose File</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="periode">Periode</label>
                    <input type="text" class="form-control" id="periode" name="periode" required placeholder="Periode">
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <input type="text" class="form-control" id="role" name="role" value="sekretaris" placeholder="sekretaris" readonly  >
                </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                  </div>
                  <div class="form-group">
                    <label for="password-confirm">Konfirmasi Password</label>

                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
                  {{--  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>  --}}
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  {{--  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>  --}}
                <button type="submit" class="btn btn-primary">Register</button>
                {{--  <a href="" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-sm">Register Sekretaris</a>  --}}
                </div>
              </form>
            </div>
            <!-- <div class="modal-footer">

        </div> -->
        </div>
    </div>
</div>

<!-- Register Admin -->
<div class="modal fade bd-example-modal-sm-admin" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Register Sekretaris
                {{--  <h5 class="modal-title" id="bd-example-modal-sm-admin">Register Sekretaris  --}}
                    <div class="modal-body">
                        <form method="POST" action="{{ route('register.mahasiswa.store') }} "
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name" required
                                        placeholder="Masukan Nama..">
                                </div>
                                <div class="form-group">
                                    <label for="nim">NIM</label>
                                    <input type="text" class="form-control" id="nim" name="nim" required
                                        placeholder="Masukan NIM..">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" id="email" name="email" required
                                        placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="fakultas">Fakultas</label>
                                    <input type="text" class="form-control" id="fakultas" name="fakultas" required
                                        placeholder="Masukan Fakultas">
                                </div>
                                <div class="form-group">
                                    <label for="prodi">Program Studi</label>
                                    <input type="text" class="form-control" id="prodi" name="prodi" required
                                        placeholder="Masukan Prodi..">
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">Nomor HP</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp" required
                                        placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="keluarga">Keluarga</label>
                                    <input type="text" class="form-control" id="keluarga" name="keluarga" required
                                        placeholder="Keluarga">
                                </div>
                                <div class="form-group">
                                    <label for="foto" class="form-control-label">Foto</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="foto" class="custom-file-input" required
                                                placeholder="Masukkan foto"
                                                oninvalid="this.setCustomValidity('Masukkan foto')"
                                                oninput="this.setCustomValidity('')">
                                            <label class="custom-file-label">Choose File</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="periode">Periode</label>
                                    <input type="text" class="form-control" id="periode" name="periode" required
                                        placeholder="Periode">
                                </div>
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <input type="text" class="form-control" id="role" name="role" value="sekretaris"
                                        placeholder="sekretaris" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control" name="password" required
                                        autocomplete="new-password">
                                </div>
                                <div class="form-group">
                                    <label for="password-confirm">Konfirmasi Password</label>

                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">

                                </div>
                                {{--  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>  --}}
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                {{--  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>  --}}
                                <button type="submit" class="btn btn-primary">Register</button>
                                {{--  <a href="" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-sm">Register Sekretaris</a>  --}}
                            </div>
                        </form>
                    </div>
                    <!-- <div class="modal-footer">

        </div> -->
            </div>
        </div>
    </div>

@endsection

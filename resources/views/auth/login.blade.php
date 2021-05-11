<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pendikar Muslim</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('assets/Login_v18/images/icons/favicon.ico') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/Login_v18/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/Login_v18/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/Login_v18/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/Login_v18/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/Login_v18/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/Login_v18/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/Login_v18/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/Login_v18/vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/Login_v18/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/Login_v18/css/main.css') }}">
    <!--===============================================================================================-->

    <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
</head>

<body style="background-color: #666666;">

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <span class="login100-form-title p-b-43">
                        SISTEM PENILAIAN PENDIKAR<br>Login by Mahasiswa
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Email</span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                    </div>

                    {{--  <div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>  --}}

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            Login
                        </button>
                    </div><br>
                    {{--  <a href="" data-toggle="modal" data-target=".bd-example-modal-sm">Register Sekretaris</a><br>  --}}
                    <a href="" data-toggle="modal" data-target="#modal-default">Register Sekretaris</a><br>

                    <div class="text-center p-t-46 p-b-20">
                        <span class="txt2">
                            login by (mahasiswa / koordinator)
                        </span>
                    </div>

                    <div class="login100-form-social flex-c-m">
                        <a href="{{ route('login') }}" class="login100-form-social-item flex-c-m bg1 m-r-5">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </a>

                        <a href="{{ route('admin.login') }}" class="login100-form-social-item flex-c-m bg2 m-r-5">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>

                <div class="login100-more"
                    style="background-image: url('{{ asset('assets/Login_v18/images/login-mahasiswa.jpg')}}');">

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Register Sekretaris</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
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
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select class="form-control select2" required="Minimal 0" name="jenis_kelamin" id="jenis_kelamin">
                                            <option value="laki-laki">Laki-laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        </select>
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
                                        <input type="text" class="form-control" id="no_hp" name="no_hp" onkeypress="return hanyaAngka(event)" required
                                            placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="keluarga">Keluarga</label>
                                        <input type="text" class="form-control" id="keluarga" name="keluarga" onkeypress="return hanyaAngka(event)" required
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
                                        <label for="periode">Angkatan</label>
                                        <select class="form-control select2" required="Minimal 0" name="periode" id="periode">
                                            <option disabled value="2012">2012</option>
                                            <option disabled value="2013">2013</option>
                                            <option disabled value="2014">2014</option>
                                            <option disabled value="2015">2015</option>
                                            <option disabled value="2016">2016</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <input type="text" class="form-control" id="role" name="role" value="sekretaris"
                                            placeholder="sekretaris" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input id="password" type="password" class="form-control" name="password"
                                            required autocomplete="new-password">
                                    </div>
                                    <div class="form-group">
                                        <label for="password-confirm">Konfirmasi Password</label>

                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-success">Register</button>
                                    </div>
                                    {{--  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>  --}}
                                </div>
                                <!-- /.card-body -->

                                {{--  <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Register</button>
                                    <a href="" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-sm">Register Sekretaris</a>
                                </div>  --}}
                            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

        <!--===============================================================================================-->
        <script src="{{ asset('assets/Login_v18/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
        <!--===============================================================================================-->
        <script src="{{ asset('assets/Login_v18/vendor/animsition/js/animsition.min.js') }}"></script>
        <!--===============================================================================================-->
        <script src="{{ asset('assets/Login_v18/vendor/bootstrap/js/popper.js') }}"></script>
        <script src="{{ asset('assets/Login_v18/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <!--===============================================================================================-->
        <script src="{{ asset('assets/Login_v18/vendor/select2/select2.min.js') }}"></script>
        <!--===============================================================================================-->
        <script src="{{ asset('assets/Login_v18/vendor/daterangepicker/moment.min.js') }}"></script>
        <script src="{{ asset('assets/Login_v18/vendor/daterangepicker/daterangepicker.js') }}"></script>
        <!--===============================================================================================-->
        <script src="{{ asset('assets/Login_v18/vendor/countdowntime/countdowntime.js') }}"></script>
        <!--===============================================================================================-->
        <script src="{{ asset('assets/Login_v18/js/main.js') }}"></script>

        <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

        <script>
        function hanyaAngka(event) {
                var angka = (event.which) ? event.which : event.keyCode
                if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                return false;
                return true;
            }
        </script>

        <script src="{{ asset ('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

        <script>
        $(function () {
        bsCustomFileInput.init();
        });
        </script>

</body>

</html>

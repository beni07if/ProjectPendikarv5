<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="{{ asset('assets/dist/css/registerStyle.css') }}" rel="stylesheet">
</head>
<body class="hold-transition register-page" style="background: url('images/bg_untan1.jpg'); ">
<div class="register-box">
  {{--  <div class="register-logo">
    <a href=""><b>Sistem Penilaian Pendikar Muslim</b></a>
  </div>  --}}

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg"><b>Register Sekretaris Pendikar Muslim Universitas Tanjungpura</b></p>

      <form action="../../index.html" method="post">
        <div class="input-group mb-3">
          <input type="text" name="name" class="form-control" placeholder="Nama">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <input type="text" name="nim" class="form-control" placeholder="NIM">
            <div class="input-group-append">
              <div class="input-group-text">
                {{--  <span class="fas fa-user"></span>  --}}
              </div>
            </div>
          </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="form-group">
            {{--  <label>Fakultas</label>  --}}
            <select class="form-control select2 " name="fakultas" style="width: 100%;">
              <option selected="selected">Fakultas</option>
              <option>TEKNIK</option>
              <option>FISIP</option>
              <option>MIPA</option>
              <option>KEDOKTERAN</option>
              <option>KEHUTANAN</option>
              <option>HUKUM</option>
              <option>EKONOMI</option>
              <option>FKIP</option>
              <option>PERTANIAN</option>
            </select>
        </div>
        <div class="form-group">
            {{--  <label>Prodi</label>  --}}
            <select class="form-control select2" name="prodi" style="width: 100%;">
              <option selected="selected">Prodi</option>
              <option>Informatika</option>
              <option>Mesin</option>
              <option>Elektro</option>
              <option>Kimia</option>
              <option>Sipil</option>
              <option>PWK</option>
              <option>Kelautan</option>
              <option>Lingkungan</option>
              <option>Pertambangan</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <input type="text" name="no_hp" class="form-control" placeholder="Nomor HP">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="text" name="keluarga" class="form-control" placeholder="Keluarga">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-users"></span>
              </div>
            </div>
        </div>
        <div class="form-group">
            {{--  <label for="exampleInputFile">File input</label>  --}}
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="foto" class="custom-file-input" id="foto">
                <label class="custom-file-label" for="exampleInputFile">Foto</label>
              </div>
              {{--  <div class="input-group-append">
                <span class="input-group-text" id="">Upload</span>
              </div>  --}}
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="text" name="periode" class="form-control" placeholder="Periode">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-years"></span>
              </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="text" name="role" class="form-control" placeholder="Role">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-users"></span>
              </div>
            </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          {{--  <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>  --}}
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      {{--  <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>  --}}

      <a href="{{ route('welcome') }}" class="text-center">Login</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>

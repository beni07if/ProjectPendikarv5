@extends('layouts.master')

@section('navbarTitle2')
<a href="#" class="nav-link">Keluarga</a>
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Keluarga</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('mahasiswa.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Keluarga</li>
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
                </div>
                @if (session('error'))
                <div class="alert alert danger" role="alert">
                    {{ session('error') }}
                </div>
                @endif
                @if(session()->get('message'))
                <div class="alert alert-succest swalDefaultSuccess" role="alert">
                    <strong class="swalDefaultSuccess">Mantap</strong>{{ session()->get('message')}}
                </div>
                @endif
                <!-- /.card-header -->
                <div class="modal-body">
                    <form method="POST" action="{{ route('mahasiswa.update', ['id' => $mahasiswa->id]) }} "
                        enctype="multipart/form-data">
                        @csrf
                        {{--  @method('PUT')  --}}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $mahasiswa->name }}" required placeholder={{ $mahasiswa->name}}>
                            </div>
                            <div class="form-group">
                                <label for="nim">NIM</label>
                                <input type="text" class="form-control" id="nim" name="nim"
                                    value="{{ $mahasiswa->nim }}" required placeholder=value={{ $mahasiswa->nim }}>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-control select2" required="Minimal 0" name="jenis_kelamin"
                                    id="jenis_kelamin">
                                    <option selected value="{{$mahasiswa->jenis_kelamin}}">{{$mahasiswa->jenis_kelamin}}
                                    </option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $mahasiswa->email }}" required placeholder=value={{ $mahasiswa->email }}>
                            </div>
                            <div class="form-group">
                                <label for="fakultas">Fakultas</label>
                                <input type="text" class="form-control" id="fakultas" name="fakultas"
                                    value="{{ $mahasiswa->fakultas }}" required placeholder={{ $mahasiswa->fakultas }}>
                            </div>
                            <div class="form-group">
                                <label for="prodi">Program Studi</label>
                                <input type="text" class="form-control" id="prodi" name="prodi"
                                    value="{{ $mahasiswa->prodi }}" required placeholder={{ $mahasiswa->prodi }}>
                            </div>
                            <div class="form-group">
                                <label for="no_hp">Nomor HP</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp"
                                    value="{{ $mahasiswa->no_hp }}" required placeholder={{ $mahasiswa->no_hp }}>
                            </div>
                            <div class="form-group">
                                <label for="keluarga">Keluarga</label>
                                @if (Auth::check())
                                <input type="text" class="form-control" id="keluarga" name="keluarga"
                                    value="{{ $mahasiswa->keluarga }}" required placeholder={{ $mahasiswa->keluarga }}
                                    readonly>
                                @endif
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
                                @if (Auth::check())
                                <input type="text" class="form-control" id="periode" value="{{ $mahasiswa->periode }}"
                                    name="periode" required placeholder={{ $mahasiswa->periode }} readonly>

                                @endif
                            </div>
                            <div class="form-group row">
                                <label for="role" class="col-md-2 col-form-label text-md-left">{{ __('Role') }}</label>
                                <div class="col-md-4">
                                    <select class="form-control select2" required="Minimal 0" name="role"
                                        style="width: 100%;">
                                        <option selected="selected" value="mahasiswa">Anggota Keluraga</option>
                                        <option value="tutor">Tutor</option>

                                    </select>
                                </div>
                            </div>
                            {{--  <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required
                                    autocomplete="new-password">
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">Konfirmasi Password</label>

                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">

                            </div>  --}}
                            {{--  <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                  </div>  --}}
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            {{--  <button type="submit" class="btn btn-primary">Submit</button>  --}}
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
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

<script>
    function hanyaAngka(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
        return false;
        return true;
    }
</script>

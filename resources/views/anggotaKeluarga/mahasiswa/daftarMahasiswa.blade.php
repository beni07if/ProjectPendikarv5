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
                    <div class="card-header">
                        <a href="" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-sm">Tambah Anggota Keluarga</a>
                        {{--  <a href="{{ route('mahasiswa.create') }}" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-sm">Tambah Anggota Pengaduan</a>  --}}
                        {{--  <button type="button" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>  --}}

                    </div>
                    {{--  @if (session('error'))
                    <div class="alert alert danger" role="alert">
                        {{ session('error') }}
                    </div>
                    @endif  --}}
                @if(session()->get('message'))
                        <div class="alert alert-succest swalDefaultSuccess" role="alert">
                            <strong class="swalDefaultSuccess">Mantap</strong>{{ session()->get('message')}}
                        </div>
                    @endif
                     <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    {{--  <th>No</th>  --}}
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Prodi</th>
                                    <th>Fakultas</th>
                                    <th>Jabatan</th>
                                    <th>Nomor HP</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;?>
                                {{--  @for ($i = 0; $i < 10; $i++)  --}}

                                @if (Auth::check())
                                @foreach($mahasiswa as $mhs)
                                <?php $no++; ?>
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $mhs->name }}</td>
                                    <td>{{ $mhs->prodi }}</td>
                                    <td>{{ $mhs->fakultas }}</td>
                                    <td>{{ $mhs->role }}</td>
                                    <td>{{ $mhs->no_hp }}</td>
                                    <td>
                                        <a href="{{ route('editMahasiswa', $mhs->id) }}" type="button" class="btn btn-info btn-sm  fas fa-edit" >Edit</a>
                                        {{--  <p class="btn btn-info btn-xs"><a href="{{ route('showNilaiPeriodik', $mhs->id) }}">view</p>
                                        <p class="btn btn-warning btn-xs"><a href="{{ route('editMahasiswa', $mhs->id) }}">edit</p>  --}}
                                        {{--  <p class="btn btn-danger btn-xs">delete</p>  --}}
                                        <form action="{{ route('mahasiswa.delete', $mhs->id)}}" method="post">
                                            @csrf
                                            <button disabled class="btn btn-danger btn-sm swalDefaultDeleteMahasiswa" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                                {{--  @endfor  --}}
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Mahasiswa</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('mahasiswa.store') }} " enctype="multipart/form-data">
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
                    <label for="prodi">Program Studi</label>
                    <input type="text" class="form-control" id="prodi" name="prodi" required placeholder="Masukan Prodi..">
                  </div>
                  <div class="form-group">
                    <label for="fakultas">Fakultas</label>
                    <input type="text" class="form-control" id="fakultas" name="fakultas" required placeholder="Masukan Fakultas">
                  </div>
                  <div class="form-group">
                    <label for="no_hp">Nomor HP</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" required placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="keluarga">Keluarga</label>
                    @if (Auth::check())
                    <input type="text" class="form-control" id="keluarga" name="keluarga" value="{{ $mhs->keluarga }}" required placeholder="Masukan keluarga" readonly>
                    @endif
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
                    @if (Auth::check())
                    <input type="text" class="form-control" id="periode" value="{{ $mhs->periode }}" name="periode" required placeholder="Masukan Periode.." readonly>

                    @endif
                  </div>
                  <div class="form-group row">
                    <label for="role" class="col-md-2 col-form-label text-md-left">{{ __('Role') }}</label>
                    <div class="col-md-4">
                      <select class="form-control select2" required="Minimal 0" name="role" style="width: 100%;">
                        <option selected="selected"  value="mahasiswa">Anggota Keluraga</option>
                        <option value="tutor">Tutor</option>

                      </select>
                    </div>
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
                  {{--  <button type="submit" class="btn btn-primary">Submit</button>  --}}
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info swalDefaultTambahMahasiswa">Save</button>
                </div>
              </form>
            </div>
            <!-- <div class="modal-footer">

        </div> -->
        </div>
    </div>
</div>





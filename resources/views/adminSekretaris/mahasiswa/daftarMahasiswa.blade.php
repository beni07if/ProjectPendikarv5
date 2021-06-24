@extends('layouts.master')

@section('navbarTitle2')
<a href="#" class="nav-link">Keluarga</a>
@endsection

@section('breadcrumb')
<a href="#" class="nav-link">Sistem Penilaian Pendikar / Keluarga</a>
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
                        <a href="{{ route('tambahMahasiswa') }}" class="btn btn-info" {{$timbul}}> <i class="fas fa-plus"></i> Tambah Anggota Keluarga</a>
                        {{--  <a href="" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-sm" {{$timbul}}>Tambah Anggota Keluarga</a>  --}}
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
                                    <th>Role</th>
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
                                        <a href="{{ route('editMahasiswa', $mhs->id) }}" type="button" class="{{$buttonViewEdit}} "><i class="{{$icon}}"></i> {{$pesan}}</a>
                                        {{--  <p class="btn btn-info btn-xs"><a href="{{ route('showNilaiPeriodik', $mhs->id) }}">view</p>
                                        <p class="btn btn-warning btn-xs"><a href="{{ route('editMahasiswa', $mhs->id) }}">edit</p>  --}}
                                        {{--  <p class="btn btn-danger btn-xs">delete</p>  --}}
                                        <form action="{{ route('mahasiswa.delete', $mhs->id)}}" method="post">
                                            @csrf
                                            <button hidden class="btn btn-danger btn-sm swalDefaultDeleteMahasiswa" type="submit" {{$timbul}}>Delete</button>
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


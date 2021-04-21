@extends('layouts.masterKoordinator')

@section('navbarTitle2')
<a href="#" class="nav-link">Pengaduan</a>
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Pengaduan Mahasiswa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('mahasiswa.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Pengaduan</li>
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
                        {{--  <a href="{{ route('tambahMahasiswa') }}" class="btn btn-info">Tambah Anggota Pengaduan</a>  --}}
                        {{--  <a href="{{ route('mahasiswa.create') }}" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-sm">Tambah Anggota Pengaduan</a>  --}}
                        {{--  <button type="button" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>  --}}

                    </div>
                    {{--  @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div><br />
                    @endif  --}}
                     <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Pesan</th>
                                    <th>Balasan</th>
                                    {{--  <th>Jam</th>  --}}
                                    {{--  <th>Nomor HP</th>  --}}
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                {{--  @for ($i = 0; $i < 10; $i++)  --}}

                                @if (Auth::check())
                                {{--  @foreach($pengaduan as $pesan)  --}}

                                @foreach($mahasiswa as $mhs)
                                @foreach($mhs->Pengaduan as $pesan)
                                <?php $no++;?>
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $mhs->name }}</td>
                                    <td>{{ $pesan->pesan }} <br><p class="text-muted">( {{ $pesan->tanggal }} ({{ $pesan->jam }}) )</td>
                                    <td>{{ $pesan->balasan }} <br><p class="text-muted">( {{ $pesan->tanggal_balas }} ({{ $pesan->jam_balas }}) )</td>
                                    {{--  <td>{{ $pesan->tanggal }}</td>
                                    <td>{{ $pesan->jam }}</td>  --}}
                                    <td></td>
                                    {{--  <td>{{ $pesan->no_hp }}</td>  --}}
                                    <td>
                                        <a href="{{ route('pesanVsKoor', $pesan->id) }}" class="btn btn-sm btn-info">Balas</a>
                                        {{--  <a href="{{ route('pesanPersonalVsKoor', $pesan->user_id) }}" class="btn btn-sm btn-info">Detail</a>  --}}
                                        {{--  <p class="btn btn-info btn-xs"><a href="{{ route('showNilaiPeriodik', $pesan->id) }}">view</p>  --}}
                                        {{--  <p class="btn btn-warning btn-xs"><a href="{{ route('editNilaiPeriodik', $pesan->id) }}">edit</p>  --}}
                                        {{-- <a href="{{ route('mahasiswa.edit', $pesan->id) }}" type="button" class="btn btn-sm btn-success">Edit</a> --}}
                                        {{-- <p class="btn btn-danger btn-xs">delete</p> --}}
                                        {{--  <a href="{{ route('pesanVsKoor', $pesan->id) }}" class="btn btn-sm btn-info">Balas</a>  --}}
                                    </td>
                                </tr>
                                @endforeach
                                @endforeach

                                {{--  @endforeach  --}}
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


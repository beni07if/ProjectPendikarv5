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
                                    <th>Pesan</th>
                                    <th>Balasan</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                @if (Auth::check())
                                @foreach($pengaduan as $pesan)

                                {{--  @foreach($mahasiswa as $mhs)
                                @foreach($mhs->Pengaduan as $pesan)  --}}
                                <?php $no++; ?>
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $pesan->pesan }} <br> ( {{ $pesan->tanggal }} ( {{ $pesan->jam }}) )</td>
                                    <td>{{ $pesan->balasan }} <br> ( {{ $pesan->tanggal_balas }} ( {{ $pesan->jam_balas }}) )</td>
                                    <td>
                                        {{--  <a href="{{ route('mahasiswa.create') }}" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-sm">Balas</a>  --}}
                                        <a href="{{ route('pesanVsKoor', $pesan->id) }}" class="btn btn-info">Balas</a>
                                    </td>
                                </tr>
                                @endforeach

                                {{--  @endforeach
                                @endforeach  --}}
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

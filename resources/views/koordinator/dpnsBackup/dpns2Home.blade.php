@extends('layouts.masterKoordinator')

@section('navbarTitle2')
<a href="#" class="nav-link">DPNS 2</a>
@endsection

@section('breadcrumb')
<a href="#" class="nav-link">Sistem Penilaian Pendikar / DPNS 2</a>
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DPNS 2</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('mahasiswa.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">DPNS 2</li>
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
                        {{--  <a href="{{ route('tambahMahasiswa') }}" class="btn btn-info">Tambah Anggota Keluarga</a>
                        --}}
                        {{--  <a href="{{ route('mahasiswa.create') }}" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-sm">Tambah Nilai Periodik</a>  --}}
                        {{--  <button type="button" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>  --}}

                    </div>
                    @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div><br />
                    @endif
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Keluarga</th>
                                    <th>No HP</th>
                                    <th>DPNS 2</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;?>

                                {{-- @for ($i = 0; $i < 10; $i++) --}}

                                @if (Auth::check())
                                @foreach($mahasiswa as $mhs)
                                @foreach($mhs->NilaiPeriodik as $nPeriodik)
                                <?php $no++;
                                $kehadiran = $nPeriodik->kehadiran;
                                $tugasTerstruktur = (($nPeriodik->ukhuwah_islamiyah)+($nPeriodik->ukhuwah_wathoniyah))/2;
                                $ujianKompetensi = (($nPeriodik->fardu_kifayah)+($nPeriodik->hafalan_doa)+($nPeriodik->baca_quran))/3;
                                $aktivitasHarian = (($nPeriodik->sholat_fardu)+($nPeriodik->dzikir)+($nPeriodik->tilawatil_quran))/3;
                                $dpns1 = ($kehadiran+$ujianKompetensi+$ujianKompetensi+$aktivitasHarian)
                                ?>
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $mhs->name }}</td>
                                    <td>{{ $mhs->keluarga }}</td>
                                    <td>{{ $mhs->no_hp }}</td>
                                    <td>{{ number_format($dpns1,2) }}</td>
                                    <td>
                                        <a href="{{ route('dpns2DetailKoordinator', $mhs->id) }}" type="button" class="btn btn-sm btn-info">view</a>
                                        {{--  <p class="btn btn-warning btn-xs"><a href="{{ route('editNilaiPeriodik', $nPeriodik->id, $nPeriodik->mahasiswa_id) }}">edit
                                        </p> --}}
                                        {{--  <a href="{{ route('nilaiPeriodik.edit', $nPeriodik->id)}}" type="button"
                                            class="btn btn-sm btn-warning">Edit</a>  --}}
                                        {{--  <p class="btn btn-danger btn-xs">delete</p>  --}}
                                        {{--  <form action="{{ route('nilaiPeriodik.destroy', $nPeriodik->id)}}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>  --}}
                                    </td>
                                </tr>
                                @endforeach
                                @endforeach
                                @endif
                                {{-- @endfor --}}
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



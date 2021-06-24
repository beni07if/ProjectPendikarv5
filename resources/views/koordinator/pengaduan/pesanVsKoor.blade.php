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
                    <h1>Balas pesan ke Mahasiswa</h1>
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
  <div class="container-fluid">

    <!-- Timelime example  -->
    <div class="row">
      <div class="col-md-12">
        <!-- The time line -->
        <div class="timeline">
          <!-- timeline time label -->
          <div class="time-label">
            {{--  <span class="bg-red">17 Jun. 2020</span>  --}}
          </div>
          <!-- /.timeline-label -->
          {{--  @if(session()->get('success'))
          <div class="alert alert-success">
            {{ session()->get('success') }}
          </div><br/>
        @endif  --}}
          <!-- timeline item -->
          <div>
            <i class="fas fa-envelope bg-blue"></i>
            <div class="timeline-item">
              <span class="time"><i class="fas fa-clock"></i> 12:05</span>
              <h3 class="timeline-header">Pengirim : Pak Riadi Budiman ST.MT. </h3>
                {{--  @if (Auth::check())  --}}
                @foreach ($pengaduan as $pesan)
                <!-- form start -->
                <form method="POST" action="{{ route('balasPesan', $pesan->id) }} ">
                    @csrf
                    {{--  @csrf_field  --}}
                    {{--  {{ method_field('PUT') }}  --}}
                    <!-- /.card-header -->
                    {{--  <div><p>{{ $pesan->pesan }} </p></div>  --}}
                    <input type="text" hidden class="form-control" id="user_id" name="user_id" value="{{ $pesan->user_id }}" required>
                    <input type="text" hidden class="form-control" id="pesan" name="pesan" value="{{ $pesan->pesan }}" required>
                    <input type="text" hidden class="form-control" id="tanggal" name="tanggal" value="{{$pesan->tanggal}}" required>
                    <input type="text" hidden class="form-control" id="jam" name="jam" value="{{ $pesan->jam}}" required>
                    <input type="text" hidden class="form-control" id="tanggal_balas" name="tanggal_balas"
                        value=<?php date_default_timezone_set('Asia/Jakarta'); echo date(' d-M-Y ') ?> required>
                    <input type="text" hidden class="form-control" id="jam_balas" name="jam_balas"
                        value=<?php date_default_timezone_set('Asia/Jakarta'); echo date(' H:i ') ?> required>
                    <div class="card-body">
                        <div class="col-sm-12">
                            <!-- textarea -->
                            <div class="form-group">
                                <textarea class="form-control" id="balasan" name="balasan" rows="3" placeholder="Enter ..."></textarea>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success swalDefaultSuccessPesanVsKoor"><i class="fa fa-send"></i> Kirim</button>
                        </div>
                    </div>

                    <!-- /.card-body -->
                </form>
                @endforeach
                {{--  @endif  --}}
            </div>
          </div>
          <!-- END timeline item -->
        </div>
      </div>
      <!-- /.col -->
    </div>
  </div>
  <!-- /.timeline -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

@extends('layouts.master')

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
                    <h1>Kirim pesan ke Mahasiswa x</h1>
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
          @if(session()->get('success'))
          <div class="alert alert-success">
            {{ session()->get('success') }}
          </div><br/>
        @endif
          <!-- timeline item -->
          <div>
            <i class="fas fa-envelope bg-blue"></i>
            <div class="timeline-item">
              <span class="time"><i class="fas fa-clock"></i> 12:05</span>
              <h3 class="timeline-header">Riadi Budiman ST.MT. </h3>
                <form method="POST" action="{{ route('pengaduan.sendMhs') }}" enctype="multipart/form-data" >
                    @csrf
                    <div class="col-sm-auto">
                        <!-- textarea -->
                        {{--  <input type="text" name="user_id" value={{ Auth::user()->id }} >  --}}
                        <div class="form-group">
                          <textarea class="form-control" name="pesan" rows="3" placeholder="Isi pesan.."></textarea>
                        </div>
                        <button type="submit" class="btn btn-info">Kirim</button>
                      </div>
                </form>
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

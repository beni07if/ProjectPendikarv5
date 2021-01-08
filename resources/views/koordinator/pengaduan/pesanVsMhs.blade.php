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
                    <h6>Kirim pesan ke Pak Riadi Budiman ST. MT.</h6>
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
                <span class="time"><i class="fas fa-clock"></i><?php date_default_timezone_set('Asia/Jakarta'); echo date(' l, d-M-Y / h : i ') ?></span>
                <h3 class="timeline-header"><a href="#">{{ Auth::user()->name }}</a> </h3>
                <form method="POST" action="{{ route('pengaduan.sendMhs') }} " enctype="multipart/form-data">
                @csrf
            <div class="card-body">
              <div class="form-group">
                {{--  <label for="user_id">User ID</label>  --}}
                <input type="text" hidden  class="form-control" id="user_id" name="user_id" value={{ Auth::user()->id }} required>
                <input type="text" hidden  class="form-control" id="tanggal" name="tanggal" value=<?php date_default_timezone_set('Asia/Jakarta'); echo date(' d-M-Y ') ?> required>
                <input type="text" hidden class="form-control" id="jam" name="jam" value=<?php date_default_timezone_set('Asia/Jakarta'); echo date(' H:i ') ?> required>
              </div>
              <div class="form-group">
                {{--  <label for="pesan">Pesan</label>  --}}
                <textarea type="text-area" class="form-control" id="pesan" name="pesan" required placeholder="Pesan"></textarea>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
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

<script type=”text/javascript”>
    document.querySelector(".third").addEventListener('click', function(){
        swal("Our First Alert", "With some body text and success icon!", "success");
      });
</script>

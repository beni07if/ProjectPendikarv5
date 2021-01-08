
@extends('layouts.master')

@section('navbarTitle2')
<a href="#" class="nav-link">Home</a>
@endsection

@section('breadcrumb')
<a href="#" class="nav-link">Sistem Penilaian Pendikar / Home</a>
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Panduan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">User Profile</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="" src="{{ asset('assets/images/biodata_user.png') }}" alt="User profile picture">
              </div>
            </div>
            <div class="card-body box-profile">
                <div class="text-center">
                  <img class="" src="{{ asset('assets/images/dpns.png') }}" alt="User profile picture">
                </div>
              </div>
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="" src="{{ asset('assets/images/nilai_periodik.png') }}" alt="User profile picture">
                </div>
              </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


@endsection


@extends('layouts.master')

@section('navbarTitle2')
<a href="#" class="nav-link">Home</a>
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>DPNS Mahasiswa, {{ Auth::user()->name }}</h1>
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
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                     src="{{ asset('assets/images/pendikarv1/beni.png') }}"
                     alt="User profile picture">
              </div>

              <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

              <p class="text-muted text-center">{{ Auth::user()->nim }}</p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Keluarga</b> <a class="float-right text-muted">{{ Auth::user()->keluarga }}</a>
                </li>
                <li class="list-group-item">
                  <b>Prodi</b> <a class="float-right text-muted">{{ Auth::user()->prodi }}</a>
                </li>
                <li class="list-group-item">
                    <b>Fakultas</b> <a class="float-right text-muted">{{ Auth::user()->fakultas }}</a>
                </li>
                <li class="list-group-item">
                    <b>DPNS 3</b> <a class="float-right text-muted">xxx</a>
                </li>
              </ul>

              {{--  <b href="#" class="btn btn-primary btn-block"><b>Follow</b></b>  --}}
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            {{--  <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item nav-link text-muted " >Pilih DPNS</li>
               </ul>
            </div><!-- /.card-header -->  --}}
            <div class="card-body">
                <!-- Horizontal Form -->
              <!-- form start -->
              <form class="form-horizontal">
                <div class="input-group-btn clearfix">
                    <label>Pilih DPNS</label>
                    <select class="form-control select2 "  style="width: 100%;">
                      <option selected="selected">DPNS 1</option>
                      <option>DPNS 2</option>
                      <option>DPNS 3</option>
                      <option disabled="disabled">DPNS 4</option>
                    </select>
                  </div>
                  <!-- /.form-group -->
                  <!-- /.card-header -->
                  <div class="card-body table-responsive">
                    <section class="content">
                        <div class="container-fluid">
                          <!-- SELECT2 EXAMPLE -->
                          <div class="card card-default">
                            <div class="card-header">
                              <h3 class="card-title">Input Nilai Periodik</h3>

                              <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                              </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <!-- form start -->
                              <form role="form">
                                <div class="form-group row">
                                  <label for="name" class="col-md-2 col-form-label text-md-left">{{ __('Nama Mahasiswa') }}</label>

                                  <div class="col-md-4">
                                    <select class="form-control select2" style="width: 100%;">
                                      {{-- @if(count($nilaiPeriodik) > 0)
                                                    @foreach($nilaiPeriodik as $nPeriodik)
                                                    <option value="{{ $nPeriodik->baca_quran }}">{{ $nPeriodik->baca_quran }}</option>
                                      @endforeach
                                      @else
                                      @endif --}}

                                      @if (Auth::check())
                                      @foreach($mahasiswa as $mhs)
                                      {{-- @if($mhs->keluarga === $user ?? ''->keluarga)  --}}
                                      {{--  @if($mhs->keluarga === $user->keluarga ?? ''->keluarga)  --}}
                                      {{-- <option selected="selected" value="{{ $mhs->name }}"></option> --}}
                                      <option value="{{ $mhs->nim }}" name="mahasiswa_nim">{{ $mhs->name }}</option>
                                      {{--  @endif  --}}
                                      @endforeach
                                      @endif

                                    </select>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="pertermuanke" class="col-md-2 col-form-label text-md-left">{{ __('Pertemuan Ke') }}</label>
                                  <div class="col-md-4">
                                    <select class="form-control select2" style="width: 100%;">
                                      <option selected="selected" name="pekanke" value="1">1</option>
                                      <option name="pekanke" value="2">2</option>
                                      <option name="pekanke" value="3">3</option>
                                      <option name="pekanke" value="4">4</option>
                                      <option name="pekanke" value="5">5</option>
                                      <option name="pekanke" value="6">6</option>
                                      <option name="pekanke" value="7">7</option>
                                      <option name="pekanke" value="8">8</option>
                                      <option name="pekanke" value="9">9</option>
                                      <option name="pekanke" value="10">10</option>
                                      <option name="pekanke" value="11">11</option>
                                      <option name="pekanke" value="12">12</option>
                                      <option name="pekanke" value="13">13</option>
                                      <option name="pekanke" value="14">14</option>
                                      <option name="pekanke" value="15">15</option>
                                      <option name="pekanke" value="16">16</option>

                                    </select>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="tanggal" class="col-md-2 col-form-label text-md-left">{{ __('Tanggal') }}</label>

                                  <div class="col-md-4">
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                      </div>
                                      <input type="text" name="tanggal" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>
                                    </div>
                                  </div>
                                </div>
                                <!-- /.row -->

                                <div class="card-body">
                                  <h5>Kehadiran</h5>
                                  <div class="form-group row">
                                    <label for="kehadiran" class="col-md-4 col-form-label text-md-right">{{ __('Kehadiran') }}</label>

                                    <div class="col-md-6">
                                      <select class="form-control select2" style="width: 100%;">
                                        <option name="kehadiran" selected="selected" value="0">Tidak Hadir</option>
                                        <option name="kehadiran" value="10">Hadir</option>
                                      </select>
                                    </div>
                                  </div>
                                  <!-- /.row -->

                                  <!-- /.row -->
                                </div>
                                <!-- /.card-body -->
                                <div class="card-body">
                                  <h5>Tugas Terstruktur</h5>
                                  <div class="form-group row">
                                    <label for="ukhuwahIslamiyah" class="col-md-4 col-form-label text-md-right">{{ __('Ukhuwah Islamiyah') }}</label>

                                    <div class="col-md-6">
                                      <select class="form-control select2" style="width: 100%;">
                                        <option name="ukhuwahIslamiyah" selected="selected" value="0">Tidak Hadir</option>
                                        <option name="ukhuwahIslamiyah" value="10">Hadir</option>
                                      </select>
                                    </div>
                                  </div>
                                  <!-- /.row -->
                                  <div class="form-group row">
                                    <label for="ukhuwahWathoniyah" class="col-md-4 col-form-label text-md-right">{{ __('Ukhuwah Wathoniyah') }}</label>

                                    <div class="col-md-6">
                                      <select class="form-control select2" style="width: 100%;">
                                        <option name="ukhuwahWathoniyah" selected="selected" value="0">Tidak Hadir</option>
                                        <option name="ukhuwahWathoniyah" value="10">Hadir</option>
                                      </select>
                                    </div>
                                  </div>
                                  <!-- /.row -->

                                  <!-- /.row -->
                                </div>
                                <!-- /.card-body -->
                                <div class="card-body">
                                  <h5>Ujian Kompetensi</h5>
                                  <div class="form-group row">
                                    <label for="hafalanDoa" class="col-md-4 col-form-label text-md-right">{{ __('Hafalan Doa Sholat') }}</label>

                                    <div class="col-md-6">
                                      <select class="form-control select2" style="width: 100%;">
                                        <option selected="selected" name="hafalanDoa" value="10">10</option>
                                        <option name="hafalanDoa" value="20">20</option>
                                        <option name="hafalanDoa" value="30">30</option>
                                        <option name="hafalanDoa" value="40">40</option>
                                        <option name="hafalanDoa" value="50">50</option>
                                        <option name="hafalanDoa" value="60">60</option>
                                        <option name="hafalanDoa" value="70">70</option>
                                        <option name="hafalanDoa" value="80">80</option>
                                        <option name="hafalanDoa" value="90">90</option>
                                        <option name="hafalanDoa" value="100">100</option>
                                      </select>
                                    </div>
                                  </div>
                                  <!-- /.row -->
                                  <div class="form-group row">
                                    <label for="fardhuKifayah" class="col-md-4 col-form-label text-md-right">{{ __('Fardhu Kifayah') }}</label>

                                    <div class="col-md-6">
                                      <select class="form-control select2" style="width: 100%;">
                                        <option selected="selected" name="fardhuKifayah" value="10">10</option>
                                        <option name="fardhuKifayah" value="20">20</option>
                                        <option name="fardhuKifayah" value="30">30</option>
                                        <option name="fardhuKifayah" value="40">40</option>
                                        <option name="fardhuKifayah" value="50">50</option>
                                        <option name="fardhuKifayah" value="60">60</option>
                                        <option name="fardhuKifayah" value="70">70</option>
                                        <option name="fardhuKifayah" value="80">80</option>
                                        <option name="fardhuKifayah" value="90">90</option>
                                        <option name="fardhuKifayah" value="100">100</option>
                                      </select>
                                    </div>
                                  </div>
                                  <!-- /.row -->
                                  <div class="form-group row">
                                    <label for="bacaQuran" class="col-md-4 col-form-label text-md-right">{{ __('Baca Al-Quran') }}</label>

                                    <div class="col-md-6">
                                      <select class="form-control select2" name="bacaQuran" value="10" style="width: 100%;">
                                        <option name="bacaQuran" value="20">20</option>
                                        <option name="bacaQuran" value="30">30</option>
                                        <option name="bacaQuran" value="40">40</option>
                                        <option name="bacaQuran" value="50">50</option>
                                        <option name="bacaQuran" value="60">60</option>
                                        <option name="bacaQuran" value="70">70</option>
                                        <option name="bacaQuran" value="80">80</option>
                                        <option name="bacaQuran" value="90">90</option>
                                        <option name="bacaQuran" value="100">100</option>
                                      </select>
                                    </div>
                                  </div>
                                  <!-- /.row -->

                                  <!-- /.row -->
                                </div>
                                <!-- /.card-body -->
                                <div class="card-body">
                                  <h5>Aktivitas Harian</h5>
                                  <div class="form-group row">
                                    <label for="sholatFardhu" class="col-md-4 col-form-label text-md-right">{{ __('Sholat Fardhu') }}</label>

                                    <div class="col-md-6">
                                      <select class="form-control select2" style="width: 100%;">
                                        <option selected="selected" name="sholatFardhu" value="">1</option>
                                        <option name="sholatFardhu" value="">2</option>
                                        <option name="sholatFardhu" value="">3</option>
                                        <option name="sholatFardhu" value="">4</option>
                                        <option name="sholatFardhu" value="">5</option>
                                        <option name="sholatFardhu" value="">6</option>
                                        <option name="sholatFardhu" value="">7</option>
                                        <option name="sholatFardhu" value="">8</option>
                                        <option name="sholatFardhu" value="">9</option>
                                        <option name="sholatFardhu" value="">10</option>
                                        <option name="sholatFardhu" value="">11</option>
                                        <option name="sholatFardhu" value="">12</option>
                                        <option name="sholatFardhu" value="">13</option>
                                        <option name="sholatFardhu" value="">14</option>
                                        <option name="sholatFardhu" value="">15</option>
                                        <option name="sholatFardhu" value="">16</option>
                                        <option name="sholatFardhu" value="">17</option>
                                        <option name="sholatFardhu" value="">18</option>
                                        <option name="sholatFardhu" value="">19</option>
                                        <option name="sholatFardhu" value="">20</option>
                                        <option name="sholatFardhu" value="">21</option>
                                        <option name="sholatFardhu" value="">22</option>
                                        <option name="sholatFardhu" value="">23</option>
                                        <option name="sholatFardhu" value="">24</option>
                                        <option name="sholatFardhu" value="">25</option>
                                        <option name="sholatFardhu" value="">26</option>
                                        <option name="sholatFardhu" value="">27</option>
                                        <option name="sholatFardhu" value="">28</option>
                                        <option name="sholatFardhu" value="">29</option>
                                        <option name="sholatFardhu" value="">30</option>
                                        <option name="sholatFardhu" value="">31</option>
                                        <option name="sholatFardhu" value="">32</option>
                                        <option name="sholatFardhu" value="">33</option>
                                        <option name="sholatFardhu" value="">34</option>
                                        <option name="sholatFardhu" value="">35</option>
                                      </select>
                                    </div>
                                  </div>
                                  <!-- /.row -->
                                  <div class="form-group row">
                                    <label for="tilawatilQuran" class="col-md-4 col-form-label text-md-right">{{ __('Tilawatil Quran') }}</label>

                                    <div class="col-md-6">
                                      <input type="integer" class="form-control" id="tilawatilQuran" name="tilawatilQuran" placeholder="Halaman Terakhir">
                                    </div>
                                  </div>
                                  <!-- /.row -->
                                  <div class="form-group row">
                                    <label for="dzikir" class="col-md-4 col-form-label text-md-right">{{ __('Dzikir') }}</label>

                                    <div class="col-md-6">
                                      <input type="integer" class="form-control" id="dzikir" placeholder="Total Dzikir">
                                    </div>
                                  </div>
                                  <!-- /.row -->
                                  <!-- /.row -->
                                </div>

                                <!-- /.card-header -->
                                <div class="card-body">
                                  <h5>Buku Harian</h5>
                                  <div class="form-group row">
                                    <label for="bukuHarian" class="col-md-4 col-form-label text-md-right">{{ __('Buku Harian') }}</label>

                                    <div class="col-md-6">
                                      <select class="form-control select2" style="width: 100%;">
                                        <option selected="selected" name="bukuHarian" value="10">10</option>
                                        <option name="bukuHarian" value="20">20</option>
                                        <option name="bukuHarian" value="30">30</option>
                                        <option name="bukuHarian" value="40">40</option>
                                        <option name="bukuHarian" value="50">50</option>
                                        <option name="bukuHarian" value="60">60</option>
                                        <option name="bukuHarian" value="70">70</option>
                                        <option name="bukuHarian" value="80">80</option>
                                        <option name="bukuHarian" value="90">90</option>
                                        <option name="bukuHarian" value="100">100</option>
                                      </select>
                                    </div>
                                  </div>
                                  <!-- /.row -->

                                  <!-- /.row -->
                                </div>
                                <div>
                                  <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                                <!-- /.card-body -->

                              </form>
                            </div>
                            <!-- /.card -->
                          </div>
                        </div>

                      </section>
                      <div class="card-header">
                        <a href="{{ route('createNilaiPeriodik') }}" class="btn btn-info float-right">Detail</a>
                    </div>
                  </div>
                  <!-- /.card-body -->
                {{--  <div class="card-footer">
                  <button type="submit" class="btn btn-info">Ubah</button>
                </div>  --}}
                <!-- /.card-footer -->
              </form>
            </div><!-- /.card-body -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

@section('chart')
<!-- ChartJS -->
<script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
<!-- page script -->
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label               : 'Digital Goods',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        },
        {
          label               : 'Electronics',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
   // var areaChart       = new Chart(areaChartCanvas, {
    //  type: 'line',
    //  data: areaChartData,
      //options: areaChartOptions
   // })

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
    var lineChartData = jQuery.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false



    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Chrome',
          'IE',
          'FireFox',
          'Safari',
          'Opera',
          'Navigator',
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.


    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = jQuery.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

  })
</script>

@endsection

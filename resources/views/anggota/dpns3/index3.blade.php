
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

                   @if (Auth::check())

                   @foreach($nilaiPeriodik as $nPeriodik)

                   <?php
                   $tugasTerstruktur = (($nPeriodik->ukhuwah_islamiyah)+($nPeriodik->ukhuwah_wathoniyah))/2;
                   $ujianKompetensi = (($nPeriodik->fardu_kifayah)+($nPeriodik->hafalan_doa)+($nPeriodik->baca_quran))/3;
                   $aktivitasHarian = (($nPeriodik->sholat_fardu)+($nPeriodik->dzikir)+($nPeriodik->tilawatil_quran))/3;
                   $dpns3 = (($nPeriodik->kehadiran)+($tugasTerstruktur)+($ujianKompetensi)+($aktivitasHarian));
                   ?>
                   @endforeach
                   @endif
                    <b>DPNS 3</b> <a class="float-right text-muted">{{ number_format($dpns3,2)/2 }}</a>
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
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th> No </th>
                            <th> ID </th>
                            <th>Kehadiran</th>
                            <th>Tugas Terstruktur</th>
                            <th>Ujian Kompetensi</th>
                            <th>Aktivitas Harian</th>
                            <th>Buku Harian</th>
                            <th>Sholat </th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0;?>

                            {{-- @for ($i = 0; $i < 10; $i++) --}}

                           @if (Auth::check())
                           @foreach($nilaiPeriodik as $nPeriodik)
                           <?php
                    if (($nPeriodik->sholat_fardu) > 32)
                            $sholat = 100;
                        elseif (($nPeriodik->sholat_fardu) > 28)
                        $sholat = 90;
                        elseif (($nPeriodik->sholat_fardu) > 25)
                        $sholat = 80;
                        elseif (($nPeriodik->sholat_fardu) > 21)
                        $sholat = 70;
                        elseif (($nPeriodik->sholat_fardu) > 18)
                        $sholat = 60;
                        elseif (($nPeriodik->sholat_fardu) > 14)
                        $sholat = 50;
                        elseif (($nPeriodik->sholat_fardu) > 11)
                        $sholat = 40;
                        elseif (($nPeriodik->sholat_fardu) > 7)
                        $sholat = 30;
                        elseif (($nPeriodik->sholat_fardu) > 4)
                        $sholat = 20;
                        elseif (($nPeriodik->sholat_fardu) > 0)
                        $sholat = 10;
                    else
                        $sholat = 0;
                    ?>
                           <?php $no++;
                           $tugasTerstruktur = (($nPeriodik->ukhuwah_islamiyah)+($nPeriodik->ukhuwah_wathoniyah))/2;
                           $ujianKompetensi = (($nPeriodik->fardu_kifayah)+($nPeriodik->hafalan_doa)+($nPeriodik->baca_quran))/3;
                           $aktivitasHarian = (($nPeriodik->sholat_fardu)+($nPeriodik->dzikir)+($nPeriodik->tilawatil_quran))/3;
                           ?>
                           <tr>
                                <td>{{ $no }}</td>
                               <td>{{ $nPeriodik->id }}</td>
                               <td>{{ $nPeriodik->kehadiran }}</td>
                               <td>{{ $tugasTerstruktur }}</td>
                               <td>{{ number_format($ujianKompetensi,2) }}</td>
                               <td>{{ number_format($aktivitasHarian,2) }}</td>
                               <td>{{ $nPeriodik->buku_harian }}</td>
                               <td>{{ $sholat }}</td>
                               <td>
                                   {{--  <p class="btn btn-info btn-xs"><a href="{{ route('showNilaiPeriodik', $nPeriodik->id) }}">view</p>
                                   <p class="btn btn-warning btn-xs"><a href="{{ route('editNilaiPeriodik', $nPeriodik->id) }}">edit</p>  --}}
                                       <a href="{{ route('nilaiPeriodik.edit', $nPeriodik->id)}}" type="button" class="btn btn-sm btn-success">Edit</a>
                                   {{--  <p class="btn btn-danger btn-xs">delete</p>  --}}
                                   <form action="{{ route('nilaiPeriodik.destroy', $nPeriodik->id)}}" method="post">
                                       @csrf
                                       @method('DELETE')
                                       <button class="btn btn-danger" type="submit">Delete</button>
                                     </form>
                               </td>
                           </tr>
                           @endforeach
                           @endif
                            {{-- @endfor --}}
                        </tbody>
                      </table>
                      <div class="card-header">
                        <a href="{{ route('detailDpns1') }}" class="btn btn-info float-right">Detail</a>
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

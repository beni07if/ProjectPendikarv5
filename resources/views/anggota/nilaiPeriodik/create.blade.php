@extends('layouts.master')

@section('styleCreateNilaiPeriodik')
<link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">

@endsection
@section('navbarTitle2')
<a href="#" class="nav-link">Input Nilai Periodik</a>
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Nilai Periodik</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('mahasiswa.home') }}">Home</a></li>
            <li class="breadcrumb-item active">Input Nilai Periodik</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
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
          <form method="POST" action="{{ route('nilaiPeriodik.store') }} " enctype="multipart/form-data" >
            @csrf
            <div class="form-group row">
              <label for="mahasiswa_id" class="col-md-2 col-form-label text-md-left">{{ __('Nama Mahasiswa') }}</label>

              <div class="col-md-4">
                <select class="form-control select2" name="mahasiswa_id" style="width: 100%;">
                  {{-- @if(count($nilaiPeriodik) > 0)
                                @foreach($nilaiPeriodik as $nPeriodik)
                                <option value="{{ $nPeriodik->baca_quran }}">{{ $nPeriodik->baca_quran }}</option>
                  @endforeach
                  @else
                  @endif --}}

                  @if (Auth::check())
                  @foreach($mahasiswa as $mhs)
                  {{--  @if($mhs->keluarga === $user ?? ''->keluarga)  --}}
                  {{--  @if($mhs->keluarga === $user->keluarga ?? ''->keluarga)  --}}
                  {{-- <option selected="selected" value="{{ $mhs->name }}"></option> --}}
                  <option value="{{ $mhs->id }}" >{{ $mhs->name }}</option>
                  {{--  @endif  --}}
                  @endforeach
                  @endif

                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="pekan_ke" class="col-md-2 col-form-label text-md-left">{{ __('Pertemuan Ke') }}</label>
              <div class="col-md-4">
                <select class="form-control select2" name="pekan_ke" style="width: 100%;">
                  <option selected="selected"  value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="13">13</option>
                  <option value="14">14</option>
                  <option value="15">15</option>
                  <option value="16">16</option>

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
                  <select class="form-control select2" name="kehadiran" style="width: 100%;">
                    <option selected="selected" value="0">Tidak Hadir</option>
                    <option value="10">Hadir</option>
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
                <label for="ukhuwah_islamiyah" class="col-md-4 col-form-label text-md-right">{{ __('Ukhuwah Islamiyah') }}</label>

                <div class="col-md-6">
                  <select class="form-control select2" name="ukhuwah_islamiyah" style="width: 100%;">
                    <option selected="selected" value="0">Tidak Hadir</option>
                    <option value="10">Hadir</option>
                  </select>
                </div>
              </div>
              <!-- /.row -->
              <div class="form-group row">
                <label for="ukhuwah_wathoniyah" class="col-md-4 col-form-label text-md-right">{{ __('Ukhuwah Wathoniyah') }}</label>

                <div class="col-md-6">
                  <select class="form-control select2" name="ukhuwah_wathoniyah" style="width: 100%;">
                    <option selected="selected" value="0">Tidak Hadir</option>
                    <option value="10">Hadir</option>
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
                <label for="hafalan_doa" class="col-md-4 col-form-label text-md-right">{{ __('Hafalan Doa Sholat') }}</label>

                <div class="col-md-6">
                  <select class="form-control select2" name="hafalan_doa" style="width: 100%;">
                    <option selected="selected"  value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>
                    <option value="50">50</option>
                    <option value="60">60</option>
                    <option value="70">70</option>
                    <option value="80">80</option>
                    <option value="90">90</option>
                    <option value="100">100</option>
                  </select>
                </div>
              </div>
              <!-- /.row -->
              <div class="form-group row">
                <label for="fardu_kifayah" class="col-md-4 col-form-label text-md-right">{{ __('Fardu Kifayah') }}</label>

                <div class="col-md-6">
                  <select class="form-control select2" name="fardu_kifayah" style="width: 100%;">
                    <option selected="selected" value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>
                    <option value="50">50</option>
                    <option value="60">60</option>
                    <option value="70">70</option>
                    <option value="80">80</option>
                    <option value="90">90</option>
                    <option value="100">100</option>
                  </select>
                </div>
              </div>
              <!-- /.row -->
              <div class="form-group row">
                <label for="baca_quran" class="col-md-4 col-form-label text-md-right">{{ __('Baca Al-Quran') }}</label>

                <div class="col-md-6">
                  <select class="form-control select2" name="baca_quran" value="10" style="width: 100%;">
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>
                    <option value="50">50</option>
                    <option value="60">60</option>
                    <option value="70">70</option>
                    <option value="80">80</option>
                    <option value="90">90</option>
                    <option value="100">100</option>
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
                <label for="sholat_fardu" class="col-md-4 col-form-label text-md-right">{{ __('Sholat Fardhu') }}</label>

                <div class="col-md-6">
                  <select class="form-control select2" name="sholat_fardu" style="width: 100%;">
                    <option selected="selected" value="1">1</option>
                    <option value="1">2</option>
                    <option value="2">3</option>
                    <option value="3">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                    <option value="32">32</option>
                    <option value="33">33</option>
                    <option value="34">34</option>
                    <option value="35">35</option>
                  </select>
                </div>
              </div>
              <!-- /.row -->
              <div class="form-group row">
                <label for="tilawatil_quran" class="col-md-4 col-form-label text-md-right">{{ __('Tilawatil Quran') }}</label>

                <div class="col-md-6">
                  <input type="integer" class="form-control" id="tilawatil_quran" name="tilawatil_quran" placeholder="Halaman Terakhir">
                </div>
              </div>
              <!-- /.row -->
              <div class="form-group row">
                <label for="dzikir" class="col-md-4 col-form-label text-md-right">{{ __('dzikir') }}</label>

                <div class="col-md-6">
                  <input type="integer" name="dzikir" class="form-control" id="dzikir" placeholder="Total Dzikir">
                </div>
              </div>
              <!-- /.row -->
              <!-- /.row -->
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <h5>Buku Harian</h5>
              <div class="form-group row">
                <label for="buku_harian" class="col-md-4 col-form-label text-md-right">{{ __('Buku Harian') }}</label>

                <div class="col-md-6">
                  <select class="form-control select2" name="buku_harian" style="width: 100%;">
                    <option selected="selected" value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>
                    <option value="50">50</option>
                    <option value="60">60</option>
                    <option value="70">70</option>
                    <option value="80">80</option>
                    <option value="90">90</option>
                    <option value="100">100</option>
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
</div>

@endsection

@section('scriptCreateNilaiPeriodik')
<!-- Select2 -->
<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script type="text/javascript">
  $('#nPeriodik').DataTable({
    processing: true,
    serverSide: true,
    ajak: "{{ route('nilaiPeriodik.create') }}",
    columns: [{
        data: 'id',
        name: 'id'
      },
      {
        data: 'fardu_kifayah',
        name: 'fardu_kifayah'
      },
      {
        data: 'hafalan_doa',
        name: 'hafalan_doa'
      },
      {
        data: 'baca_quran',
        name: 'baca_quran'
      },
      {
        data: 'dzikir',
        name: 'dzikir'
      },
      {
        data: 'sholat',
        name: 'sholat'
      },
      {
        data: 'action',
        name: 'action',
        orderable: false,
        searchable: false
      }
    ]
  });

  $(function() {
    //Initialize Select2 Elements
    //$('.select2').select2()

    //Initialize Select2 Elements
   // $('.select2bs4').select2({
    //  theme: 'bootstrap4'
  //  })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', {
      'placeholder': 'dd/mm/yyyy'
    })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', {
      'placeholder': 'mm/dd/yyyy'
    })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker({
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
      },
      function(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function() {
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>
@endsection

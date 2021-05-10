@extends('layouts.master')

@section('navbarTitle2')
<a href="#" class="nav-link">Edit Nilai Periodik</a>
@endsection

@section('breadcrumb')
<a href="#" class="nav-link">Sistem Penilaian Pendikar / Detail Nilai Periodik</a>
@endsection

@section('content')

@if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Nilai Periodik</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail Nilai Periodik</li>
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
                {{--  <div class="card-header">
                    <h3 class="card-title">Edit Nilai Periodik</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                class="fas fa-remove"></i></button>
                    </div>
                </div>  --}}

                <!-- /.card-header -->
                <div class="card-body">
                    <!-- form start -->
                    <form method="POST" action="{{ route('nilaiPeriodik.update', $nilaiPeriodik->id) }} " enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')
                        {{$nilaiPeriodik->id}}
                        {{--  <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-left">{{ __('Nama Mahasiswa') }}</label>

                            <div class="col-md-4">
                                <select class="form-control select2" style="width: 100%;" required="Minimal 0" name="user_id">

                                   @if (Auth::check())
                                   @foreach($mahasiswa as $mhs)
                                    <option selected="selected" value="{{ $mhs->name }}">{{ $mhs->name }}</option>
                                   @endforeach
                                   @endif
                                </select>
                            </div>
                        </div>  --}}
                        {{--  <div class="form-group row">
                            <label for="keluarga" class="col-md-2 col-form-label text-md-left">{{ __('Keluarga') }}</label>

                            <div class="col-md-4">
                              <select class="form-control select2" required="Minimal 0" name="keluarga" style="width: 100%;">
                                @if (Auth::check())
                                <option value="{{ $nilaiPeriodik->keluarga }}" >{{ $nilaiPeriodik->keluarga }}</option>
                                @endif
                              </select>
                            </div>
                          </div>
                        <div>  --}}

                            {{--  @if (Auth::check())
                                    @foreach($nilaiPeriodik as $np)
                                    @if($np->keluarga === $user->keluarga)  --}}
                            <div class="form-group row">
                                <label for="pekan_ke"
                                    class="col-md-2 col-form-label text-md-left">{{ __('Pertemuan Ke') }}</label>
                                <div class="col-md-4">
                                    <select class="form-control select2" style="width: 100%;" required="Minimal 0" name="pekan_ke">
                                        {{-- @foreach($mahasiswa as $mhs)
                                        @foreach ($mhs->NilaiPeriodik as $nP)
                                        <option selected value="{{ $nP->pekan_ke }}" required="Minimal 0" name="pekan_ke">{{ $nP->pekan_ke }}</option> --}}
                                        <option selected value="{{ $nilaiPeriodik->pekan_ke }}" required="Minimal 0" name="pekan_ke">{{ $nilaiPeriodik->pekan_ke }}</option>

                                        {{-- @endforeach
                                        @endforeach --}}
                                        {{--  <option selected="selected" required="Minimal 0" name="pekan_ke" value="{{ $nilaiPeriodik->pekan_ke }}">{{ $nilaiPeriodik->pekan_ke }}</option>  --}}
                                        <option required="Minimal 0" name="pekan_ke" value="1">1</option>
                                        <option required="Minimal 0" name="pekan_ke" value="2">2</option>
                                        <option required="Minimal 0" name="pekan_ke" value="3">3</option>
                                        <option required="Minimal 0" name="pekan_ke" value="4">4</option>
                                        <option required="Minimal 0" name="pekan_ke" value="5">5</option>
                                        <option required="Minimal 0" name="pekan_ke" value="6">6</option>
                                        <option required="Minimal 0" name="pekan_ke" value="7">7</option>
                                        <option required="Minimal 0" name="pekan_ke" value="8">8</option>
                                        <option required="Minimal 0" name="pekan_ke" value="9">9</option>
                                        <option required="Minimal 0" name="pekan_ke" value="10">10</option>
                                        <option required="Minimal 0" name="pekan_ke" value="11">11</option>
                                        <option required="Minimal 0" name="pekan_ke" value="12">12</option>
                                        <option required="Minimal 0" name="pekan_ke" value="13">13</option>
                                        <option required="Minimal 0" name="pekan_ke" value="14">14</option>
                                        <option required="Minimal 0" name="pekan_ke" value="15">15</option>
                                        <option required="Minimal 0" name="pekan_ke" value="16">16</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal"
                                    class="col-md-2 col-form-label text-md-left">{{ __('Tanggal') }}</label>

                                <div class="col-md-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" required="Minimal 0" name="tanggal" class="form-control" data-inputmask-alias="datetime" value="{{ $nilaiPeriodik->tanggal }}"
                                            data-inputmask-inputformat="yyyy-mm-dd" data-mask>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="card-body">
                                <h5>Kehadiran</h5>
                                <div class="form-group row">
                                    <label for="kehadiran"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Kehadiran') }}</label>

                                    <div class="col-md-6">
                                        <select class="form-control select2" style="width: 100%;" required="Minimal 0" name="kehadiran">
                                            <option required="Minimal 0" name="kehadiran" selected="selected" value="{{ $nilaiPeriodik->kehadiran }}">{{ $nilaiPeriodik->kehadiran }}</option>
                                            <option required="Minimal 0" name="kehadiran" value="0">Tidak Hadir</option>
                                            <option required="Minimal 0" name="kehadiran" value="100">Hadir</option>
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
                                    <label for="ukhuwah_islamiyah"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Ukhuwah Islamiyah') }}</label>

                                    <div class="col-md-6">
                                        <select class="form-control select2" style="width: 100%;" required="Minimal 0" name="ukhuwah_islamiyah" >
                                            <option required="Minimal 0" name="ukhuwah_islamiyah" selected="selected" value="{{ $nilaiPeriodik->ukhuwah_islamiyah }}">{{ $nilaiPeriodik->ukhuwah_islamiyah }}</option>
                                            <option required="Minimal 0" name="ukhuwah_islamiyah" value="0">Tidak Hadir</option>
                                            <option required="Minimal 0" name="ukhuwah_islamiyah" value="100">Hadir</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <div class="form-group row">
                                    <label for="ukhuwah_wathoniyah"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Ukhuwah Wathoniyah') }}</label>

                                    <div class="col-md-6">
                                        <select class="form-control select2" style="width: 100%;" required="Minimal 0" name="ukhuwah_wathoniyah">
                                            <option required="Minimal 0" name="kehadiran" selected="selected" value="{{ $nilaiPeriodik->ukhuwah_wathoniyah }}">{{ $nilaiPeriodik->ukhuwah_wathoniyah }}</option>
                                            <option required="Minimal 0" name="ukhuwah_wathoniyah" value="0">Tidak Hadir</option>
                                            <option required="Minimal 0" name="ukhuwah_wathoniyah" value="100">Hadir</option>
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
                                    <label for="hafalan_doa"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Hafalan Doa Sholat') }}</label>

                                    <div class="col-md-6">
                                        <select class="form-control select2" style="width: 100%;" required="Minimal 0" name="hafalan_doa">
                                            <option name="hafalan_doa"  selected="selected" value="{{ $nilaiPeriodik->hafalan_doa }}">{{ $nilaiPeriodik->hafalan_doa }}</option>
                                            <option name="hafalan_doa" value="1">1</option>
                                            <option name="hafalan_doa" value="2">2</option>
                                            <option name="hafalan_doa" value="3">3</option>
                                            <option name="hafalan_doa" value="4">4</option>
                                            <option name="hafalan_doa" value="5">5</option>
                                            <option name="hafalan_doa" value="6">6</option>
                                            <option name="hafalan_doa" value="7">7</option>
                                            <option name="hafalan_doa" value="8">8</option>
                                            <option name="hafalan_doa" value="9">9</option>
                                            <option name="hafalan_doa" value="10">10</option>
                                            <option name="hafalan_doa" value="11">11</option>
                                            <option name="hafalan_doa" value="12">12</option>
                                            <option name="hafalan_doa" value="13">13</option>
                                            <option name="hafalan_doa" value="14">14</option>
                                            <option name="hafalan_doa" value="15">15</option>
                                            <option name="hafalan_doa" value="16">16</option>
                                            <option name="hafalan_doa" value="17">17</option>
                                            <option name="hafalan_doa" value="18">18</option>
                                            <option name="hafalan_doa" value="19">19</option>
                                            <option name="hafalan_doa" value="20">20</option>
                                            <option name="hafalan_doa" value="21">21</option>
                                            <option name="hafalan_doa" value="22">22</option>
                                            <option name="hafalan_doa" value="23">23</option>
                                            <option name="hafalan_doa" value="24">24</option>
                                            <option name="hafalan_doa" value="25">25</option>
                                            <option name="hafalan_doa" value="26">26</option>
                                            <option name="hafalan_doa" value="27">27</option>
                                            <option name="hafalan_doa" value="28">28</option>
                                            <option name="hafalan_doa" value="29">29</option>
                                            <option name="hafalan_doa" value="30">30</option>
                                            <option name="hafalan_doa" value="31">31</option>
                                            <option name="hafalan_doa" value="32">32</option>
                                            <option name="hafalan_doa" value="33">33</option>
                                            <option name="hafalan_doa" value="34">34</option>
                                            <option name="hafalan_doa" value="35">35</option>
                                            <option name="hafalan_doa" value="36">36</option>
                                            <option name="hafalan_doa" value="37">37</option>
                                            <option name="hafalan_doa" value="38">38</option>
                                            <option name="hafalan_doa" value="39">39</option>
                                            <option name="hafalan_doa" value="40">40</option>
                                            <option name="hafalan_doa" value="41">41</option>
                                            <option name="hafalan_doa" value="42">42</option>
                                            <option name="hafalan_doa" value="43">43</option>
                                            <option name="hafalan_doa" value="44">44</option>
                                            <option name="hafalan_doa" value="45">45</option>
                                            <option name="hafalan_doa" value="46">46</option>
                                            <option name="hafalan_doa" value="47">47</option>
                                            <option name="hafalan_doa" value="48">48</option>
                                            <option name="hafalan_doa" value="49">49</option>
                                            <option name="hafalan_doa" value="50">50</option>
                                            <option name="hafalan_doa" value="51">51</option>
                                            <option name="hafalan_doa" value="52">52</option>
                                            <option name="hafalan_doa" value="53">53</option>
                                            <option name="hafalan_doa" value="54">54</option>
                                            <option name="hafalan_doa" value="55">55</option>
                                            <option name="hafalan_doa" value="56">56</option>
                                            <option name="hafalan_doa" value="57">57</option>
                                            <option name="hafalan_doa" value="58">58</option>
                                            <option name="hafalan_doa" value="59">59</option>
                                            <option name="hafalan_doa" value="60">60</option>
                                            <option name="hafalan_doa" value="61">61</option>
                                            <option name="hafalan_doa" value="62">62</option>
                                            <option name="hafalan_doa" value="63">63</option>
                                            <option name="hafalan_doa" value="64">64</option>
                                            <option name="hafalan_doa" value="65">65</option>
                                            <option name="hafalan_doa" value="66">66</option>
                                            <option name="hafalan_doa" value="67">67</option>
                                            <option name="hafalan_doa" value="68">68</option>
                                            <option name="hafalan_doa" value="69">69</option>
                                            <option name="hafalan_doa" value="70">70</option>
                                            <option name="hafalan_doa" value="71">71</option>
                                            <option name="hafalan_doa" value="72">72</option>
                                            <option name="hafalan_doa" value="73">73</option>
                                            <option name="hafalan_doa" value="74">74</option>
                                            <option name="hafalan_doa" value="75">75</option>
                                            <option name="hafalan_doa" value="76">76</option>
                                            <option name="hafalan_doa" value="77">77</option>
                                            <option name="hafalan_doa" value="78">78</option>
                                            <option name="hafalan_doa" value="79">79</option>
                                            <option name="hafalan_doa" value="80">80</option>
                                            <option name="hafalan_doa" value="81">81</option>
                                            <option name="hafalan_doa" value="82">82</option>
                                            <option name="hafalan_doa" value="83">83</option>
                                            <option name="hafalan_doa" value="84">84</option>
                                            <option name="hafalan_doa" value="85">85</option>
                                            <option name="hafalan_doa" value="86">86</option>
                                            <option name="hafalan_doa" value="87">87</option>
                                            <option name="hafalan_doa" value="88">88</option>
                                            <option name="hafalan_doa" value="89">89</option>
                                            <option name="hafalan_doa" value="90">90</option>
                                            <option name="hafalan_doa" value="91">91</option>
                                            <option name="hafalan_doa" value="92">92</option>
                                            <option name="hafalan_doa" value="93">93</option>
                                            <option name="hafalan_doa" value="94">94</option>
                                            <option name="hafalan_doa" value="95">95</option>
                                            <option name="hafalan_doa" value="96">96</option>
                                            <option name="hafalan_doa" value="97">97</option>
                                            <option name="hafalan_doa" value="98">98</option>
                                            <option name="hafalan_doa" value="99">99</option>
                                            <option name="hafalan_doa" value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <div class="form-group row">
                                    <label for="fardu_kifayah"
                                        class="col-md-4 col-form-label text-md-right">{{ __('fardu Kifayah') }}</label>

                                    <div class="col-md-6">
                                        <select class="form-control select2" style="width: 100%;" required="Minimal 0" name="fardu_kifayah">
                                            <option name="fardu_kifayah"  selected="selected" value="{{ $nilaiPeriodik->fardu_kifayah }}">{{ $nilaiPeriodik->fardu_kifayah }}</option>
                                            <option name="fardu_kifayah" value="1">1</option>
                                            <option name="fardu_kifayah" value="2">2</option>
                                            <option name="fardu_kifayah" value="3">3</option>
                                            <option name="fardu_kifayah" value="4">4</option>
                                            <option name="fardu_kifayah" value="5">5</option>
                                            <option name="fardu_kifayah" value="6">6</option>
                                            <option name="fardu_kifayah" value="7">7</option>
                                            <option name="fardu_kifayah" value="8">8</option>
                                            <option name="fardu_kifayah" value="9">9</option>
                                            <option name="fardu_kifayah" value="10">10</option>
                                            <option name="fardu_kifayah" value="11">11</option>
                                            <option name="fardu_kifayah" value="12">12</option>
                                            <option name="fardu_kifayah" value="13">13</option>
                                            <option name="fardu_kifayah" value="14">14</option>
                                            <option name="fardu_kifayah" value="15">15</option>
                                            <option name="fardu_kifayah" value="16">16</option>
                                            <option name="fardu_kifayah" value="17">17</option>
                                            <option name="fardu_kifayah" value="18">18</option>
                                            <option name="fardu_kifayah" value="19">19</option>
                                            <option name="fardu_kifayah" value="20">20</option>
                                            <option name="fardu_kifayah" value="21">21</option>
                                            <option name="fardu_kifayah" value="22">22</option>
                                            <option name="fardu_kifayah" value="23">23</option>
                                            <option name="fardu_kifayah" value="24">24</option>
                                            <option name="fardu_kifayah" value="25">25</option>
                                            <option name="fardu_kifayah" value="26">26</option>
                                            <option name="fardu_kifayah" value="27">27</option>
                                            <option name="fardu_kifayah" value="28">28</option>
                                            <option name="fardu_kifayah" value="29">29</option>
                                            <option name="fardu_kifayah" value="30">30</option>
                                            <option name="fardu_kifayah" value="31">31</option>
                                            <option name="fardu_kifayah" value="32">32</option>
                                            <option name="fardu_kifayah" value="33">33</option>
                                            <option name="fardu_kifayah" value="34">34</option>
                                            <option name="fardu_kifayah" value="35">35</option>
                                            <option name="fardu_kifayah" value="36">36</option>
                                            <option name="fardu_kifayah" value="37">37</option>
                                            <option name="fardu_kifayah" value="38">38</option>
                                            <option name="fardu_kifayah" value="39">39</option>
                                            <option name="fardu_kifayah" value="40">40</option>
                                            <option name="fardu_kifayah" value="41">41</option>
                                            <option name="fardu_kifayah" value="42">42</option>
                                            <option name="fardu_kifayah" value="43">43</option>
                                            <option name="fardu_kifayah" value="44">44</option>
                                            <option name="fardu_kifayah" value="45">45</option>
                                            <option name="fardu_kifayah" value="46">46</option>
                                            <option name="fardu_kifayah" value="47">47</option>
                                            <option name="fardu_kifayah" value="48">48</option>
                                            <option name="fardu_kifayah" value="49">49</option>
                                            <option name="fardu_kifayah" value="50">50</option>
                                            <option name="fardu_kifayah" value="51">51</option>
                                            <option name="fardu_kifayah" value="52">52</option>
                                            <option name="fardu_kifayah" value="53">53</option>
                                            <option name="fardu_kifayah" value="54">54</option>
                                            <option name="fardu_kifayah" value="55">55</option>
                                            <option name="fardu_kifayah" value="56">56</option>
                                            <option name="fardu_kifayah" value="57">57</option>
                                            <option name="fardu_kifayah" value="58">58</option>
                                            <option name="fardu_kifayah" value="59">59</option>
                                            <option name="fardu_kifayah" value="60">60</option>
                                            <option name="fardu_kifayah" value="61">61</option>
                                            <option name="fardu_kifayah" value="62">62</option>
                                            <option name="fardu_kifayah" value="63">63</option>
                                            <option name="fardu_kifayah" value="64">64</option>
                                            <option name="fardu_kifayah" value="65">65</option>
                                            <option name="fardu_kifayah" value="66">66</option>
                                            <option name="fardu_kifayah" value="67">67</option>
                                            <option name="fardu_kifayah" value="68">68</option>
                                            <option name="fardu_kifayah" value="69">69</option>
                                            <option name="fardu_kifayah" value="70">70</option>
                                            <option name="fardu_kifayah" value="71">71</option>
                                            <option name="fardu_kifayah" value="72">72</option>
                                            <option name="fardu_kifayah" value="73">73</option>
                                            <option name="fardu_kifayah" value="74">74</option>
                                            <option name="fardu_kifayah" value="75">75</option>
                                            <option name="fardu_kifayah" value="76">76</option>
                                            <option name="fardu_kifayah" value="77">77</option>
                                            <option name="fardu_kifayah" value="78">78</option>
                                            <option name="fardu_kifayah" value="79">79</option>
                                            <option name="fardu_kifayah" value="80">80</option>
                                            <option name="fardu_kifayah" value="81">81</option>
                                            <option name="fardu_kifayah" value="82">82</option>
                                            <option name="fardu_kifayah" value="83">83</option>
                                            <option name="fardu_kifayah" value="84">84</option>
                                            <option name="fardu_kifayah" value="85">85</option>
                                            <option name="fardu_kifayah" value="86">86</option>
                                            <option name="fardu_kifayah" value="87">87</option>
                                            <option name="fardu_kifayah" value="88">88</option>
                                            <option name="fardu_kifayah" value="89">89</option>
                                            <option name="fardu_kifayah" value="90">90</option>
                                            <option name="fardu_kifayah" value="91">91</option>
                                            <option name="fardu_kifayah" value="92">92</option>
                                            <option name="fardu_kifayah" value="93">93</option>
                                            <option name="fardu_kifayah" value="94">94</option>
                                            <option name="fardu_kifayah" value="95">95</option>
                                            <option name="fardu_kifayah" value="96">96</option>
                                            <option name="fardu_kifayah" value="97">97</option>
                                            <option name="fardu_kifayah" value="98">98</option>
                                            <option name="fardu_kifayah" value="99">99</option>
                                            <option name="fardu_kifayah" value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <div class="form-group row">
                                    <label for="baca_quran"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Baca Al-Quran') }}</label>

                                    <div class="col-md-6">
                                        <select class="form-control select2" required="Minimal 0" name="baca_quran" value="10" style="width: 100%;">
                                            <option selected name="baca_quran" value="{{ $nilaiPeriodik->baca_quran }}">{{ $nilaiPeriodik->baca_quran }}</option>
                                            <option name="baca_quran" value="1">1</option>
                                            <option name="baca_quran" value="2">2</option>
                                            <option name="baca_quran" value="3">3</option>
                                            <option name="baca_quran" value="4">4</option>
                                            <option name="baca_quran" value="5">5</option>
                                            <option name="baca_quran" value="6">6</option>
                                            <option name="baca_quran" value="7">7</option>
                                            <option name="baca_quran" value="8">8</option>
                                            <option name="baca_quran" value="9">9</option>
                                            <option name="baca_quran" value="10">10</option>
                                            <option name="baca_quran" value="11">11</option>
                                            <option name="baca_quran" value="12">12</option>
                                            <option name="baca_quran" value="13">13</option>
                                            <option name="baca_quran" value="14">14</option>
                                            <option name="baca_quran" value="15">15</option>
                                            <option name="baca_quran" value="16">16</option>
                                            <option name="baca_quran" value="17">17</option>
                                            <option name="baca_quran" value="18">18</option>
                                            <option name="baca_quran" value="19">19</option>
                                            <option name="baca_quran" value="20">20</option>
                                            <option name="baca_quran" value="21">21</option>
                                            <option name="baca_quran" value="22">22</option>
                                            <option name="baca_quran" value="23">23</option>
                                            <option name="baca_quran" value="24">24</option>
                                            <option name="baca_quran" value="25">25</option>
                                            <option name="baca_quran" value="26">26</option>
                                            <option name="baca_quran" value="27">27</option>
                                            <option name="baca_quran" value="28">28</option>
                                            <option name="baca_quran" value="29">29</option>
                                            <option name="baca_quran" value="30">30</option>
                                            <option name="baca_quran" value="31">31</option>
                                            <option name="baca_quran" value="32">32</option>
                                            <option name="baca_quran" value="33">33</option>
                                            <option name="baca_quran" value="34">34</option>
                                            <option name="baca_quran" value="35">35</option>
                                            <option name="baca_quran" value="36">36</option>
                                            <option name="baca_quran" value="37">37</option>
                                            <option name="baca_quran" value="38">38</option>
                                            <option name="baca_quran" value="39">39</option>
                                            <option name="baca_quran" value="40">40</option>
                                            <option name="baca_quran" value="41">41</option>
                                            <option name="baca_quran" value="42">42</option>
                                            <option name="baca_quran" value="43">43</option>
                                            <option name="baca_quran" value="44">44</option>
                                            <option name="baca_quran" value="45">45</option>
                                            <option name="baca_quran" value="46">46</option>
                                            <option name="baca_quran" value="47">47</option>
                                            <option name="baca_quran" value="48">48</option>
                                            <option name="baca_quran" value="49">49</option>
                                            <option name="baca_quran" value="50">50</option>
                                            <option name="baca_quran" value="51">51</option>
                                            <option name="baca_quran" value="52">52</option>
                                            <option name="baca_quran" value="53">53</option>
                                            <option name="baca_quran" value="54">54</option>
                                            <option name="baca_quran" value="55">55</option>
                                            <option name="baca_quran" value="56">56</option>
                                            <option name="baca_quran" value="57">57</option>
                                            <option name="baca_quran" value="58">58</option>
                                            <option name="baca_quran" value="59">59</option>
                                            <option name="baca_quran" value="60">60</option>
                                            <option name="baca_quran" value="61">61</option>
                                            <option name="baca_quran" value="62">62</option>
                                            <option name="baca_quran" value="63">63</option>
                                            <option name="baca_quran" value="64">64</option>
                                            <option name="baca_quran" value="65">65</option>
                                            <option name="baca_quran" value="66">66</option>
                                            <option name="baca_quran" value="67">67</option>
                                            <option name="baca_quran" value="68">68</option>
                                            <option name="baca_quran" value="69">69</option>
                                            <option name="baca_quran" value="70">70</option>
                                            <option name="baca_quran" value="71">71</option>
                                            <option name="baca_quran" value="72">72</option>
                                            <option name="baca_quran" value="73">73</option>
                                            <option name="baca_quran" value="74">74</option>
                                            <option name="baca_quran" value="75">75</option>
                                            <option name="baca_quran" value="76">76</option>
                                            <option name="baca_quran" value="77">77</option>
                                            <option name="baca_quran" value="78">78</option>
                                            <option name="baca_quran" value="79">79</option>
                                            <option name="baca_quran" value="80">80</option>
                                            <option name="baca_quran" value="81">81</option>
                                            <option name="baca_quran" value="82">82</option>
                                            <option name="baca_quran" value="83">83</option>
                                            <option name="baca_quran" value="84">84</option>
                                            <option name="baca_quran" value="85">85</option>
                                            <option name="baca_quran" value="86">86</option>
                                            <option name="baca_quran" value="87">87</option>
                                            <option name="baca_quran" value="88">88</option>
                                            <option name="baca_quran" value="89">89</option>
                                            <option name="baca_quran" value="90">90</option>
                                            <option name="baca_quran" value="91">91</option>
                                            <option name="baca_quran" value="92">92</option>
                                            <option name="baca_quran" value="93">93</option>
                                            <option name="baca_quran" value="94">94</option>
                                            <option name="baca_quran" value="95">95</option>
                                            <option name="baca_quran" value="96">96</option>
                                            <option name="baca_quran" value="97">97</option>
                                            <option name="baca_quran" value="98">98</option>
                                            <option name="baca_quran" value="99">99</option>
                                            <option name="baca_quran" value="100">100</option>
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
                                    <label for="sholat_fardu"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Sholat fardu') }}</label>

                                    <div class="col-md-6">
                                        <select class="form-control select2" style="width: 100%;" required="Minimal 0" name="sholat_fardu">
                                            <option required="Minimal 0" name="sholat_fardu" selected="selected" value="{{ $nilaiPeriodik->sholat_fardu }}">{{ $nilaiPeriodik->sholat_fardu }}</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="1">1</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="2">2</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="3">3</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="4">4</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="5">5</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="6">6</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="7">7</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="8">8</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="9">9</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="10">10</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="11">11</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="12">12</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="13">13</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="14">14</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="15">15</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="16">16</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="17">17</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="18">18</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="19">19</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="20">20</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="21">21</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="22">22</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="23">23</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="24">24</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="25">25</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="26">26</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="27">27</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="28">28</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="29">29</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="30">30</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="31">31</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="32">32</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="33">33</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="34">34</option>
                                            <option required="Minimal 0" name="sholat_fardu" value="35">35</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <div class="form-group row">
                                    <label for="tilawatil_quran"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Saritilawah Al-Quran') }}</label>

                                    <div class="col-md-6">
                                        <input type="integer" class="form-control" id="tilawatil_quran" required="Minimal 0" name="tilawatil_quran" value="{{ $nilaiPeriodik->tilawatil_quran }}"
                                            placeholder="Halaman Terakhir" onkeypress="return hanyaAngka(event)">
                                    </div>
                                </div>
                                <!-- /.row -->
                                <div class="form-group row">
                                    <label for="dzikir"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Dzikir') }}</label>

                                    <div class="col-md-6">
                                        <input type="integer" class="form-control" id="dzikir" required="Minimal 0" name="dzikir" value="{{ $nilaiPeriodik->dzikir }}"
                                            placeholder="Dzikir dalam jumlah menit.." onkeypress="return hanyaAngka(event)">
                                    </div>
                                </div>
                                <!-- /.row -->
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <h5>Buku Harian</h5>
                                <div class="form-group row">
                                    <label for="buku_harian"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Buku Harian') }}</label>

                                    <div class="col-md-6">
                                        <select class="form-control select2" style="width: 100%;" required="Minimal 0" name="buku_harian">
                                            <option selected name="buku_harian" value="{{ $nilaiPeriodik->buku_harian }}">{{ $nilaiPeriodik->buku_harian }}</option>
                                            <option name="buku_harian" value="1">1</option>
                                            <option name="buku_harian" value="2">2</option>
                                            <option name="buku_harian" value="3">3</option>
                                            <option name="buku_harian" value="4">4</option>
                                            <option name="buku_harian" value="5">5</option>
                                            <option name="buku_harian" value="6">6</option>
                                            <option name="buku_harian" value="7">7</option>
                                            <option name="buku_harian" value="8">8</option>
                                            <option name="buku_harian" value="9">9</option>
                                            <option name="buku_harian" value="10">10</option>
                                            <option name="buku_harian" value="11">11</option>
                                            <option name="buku_harian" value="12">12</option>
                                            <option name="buku_harian" value="13">13</option>
                                            <option name="buku_harian" value="14">14</option>
                                            <option name="buku_harian" value="15">15</option>
                                            <option name="buku_harian" value="16">16</option>
                                            <option name="buku_harian" value="17">17</option>
                                            <option name="buku_harian" value="18">18</option>
                                            <option name="buku_harian" value="19">19</option>
                                            <option name="buku_harian" value="20">20</option>
                                            <option name="buku_harian" value="21">21</option>
                                            <option name="buku_harian" value="22">22</option>
                                            <option name="buku_harian" value="23">23</option>
                                            <option name="buku_harian" value="24">24</option>
                                            <option name="buku_harian" value="25">25</option>
                                            <option name="buku_harian" value="26">26</option>
                                            <option name="buku_harian" value="27">27</option>
                                            <option name="buku_harian" value="28">28</option>
                                            <option name="buku_harian" value="29">29</option>
                                            <option name="buku_harian" value="30">30</option>
                                            <option name="buku_harian" value="31">31</option>
                                            <option name="buku_harian" value="32">32</option>
                                            <option name="buku_harian" value="33">33</option>
                                            <option name="buku_harian" value="34">34</option>
                                            <option name="buku_harian" value="35">35</option>
                                            <option name="buku_harian" value="36">36</option>
                                            <option name="buku_harian" value="37">37</option>
                                            <option name="buku_harian" value="38">38</option>
                                            <option name="buku_harian" value="39">39</option>
                                            <option name="buku_harian" value="40">40</option>
                                            <option name="buku_harian" value="41">41</option>
                                            <option name="buku_harian" value="42">42</option>
                                            <option name="buku_harian" value="43">43</option>
                                            <option name="buku_harian" value="44">44</option>
                                            <option name="buku_harian" value="45">45</option>
                                            <option name="buku_harian" value="46">46</option>
                                            <option name="buku_harian" value="47">47</option>
                                            <option name="buku_harian" value="48">48</option>
                                            <option name="buku_harian" value="49">49</option>
                                            <option name="buku_harian" value="50">50</option>
                                            <option name="buku_harian" value="51">51</option>
                                            <option name="buku_harian" value="52">52</option>
                                            <option name="buku_harian" value="53">53</option>
                                            <option name="buku_harian" value="54">54</option>
                                            <option name="buku_harian" value="55">55</option>
                                            <option name="buku_harian" value="56">56</option>
                                            <option name="buku_harian" value="57">57</option>
                                            <option name="buku_harian" value="58">58</option>
                                            <option name="buku_harian" value="59">59</option>
                                            <option name="buku_harian" value="60">60</option>
                                            <option name="buku_harian" value="61">61</option>
                                            <option name="buku_harian" value="62">62</option>
                                            <option name="buku_harian" value="63">63</option>
                                            <option name="buku_harian" value="64">64</option>
                                            <option name="buku_harian" value="65">65</option>
                                            <option name="buku_harian" value="66">66</option>
                                            <option name="buku_harian" value="67">67</option>
                                            <option name="buku_harian" value="68">68</option>
                                            <option name="buku_harian" value="69">69</option>
                                            <option name="buku_harian" value="70">70</option>
                                            <option name="buku_harian" value="71">71</option>
                                            <option name="buku_harian" value="72">72</option>
                                            <option name="buku_harian" value="73">73</option>
                                            <option name="buku_harian" value="74">74</option>
                                            <option name="buku_harian" value="75">75</option>
                                            <option name="buku_harian" value="76">76</option>
                                            <option name="buku_harian" value="77">77</option>
                                            <option name="buku_harian" value="78">78</option>
                                            <option name="buku_harian" value="79">79</option>
                                            <option name="buku_harian" value="80">80</option>
                                            <option name="buku_harian" value="81">81</option>
                                            <option name="buku_harian" value="82">82</option>
                                            <option name="buku_harian" value="83">83</option>
                                            <option name="buku_harian" value="84">84</option>
                                            <option name="buku_harian" value="85">85</option>
                                            <option name="buku_harian" value="86">86</option>
                                            <option name="buku_harian" value="87">87</option>
                                            <option name="buku_harian" value="88">88</option>
                                            <option name="buku_harian" value="89">89</option>
                                            <option name="buku_harian" value="90">90</option>
                                            <option name="buku_harian" value="91">91</option>
                                            <option name="buku_harian" value="92">92</option>
                                            <option name="buku_harian" value="93">93</option>
                                            <option name="buku_harian" value="94">94</option>
                                            <option name="buku_harian" value="95">95</option>
                                            <option name="buku_harian" value="96">96</option>
                                            <option name="buku_harian" value="97">97</option>
                                            <option name="buku_harian" value="98">98</option>
                                            <option name="buku_harian" value="99">99</option>
                                            <option name="buku_harian" value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.row -->

                                <!-- /.row -->
                            </div>
                            <div>
                                <button type="submit" class="btn btn-success swalDefaultSuccessEdit" {{$opsi}}>{{$pesan}}</button>
                                {{--  <button type="submit" class="btn btn-success swalDefaultSuccessEdit" {{$pesan}}>Simpan</button>  --}}
                            </div>
                            <!-- /.card-body -->
                            {{--  @endif
                            @endforeach
                            @endif  --}}
                        </div>

                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>

    </section>
</div>

@endsection

<script>
function hanyaAngka(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
          return false;
        return true;
      }
</script>

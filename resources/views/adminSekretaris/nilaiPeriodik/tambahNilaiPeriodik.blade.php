@extends('layouts.master')

@section('navbarTitle2')
<a href="#" class="nav-link">Nilai Periodik</a>
@endsection

@section('breadcrumb')
<a href="#" class="nav-link">Sistem Penilaian Pendikar Muslim Untan / Nilai Periodik</a>
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
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
                        <li class="breadcrumb-item active">Nilai Periodik</li>
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
                        {{--  <a href="{{ route('mahasiswa.create') }}" class="btn btn-info" data-toggle="modal"
                        data-target=".bd-example-modal-sm" {{$timbul}}>Tambah Nilai Periodik</a> --}}
                        {{--  <button type="button" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>  --}}

                    </div>
                    {{--  @if(session()->get('success'))
                        <div class="alert alert-success">
                        {{ session()->get('success') }}
                </div><br />
                @endif --}}
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <form method="POST" action="{{ route('nilaiPeriodik.store') }} ">
                        @csrf
                        <div class="form-group row">
                            <label for="mahasiswa_id"
                                class="col-md-2 col-form-label text-md-left">{{ __('Nama') }}</label>

                            <div class="col-md-4">
                                <select class="form-control select2" required="Minimal 0" name="user_id"
                                    style="width: 100%;">
                                    {{--  @if(count($nilaiPeriodik) > 0)
                                @foreach($nilaiPeriodik as $nPeriodik)
                                <option value="{{ $nPeriodik->baca_quran }}">{{ $nPeriodik->baca_quran }}</option>
                                    @endforeach
                                    @else
                                    @endif --}}

                                    @if (Auth::check())
                                    @foreach($mahasiswa as $mahasiswa)
                                    <option value="{{ $mahasiswa->id }}">{{ $mahasiswa->name }}</option>
                                    {{--  @endif  --}}
                                    @endforeach
                                    @endif

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="keluarga"
                                class="col-md-2 col-form-label text-md-left">{{ __('Keluarga') }}</label>

                            <div class="col-md-4">
                                @if (Auth::check())
                                <input type="text" class="form-control" id="keluarga"
                                    value="{{ Auth::user()->keluarga }}" name="keluarga" required
                                    placeholder="Masukan Keluarga.." readonly>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pekan_ke"
                                class="col-md-2 col-form-label text-md-left">{{ __('Pertemuan Ke') }}</label>
                            <div class="col-md-4">
                                <select class="form-control select2" required="Minimal 0" name="pekan_ke"
                                    style="width: 100%;">
                                    <option selected="selected" value="1">1</option>
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
                            <label for="tanggal"
                                class="col-md-2 col-form-label text-md-left">{{ __('Tanggal') }}</label>

                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    {{--  <input type="date" required="Minimal 0" name="tanggal" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>  --}}
                                    <input type="date" required="Minimal 0" name="tanggal" class="form-control"
                                        value=date_default_timezone_set('Asia/Jakarta'); echo date('d-m-Y H:i:s');>

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
                                    <select class="form-control select2" required="Minimal 0" name="kehadiran"
                                        style="width: 100%;">
                                        <option selected="selected" value="0">Tidak Hadir</option>
                                        <option value="100">Hadir</option>
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
                                    <select class="form-control select2" required="Minimal 0" name="ukhuwah_islamiyah"
                                        style="width: 100%;">
                                        <option selected="selected" value="0">Tidak Hadir</option>
                                        <option value="100">Hadir</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.row -->
                            <div class="form-group row">
                                <label for="ukhuwah_wathoniyah"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Ukhuwah Wathoniyah') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control select2" required="Minimal 0" name="ukhuwah_wathoniyah"
                                        style="width: 100%;">
                                        <option selected="selected" value="0">Tidak Hadir</option>
                                        <option value="100">Hadir</option>
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
                                    <select class="form-control select2" required="Minimal 0" name="hafalan_doa"
                                        style="width: 100%;">
                                        <option selected="selected" value="0">0</option>
                                        <option value="1">1</option>
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
                                        <option value="36">36</option>
                                        <option value="37">37</option>
                                        <option value="38">38</option>
                                        <option value="39">39</option>
                                        <option value="40">40</option>
                                        <option value="41">41</option>
                                        <option value="42">42</option>
                                        <option value="43">43</option>
                                        <option value="44">44</option>
                                        <option value="45">45</option>
                                        <option value="46">46</option>
                                        <option value="47">47</option>
                                        <option value="48">48</option>
                                        <option value="49">49</option>
                                        <option value="50">50</option>
                                        <option value="51">51</option>
                                        <option value="52">52</option>
                                        <option value="53">53</option>
                                        <option value="54">54</option>
                                        <option value="55">55</option>
                                        <option value="56">56</option>
                                        <option value="57">57</option>
                                        <option value="58">58</option>
                                        <option value="59">59</option>
                                        <option value="60">60</option>
                                        <option value="61">61</option>
                                        <option value="62">62</option>
                                        <option value="63">63</option>
                                        <option value="64">64</option>
                                        <option value="65">65</option>
                                        <option value="66">66</option>
                                        <option value="67">67</option>
                                        <option value="68">68</option>
                                        <option value="69">69</option>
                                        <option value="70">70</option>
                                        <option value="71">71</option>
                                        <option value="72">72</option>
                                        <option value="73">73</option>
                                        <option value="74">74</option>
                                        <option value="75">75</option>
                                        <option value="76">76</option>
                                        <option value="77">77</option>
                                        <option value="78">78</option>
                                        <option value="79">79</option>
                                        <option value="80">80</option>
                                        <option value="81">81</option>
                                        <option value="82">82</option>
                                        <option value="83">83</option>
                                        <option value="84">84</option>
                                        <option value="85">85</option>
                                        <option value="86">86</option>
                                        <option value="87">87</option>
                                        <option value="88">88</option>
                                        <option value="89">89</option>
                                        <option value="90">90</option>
                                        <option value="91">91</option>
                                        <option value="92">92</option>
                                        <option value="93">93</option>
                                        <option value="94">94</option>
                                        <option value="95">95</option>
                                        <option value="96">96</option>
                                        <option value="97">97</option>
                                        <option value="98">98</option>
                                        <option value="99">99</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.row -->
                            <div class="form-group row">
                                <label for="fardu_kifayah"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Fardu Kifayah') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control select2" required="Minimal 0" name="fardu_kifayah"
                                        style="width: 100%;">
                                        <option selected="selected" value="0">0</option>
                                        <option value="1">1</option>
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
                                        <option value="36">36</option>
                                        <option value="37">37</option>
                                        <option value="38">38</option>
                                        <option value="39">39</option>
                                        <option value="40">40</option>
                                        <option value="41">41</option>
                                        <option value="42">42</option>
                                        <option value="43">43</option>
                                        <option value="44">44</option>
                                        <option value="45">45</option>
                                        <option value="46">46</option>
                                        <option value="47">47</option>
                                        <option value="48">48</option>
                                        <option value="49">49</option>
                                        <option value="50">50</option>
                                        <option value="51">51</option>
                                        <option value="52">52</option>
                                        <option value="53">53</option>
                                        <option value="54">54</option>
                                        <option value="55">55</option>
                                        <option value="56">56</option>
                                        <option value="57">57</option>
                                        <option value="58">58</option>
                                        <option value="59">59</option>
                                        <option value="60">60</option>
                                        <option value="61">61</option>
                                        <option value="62">62</option>
                                        <option value="63">63</option>
                                        <option value="64">64</option>
                                        <option value="65">65</option>
                                        <option value="66">66</option>
                                        <option value="67">67</option>
                                        <option value="68">68</option>
                                        <option value="69">69</option>
                                        <option value="70">70</option>
                                        <option value="71">71</option>
                                        <option value="72">72</option>
                                        <option value="73">73</option>
                                        <option value="74">74</option>
                                        <option value="75">75</option>
                                        <option value="76">76</option>
                                        <option value="77">77</option>
                                        <option value="78">78</option>
                                        <option value="79">79</option>
                                        <option value="80">80</option>
                                        <option value="81">81</option>
                                        <option value="82">82</option>
                                        <option value="83">83</option>
                                        <option value="84">84</option>
                                        <option value="85">85</option>
                                        <option value="86">86</option>
                                        <option value="87">87</option>
                                        <option value="88">88</option>
                                        <option value="89">89</option>
                                        <option value="90">90</option>
                                        <option value="91">91</option>
                                        <option value="92">92</option>
                                        <option value="93">93</option>
                                        <option value="94">94</option>
                                        <option value="95">95</option>
                                        <option value="96">96</option>
                                        <option value="97">97</option>
                                        <option value="98">98</option>
                                        <option value="99">99</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.row -->
                            <div class="form-group row">
                                <label for="baca_quran"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Baca Al-Quran') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control select2" required="Minimal 0" name="baca_quran"
                                        value="10" style="width: 100%;">
                                        <option selected="selected" value="0">0</option>
                                        <option value="1">1</option>
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
                                        <option value="36">36</option>
                                        <option value="37">37</option>
                                        <option value="38">38</option>
                                        <option value="39">39</option>
                                        <option value="40">40</option>
                                        <option value="41">41</option>
                                        <option value="42">42</option>
                                        <option value="43">43</option>
                                        <option value="44">44</option>
                                        <option value="45">45</option>
                                        <option value="46">46</option>
                                        <option value="47">47</option>
                                        <option value="48">48</option>
                                        <option value="49">49</option>
                                        <option value="50">50</option>
                                        <option value="51">51</option>
                                        <option value="52">52</option>
                                        <option value="53">53</option>
                                        <option value="54">54</option>
                                        <option value="55">55</option>
                                        <option value="56">56</option>
                                        <option value="57">57</option>
                                        <option value="58">58</option>
                                        <option value="59">59</option>
                                        <option value="60">60</option>
                                        <option value="61">61</option>
                                        <option value="62">62</option>
                                        <option value="63">63</option>
                                        <option value="64">64</option>
                                        <option value="65">65</option>
                                        <option value="66">66</option>
                                        <option value="67">67</option>
                                        <option value="68">68</option>
                                        <option value="69">69</option>
                                        <option value="70">70</option>
                                        <option value="71">71</option>
                                        <option value="72">72</option>
                                        <option value="73">73</option>
                                        <option value="74">74</option>
                                        <option value="75">75</option>
                                        <option value="76">76</option>
                                        <option value="77">77</option>
                                        <option value="78">78</option>
                                        <option value="79">79</option>
                                        <option value="80">80</option>
                                        <option value="81">81</option>
                                        <option value="82">82</option>
                                        <option value="83">83</option>
                                        <option value="84">84</option>
                                        <option value="85">85</option>
                                        <option value="86">86</option>
                                        <option value="87">87</option>
                                        <option value="88">88</option>
                                        <option value="89">89</option>
                                        <option value="90">90</option>
                                        <option value="91">91</option>
                                        <option value="92">92</option>
                                        <option value="93">93</option>
                                        <option value="94">94</option>
                                        <option value="95">95</option>
                                        <option value="96">96</option>
                                        <option value="97">97</option>
                                        <option value="98">98</option>
                                        <option value="99">99</option>
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
                                <label for="sholat_fardu"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Sholat Fardhu') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control select2" required="Minimal 0" name="sholat_fardu"
                                        style="width: 100%;">
                                        <option selected="selected" value="0">0</option>
                                        <option value="1">1</option>
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
                                <label for="tilawatil_quran"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Saritilawah Al-Quran') }}</label>

                                <div class="col-md-6">
                                    <input type="integer" class="form-control" id="tilawatil_quran" required="Minimal 0"
                                        name="tilawatil_quran" onkeypress="return hanyaAngka(event)" placeholder="Jumlah Halaman">
                                </div>
                            </div>
                            <!-- /.row -->
                            <div class="form-group row">
                                <label for="dzikir"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Dzikir') }}</label>

                                <div class="col-md-6">
                                    <input type="integer" class="form-control" id="dzikir" required="Minimal 0"
                                        name="dzikir" onkeypress="return hanyaAngka(event)" placeholder="Dzikir dalam Jumlah Menit..">
                                </div>
                            </div>
                            <!-- /.row -->

                            {{--  <div class="form-group row">
                                <label for="dzikir"
                                    class="col-md-4 col-form-label text-md-right">{{ __('dzikir') }}</label>

                                <div class="col-md-6">
                                    <input type="integer" required="Minimal 0" name="dzikir" class="form-control"
                                        id="dzikir" placeholder="Total Dzikir">
                                </div>
                            </div>  --}}
                            {{--  <!-- /.row -->  --}}
                            <!-- /.row -->
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <h5>Buku Harian</h5>
                            <div class="form-group row">
                                <label for="buku_harian"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Buku Harian') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control select2" required="Minimal 0" name="buku_harian"
                                        style="width: 100%;">
                                        <option selected="selected" value="0">0</option>
                                        <option value="1">1</option>
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
                                        <option value="36">36</option>
                                        <option value="37">37</option>
                                        <option value="38">38</option>
                                        <option value="39">39</option>
                                        <option value="40">40</option>
                                        <option value="41">41</option>
                                        <option value="42">42</option>
                                        <option value="43">43</option>
                                        <option value="44">44</option>
                                        <option value="45">45</option>
                                        <option value="46">46</option>
                                        <option value="47">47</option>
                                        <option value="48">48</option>
                                        <option value="49">49</option>
                                        <option value="50">50</option>
                                        <option value="51">51</option>
                                        <option value="52">52</option>
                                        <option value="53">53</option>
                                        <option value="54">54</option>
                                        <option value="55">55</option>
                                        <option value="56">56</option>
                                        <option value="57">57</option>
                                        <option value="58">58</option>
                                        <option value="59">59</option>
                                        <option value="60">60</option>
                                        <option value="61">61</option>
                                        <option value="62">62</option>
                                        <option value="63">63</option>
                                        <option value="64">64</option>
                                        <option value="65">65</option>
                                        <option value="66">66</option>
                                        <option value="67">67</option>
                                        <option value="68">68</option>
                                        <option value="69">69</option>
                                        <option value="70">70</option>
                                        <option value="71">71</option>
                                        <option value="72">72</option>
                                        <option value="73">73</option>
                                        <option value="74">74</option>
                                        <option value="75">75</option>
                                        <option value="76">76</option>
                                        <option value="77">77</option>
                                        <option value="78">78</option>
                                        <option value="79">79</option>
                                        <option value="80">80</option>
                                        <option value="81">81</option>
                                        <option value="82">82</option>
                                        <option value="83">83</option>
                                        <option value="84">84</option>
                                        <option value="85">85</option>
                                        <option value="86">86</option>
                                        <option value="87">87</option>
                                        <option value="88">88</option>
                                        <option value="89">89</option>
                                        <option value="90">90</option>
                                        <option value="91">91</option>
                                        <option value="92">92</option>
                                        <option value="93">93</option>
                                        <option value="94">94</option>
                                        <option value="95">95</option>
                                        <option value="96">96</option>
                                        <option value="97">97</option>
                                        <option value="98">98</option>
                                        <option value="99">99</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.row -->

                            <!-- /.row -->
                        </div>
                        <div>
                            {{--  <button type="submit" class="btn btn-primary">Simpan</button>  --}}
                            <button type="Submit" class="btn btn-success swalDefaultSuccess" data-toggle="modal"
                                data-target="#modal-success">
                                Simpan
                            </button>
                        </div>
                        <!-- /.card-body -->

                    </form>
                </div>
                <!-- <div class="modal-footer">

        </div> -->
            </div>
        </div>
</div>

{{--  menghapus  --}}
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h4 class="modal-title">Nyan inyan nak diapus</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Kalak nyasal&hellip;</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">anjadi wak</button>
                    <button type="submit" class="btn btn-success toastsDefaultSuccess">wokeh</button>
                </div>
            </form>
        </div>
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

<script>
function hanyaAngka(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
          return false;
        return true;
      }
</script>

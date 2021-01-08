<div class="modal" id="modal-form" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
            <!-- form start -->
            <form method="POST" action="{{url('nilaiPeriodik')}}"  enctype="multipart/form-data" data-toggle="validator">
              {{--  @csrf  --}}
              {{ csrf_field()}} {{ method_field('POST')}}
              <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <input type="hidden" id="id" name="id">
              <div class="form-group row" style="padding-top:20px;">
                <label for="mahasiswa_nim" class="col-md-2 col-form-label text-md-left">{{ __('Mahasiswa') }}</label>

                <div class="col-md-4">
                  <select class="form-control select2" id="mahasiswa_id" name="mahasiswa_id" style="width: 100%;">
                    @if(count($nilaiPeriodik) > 0)
                                  @foreach($nilaiPeriodik as $nPeriodik)
                                  <option value="{{ $nPeriodik->mahasiswa_id }}">{{ $nPeriodik->mahasiswa_id }}</option>
                    @endforeach
                    @else
                    @endif


                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="pekanke" class="col-md-2 col-form-label text-md-left">{{ __('Pertemuan') }}</label>
                <div class="col-md-4">
                  <select class="form-control select2" id="pekan_ke" name="pekan_ke" style="width: 100%;">
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
                    <input type="text" id="tanggal" name="tanggal" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>
                  </div>
                </div>
              </div>
              <!-- /.row -->

              <div class="card-body">
                <h5>Kehadiran</h5>
                <div class="form-group row">
                  <label for="kehadiran" class="col-md-4 col-form-label text-md-right">{{ __('Kehadiran') }}</label>

                  <div class="col-md-6">
                    <select class="form-control select2" id="kehadiran" name="kehadiran" style="width: 100%;">
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
                  <label for="ukhuwahIslamiyah" class="col-md-4 col-form-label text-md-right">{{ __('Ukhuwah Islamiyah') }}</label>

                  <div class="col-md-6">
                    <select class="form-control select2" id="ukhuwah_islamiyah" name="ukhuwah_islamiyah" style="width: 100%;">
                      <option selected="selected" value="0">Tidak Hadir</option>
                      <option value="10">Hadir</option>
                    </select>
                  </div>
                </div>
                <!-- /.row -->
                <div class="form-group row">
                  <label for="ukhuwahWathoniyah" class="col-md-4 col-form-label text-md-right">{{ __('Ukhuwah Wathoniyah') }}</label>

                  <div class="col-md-6">
                    <select class="form-control select2" id="ukhuwah_wathoniyah" name="ukhuwah_wathoniyah" style="width: 100%;">
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
                  <label for="hafalanDoa" class="col-md-4 col-form-label text-md-right">{{ __('Hafalan Doa Sholat') }}</label>

                  <div class="col-md-6">
                    <select class="form-control select2" id="hafalan_doa" name="hafalan_doa" style="width: 100%;">
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
                  <label for="farduKifayah" class="col-md-4 col-form-label text-md-right">{{ __('Fardu Kifayah') }}</label>

                  <div class="col-md-6">
                    <select class="form-control select2" id="fardu_kifayah" name="fardu_kifayah" style="width: 100%;">
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
                  <label for="bacaQuran" class="col-md-4 col-form-label text-md-right">{{ __('Baca Al-Quran') }}</label>

                  <div class="col-md-6">
                    <select class="form-control select2" id="baca_quran" name="baca_quran" value="10" style="width: 100%;">
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
                  <label for="sholatFardhu" class="col-md-4 col-form-label text-md-right">{{ __('Sholat Fardhu') }}</label>

                  <div class="col-md-6">
                    <select class="form-control select2" id="sholat_fardu" name="sholat_fardu" style="width: 100%;">
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
                  <label for="tilawatilQuran" class="col-md-4 col-form-label text-md-right">{{ __('Tilawatil Quran') }}</label>

                  <div class="col-md-6">
                    <input type="integer" class="form-control" id="tilawatil_quran" name="tilawatil_quran" placeholder="Halaman Terakhir">
                  </div>
                </div>
                <!-- /.row -->
                <div class="form-group row">
                  <label for="dzikir" class="col-md-4 col-form-label text-md-right">{{ __('Dzikir') }}</label>

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
                  <label for="bukuHarian" class="col-md-4 col-form-label text-md-right">{{ __('Buku Harian') }}</label>

                  <div class="col-md-6">
                    <select class="form-control select2" id="buku_harian" name="buku_harian" style="width: 100%;">
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
              {{--  <div>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>  --}}
              <!-- /.card-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </form>
        </div>

      </div>
    </div>
  </div>

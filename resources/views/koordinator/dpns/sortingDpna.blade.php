<div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Keluarga</label>
                                        <select class="form-control select2" style="width: 100%;">
                                            @if (Auth::check())
                                            @foreach($data_akhir as $mhs)
                                            <option value="{{ $mhs->keluarga }}" >{{ $mhs->keluarga }}</option>
                                            {{--  @endif  --}}
                                            @endforeach
                                            @endif
                                        </select><br>
                                        <a href="{{ route('dpnaSortByKeluarga', $mhs->keluarga) }}" type="button"
                                            class="btn btn-outline-info btn-sm fas fa-eye">Sorting keluarga</a>
                                        {{--  <button class="btn btn-outline-info " type="submit">sorting</button>  --}}
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label>Prodi</label>
                                    <select class="form-control select2" style="width: 100%;">
                                            @if (Auth::check())
                                            @foreach($data_akhir as $mhs)
                                            <option value="{{ $mhs->prodi }}" >{{ $mhs->prodi }}</option>
                                            {{--  @endif  --}}
                                            @endforeach
                                            @endif
                                        </select><br>
                                        <a href="{{ route('dpnaSortByKeluarga', $mhs->prodi) }}" type="button"
                                            class="btn btn-outline-info btn-sm fas fa-eye">Sorting Prodi</a>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                            </div>

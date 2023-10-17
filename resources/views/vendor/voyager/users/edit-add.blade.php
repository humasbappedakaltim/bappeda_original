@extends('voyager::master')

@section('page_title', __('voyager::generic.'.(isset($dataTypeContent->id) ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular'))

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.'.(isset($dataTypeContent->id) ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular') }}
    </h1>
@stop

@section('content')
    <div class="page-content container-fluid">
        <form class="form-edit-add" role="form"
              action="@if(!is_null($dataTypeContent->getKey())){{ route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) }}@else{{ route('voyager.'.$dataType->slug.'.store') }}@endif"
              method="POST" enctype="multipart/form-data" autocomplete="off">
            <!-- PUT Method if we are editing -->
            @if(isset($dataTypeContent->id))
                {{ method_field("PUT") }}
            @endif
            {{ csrf_field() }}

            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-bordered">
                    {{-- <div class="panel"> --}}
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="panel-body">
                            <div class="form-group">
                                <label for="name">NIK</label>
                                <input type="number" class="form-control" id="nik" name="nik" placeholder="NIK"
                                       value="{{ old('nik', $dataTypeContent->nik ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="name">{{ __('voyager::generic.name') }}</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('voyager::generic.name') }}"
                                       value="{{ old('name', $dataTypeContent->name ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="name">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir"
                                       value="{{ old('tempat_lahir', $dataTypeContent->tempat_lahir ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="name">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder=""
                                       value="{{ old('tanggal_lahir', $dataTypeContent->tanggal_lahir ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="name">Nomor Handphone</label>
                                <input type="number" class="form-control" id="nik" name="no_hp" placeholder="Nomor Handphone"
                                       value="{{ old('no_hp', $dataTypeContent->no_hp ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="no_npwp">Nomor NPWP</label>
                                <input type="text" class="form-control" id="no_npwp" name="no_npwp" placeholder="Nomor NPWP"
                                       value="{{ old('no_npwp', $dataTypeContent->no_npwp ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="name">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat" rows="5">{{ old('alamat', $dataTypeContent->alamat ?? '') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="name">Tahun Mulai/Awal Bekerja (Di Bappeda Prov. Kaltim)</label>
                                <input type="number" class="form-control" id="tahun_mulai_bekerja" name="tahun_mulai_bekerja" placeholder="Tahun Mulai/Awal Bekerja (Di Bappeda Prov. Kaltim)"
                                       value="{{ old('tahun_mulai_bekerja', $dataTypeContent->tahun_mulai_bekerja ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="kategori_bidang_id">Bidang</label>
                                <select class="form-control select2" id="kategori_bidang_id" name="kategori_bidang_id">
                                    <option value="kosong">-- PILIH BIDANG --</option>
                                    @foreach ($kategoribidang as $resultbidang)
                                    <option value="{{ $resultbidang->id }}" {!!$dataTypeContent->kategori_bidang_id == $resultbidang->id ? 'selected="selected"' : ''!!}>{{ $resultbidang->nama_bidang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kategori_sub_bidang_id">Sub Bidang</label>
                                <select class="form-control select2" id="kategori_sub_bidang_id" name="kategori_sub_bidang_id">
                                    <option value="kosong">-- PILIH BIDANG DULU --</option>
                                    @foreach ($kategorisubbidang as $resultsubbidang)
                                    <option value="{{ $resultsubbidang->id }}" {!!$dataTypeContent->kategori_sub_bidang_id == $resultsubbidang->id ? 'selected="selected"' : ''!!}>{{ $resultsubbidang->nama_sub_bidang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Nama Jabatan"
                                       value="{{ old('jabatan', $dataTypeContent->jabatan ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="email">{{ __('voyager::generic.email') }}</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('voyager::generic.email') }}"
                                       value="{{ old('email', $dataTypeContent->email ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="password">{{ __('voyager::generic.password') }}</label>
                                @if(isset($dataTypeContent->password))
                                    <br>
                                    <small>{{ __('voyager::profile.password_hint') }}</small>
                                @endif
                                <input type="password" class="form-control" id="password" name="password" value="" autocomplete="new-password">
                            </div>
                            
                            <div class="form-group">
                                <label for="no_rekening_bank_kaltim">Nomor Rekening (Bank Kaltim)</label>
                                <input type="number" class="form-control" id="no_rekening_bank_kaltim" name="no_rekening_bank_kaltim" placeholder="Nomor Rekening (Bank Kaltim)"
                                       value="{{ old('no_rekening_bank_kaltim', $dataTypeContent->no_rekening_bank_kaltim ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="no_rekening_bank_lain">Nomor Rekening (Bank Lainnya)</label>
                                <input type="text" class="form-control" id="no_rekening_bank_lain" name="no_rekening_bank_lain" placeholder="Nomor Rekening (Bank Lainnya)"
                                       value="{{ old('no_rekening_bank_lain', $dataTypeContent->no_rekening_bank_lain ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="no_bpjs_ketenagakerjaan">Nomor BPJS Ketenagakerjaan</label>
                                <input type="number" class="form-control" id="no_bpjs_ketenagakerjaan" name="no_bpjs_ketenagakerjaan" placeholder="Nomor BPJS Ketenagakerjaan"
                                       value="{{ old('no_bpjs_ketenagakerjaan', $dataTypeContent->no_bpjs_ketenagakerjaan ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="no_bpjs_kesehatan">Nomor BPJS Kesehatan</label>
                                <input type="number" class="form-control" id="no_bpjs_kesehatan" name="no_bpjs_kesehatan" placeholder="Nomor BPJS Kesehatan"
                                       value="{{ old('no_bpjs_kesehatan', $dataTypeContent->no_bpjs_kesehatan ?? '') }}">
                            </div>

                            @can('editRoles', $dataTypeContent)
                                <div class="form-group">
                                    <label for="default_role">{{ __('voyager::profile.role_default') }}</label>
                                    @php
                                        $dataTypeRows = $dataType->{(isset($dataTypeContent->id) ? 'editRows' : 'addRows' )};

                                        $row     = $dataTypeRows->where('field', 'user_belongsto_role_relationship')->first();
                                        $options = $row->details;
                                    @endphp
                                    @include('voyager::formfields.relationship')
                                </div>
                                <div class="form-group">
                                    <label for="additional_roles">{{ __('voyager::profile.roles_additional') }}</label>
                                    @php
                                        $row     = $dataTypeRows->where('field', 'user_belongstomany_role_relationship')->first();
                                        $options = $row->details;
                                    @endphp
                                    @include('voyager::formfields.relationship')
                                </div>
                            @endcan
                            @php
                            if (isset($dataTypeContent->locale)) {
                                $selected_locale = $dataTypeContent->locale;
                            } else {
                                $selected_locale = config('app.locale', 'en');
                            }

                            @endphp
                            <div class="form-group">
                                <label for="locale">{{ __('voyager::generic.locale') }}</label>
                                <select class="form-control select2" id="locale" name="locale" disabled>
                                    @foreach (Voyager::getLocales() as $locale)
                                    <option value="{{ $locale }}"
                                    {{ ($locale == $selected_locale ? 'selected' : '') }}>{{ $locale }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="panel panel panel-bordered panel-warning">
                        <div class="panel-body">
                            <div class="form-group">
                                @if(isset($dataTypeContent->avatar))
                                    <img src="{{ filter_var($dataTypeContent->avatar, FILTER_VALIDATE_URL) ? $dataTypeContent->avatar : Voyager::image( $dataTypeContent->avatar ) }}" style="width:200px; height:auto; clear:both; display:block; padding:2px; border:1px solid #ddd; margin-bottom:10px;" />
                                @endif
                                <input type="file" data-name="avatar" name="avatar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary pull-right save">
                {{ __('voyager::generic.save') }}
            </button>
        </form>

        <iframe id="form_target" name="form_target" style="display:none"></iframe>
        <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post" enctype="multipart/form-data" style="width:0px;height:0;overflow:hidden">
            {{ csrf_field() }}
            <input name="image" id="upload_file" type="file" onchange="$('#my_form').submit();this.value='';">
            <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
        </form>
    </div>
@stop

@section('javascript')
    <script>
        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();
        });
        $('#kategori_bidang_id').on('change', function () {
                let bidang = $('select[name="kategori_bidang_id"]').val()
                $.ajax({
                    url: "{{ url('/ajaxoptionsubbidang') }}/"+bidang,
                    method: "GET",
                })
                    .done(function (result) {
                        console.log(result);
                        $('select[name="kategori_sub_bidang_id"]').html(result)
                });
            });
    </script>
@stop

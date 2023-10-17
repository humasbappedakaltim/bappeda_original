@extends('layouts.master')
@section('content')
@section('styles')
<link href="{{asset('')}}vendor/lity-2.4.1/dist/lity.css" rel="stylesheet">
<link href="{{asset('')}}fullcalendar/fullcalendar-edit.css" rel="stylesheet">
@endsection
<style>
 .width_control {
     height: 220px;
 }
.text-overflow {
   overflow: hidden;
   text-overflow: ellipsis;
   display: -webkit-box !important;
   -webkit-line-clamp: 4; /* number of lines to show */
   -webkit-box-orient: vertical;
}
input[type=radio] {
    display: none;
}
input[type=radio] + span {
    display: inline-block;
    border: 1px solid #000;
    border-radius: 50%;
    margin: 0 0.5em;
}
input[type=radio]:checked + span {
    background-color: #5f65d9;
}
.radio3 {
    width: 1em;
    height: 1em;
}
.radio-inline{
    padding-left: 5px!important;
}
</style>
{{
    date('Y-m-d H:i:s')
}}
@if ($message = Session::get('sukses'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button> 
    <strong>{{ $message }}</strong>
</div>
@endif
{{-- MODAL SURVEI   --}}
<div class="modal animated fadeIn" id="modalSurvei" ="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" style="display: contents;">Survei Layanan Informasi Website Bappeda Provinsi Kalimantan Timur</h6>
                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button> --}}
            </div>
            <div class="modal-body" id="modalklikevent">
                <form id="form-survei" action="{{route('inputdatasurvei')}}" method="post">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Nama</label>
                        <input name="nama_survei" id="nama_survei" type="text" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat_survei" id="alamat_survei" class="form-control" required="required" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Pekerjaan</label>
                        <input name="pekerjaan_survei" id="pekerjaan_survei" type="text" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email_survei" id="email_survei" type="email" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label class="text-justify">1. Bagaimana menurut anda, tampilan website Bappeda</label>
                    </div>
                    <div class="form-group">
                        <label class="radio-inline">
                            <input type="radio" name="pertanyaan1" id="pertanyaan1" value="Sangat Menarik" required="required"><span class="radio3"></span>Sangat Menarik
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="pertanyaan1" id="pertanyaan1" value="Cukup Menarik"><span class="radio3"></span>Cukup Menarik
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="pertanyaan1" id="pertanyaan1" value="Kurang Menarik"><span class="radio3"></span>Kurang Menarik
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="pertanyaan1" id="pertanyaan1" value="Tidak Menarik"><span class="radio3"></span>Tidak Menarik
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="text-justify">2. Bagaimana menurut anda, mekanisme mendapatkan informasi dan data di website Bappeda</label>
                    </div>
                    <div class="form-group">
                        <label class="radio-inline">
                            <input type="radio" name="pertanyaan2" id="pertanyaan2" value="Sangat Mudah" required="required"><span class="radio3"></span>Sangat Mudah
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="pertanyaan2" id="pertanyaan2" value="Cukup Mudah"><span class="radio3"></span>Cukup Mudah
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="pertanyaan2" id="pertanyaan2" value="Susah"><span class="radio3"></span>Susah
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="pertanyaan2" id="pertanyaan2" value="Sangat Susah"><span class="radio3"></span>Sangat Susah
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="text-justify">3. Bagaimana menurut anda, kelengkapan data dan informasi di website Bappeda</label>
                    </div>
                    <div class="form-group">
                        <label class="radio-inline">
                            <input type="radio" name="pertanyaan3" id="pertanyaan3" value="Sangat Lengkap" required="required"><span class="radio3"></span>Sangat Lengkap
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="pertanyaan3" id="pertanyaan3" value="Cukup Lengkap"><span class="radio3"></span>Cukup Lengkap
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="pertanyaan3" id="pertanyaan3" value="Kurang Lengkap"><span class="radio3"></span>Kurang Lengkap
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="pertanyaan3" id="pertanyaan3" value="Sangat Tidak Lengkap"><span class="radio3"></span>Sangat Tidak Lengkap
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="text-justify">4. Bagaimana menurut anda, kualitas pelayanan admin website/sosmed Bappeda dalam menerima dan merespon pengguna layanan</label>
                    </div>
                    <div class="form-group">
                        <label class="radio-inline">
                            <input type="radio" name="pertanyaan4" id="pertanyaan4" value="Sangat Baik" required="required"><span class="radio3"></span>Sangat Baik
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="pertanyaan4" id="pertanyaan4" value="Cukup Baik"><span class="radio3"></span>Cukup Baik
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="pertanyaan4" id="pertanyaan4" value="Kurang Baik"><span class="radio3"></span>Kurang Baik
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="pertanyaan4" id="pertanyaan4" value="Tidak Baik"><span class="radio3"></span>Tidak Baik
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="text-justify">5. Bagaimana menurut anda, Bappeda dalam menjalankan dan mendukung keterbukaan informasi</label>
                    </div>
                    <div class="form-group">
                        <label class="radio-inline">
                            <input type="radio" name="pertanyaan5" id="pertanyaan5" value="Sangat Baik" required="required"><span class="radio3"></span>Sangat Baik
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="pertanyaan5" id="pertanyaan5" value="Cukup Baik"><span class="radio3"></span>Cukup Baik
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="pertanyaan5" value="Kurang Baik"><span class="radio3"></span>Kurang Baik
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="pertanyaan5" value="Tidak Baik"><span class="radio3"></span>Tidak Baik
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Masukan dan Saran</label>
                        <textarea name="masukansaran" id="masukansaran" class="form-control" required="required" rows="4"></textarea>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group text-center">
                            <input class="btn btn-primary" type="submit" value="Kirim" style="padding: 6px 12px; color: #fff; background-color: #d9534f; border-color: #d43f3a;">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-danger" data-dismiss="modal" style="padding: 6px 12px; color: #fff; background-color: #d9534f; border-color: #d43f3a;">Tutup</button> --}}
            </div>
        </div>
    </div>
</div>
{{-- MODAL TEST 3 DETIK   --}}
<div class="modal animated fadeIn" id="modal5detik" ="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" style="display: contents;">Survei Layanan Informasi Website Bappeda Provinsi Kalimantan Timur</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalklikevent">
                @if ($message = Session::get('sukses'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{asset('vendor/fslightbox.js')}}"></script>
<script src="{{asset('')}}vendor/lity-2.4.1/dist/lity.js"></script>
<script src="{{asset('')}}fullcalendar/main.js"></script>
<script>
    jQuery(document).ready(function($){
        @if ($message = Session::get('sukses'))
            $("#modal5detik").modal();
            setTimeout(function(){ $('#modal5detik').modal('hide')}, 5000);
        @endif
        if({{ $hasilsurvery}} == 0) {
            $("#modalSurvei").modal();
        }
        
    });
</script>
@endsection

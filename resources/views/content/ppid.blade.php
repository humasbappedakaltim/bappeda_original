@extends('layouts.masterppid')
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
</style>
<div class="city_visit_wrap" style="padding-bottom:0px ">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class="heding_full" style="margin-top: 20px; margin-bottom:0px;">
                    <div class="section_heading">
                        <h2>Selamat Datang</h2><br />
                        <h5>di Website Pejabat Pengelola Informasi dan Dokumentasi Bappeda Provinsi Kalimantan Timur</h5>
                    </div>
                </div>   
                <div>
                   {!!setting('profil-kantor.visi_misi')!!} 
                </div>
            </div>
        </div>
    </div>
</div>
<div class="city_main_banner" style="margin-bottom:120px;">
    <div class="container">
        <div class="main-banner-slider">
            @foreach ($slider as $s)
                <a href="{{asset('storage/'.$s->file_sliders)}}"data-fslightbox>
                    <img src="{{asset('storage/'.$s->file_sliders)}}" alt="Slider Image" style="width:100%">
                </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{asset('vendor/fslightbox.js')}}"></script>
<script src="{{asset('')}}vendor/lity-2.4.1/dist/lity.js"></script>
@endsection
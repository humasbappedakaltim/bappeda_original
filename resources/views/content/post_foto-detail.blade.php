@extends('layouts.master')
@section('styles')
@endsection
@section('content')
<div class="sab_banner overlay">
    <div class="container">
        <div class="sab_banner_text">
            <h5>{{$album_foto->title}}</h5>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('post.index')}}">Arsip Berita Foto</a></li> 
            </ul>
        </div>
    </div>
</div>
<div class="city_blog2_wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="city_blog2_fig fig2 detail">  
                    <div class="blog_detail_row">
                        <div class="city_blog2_list">
                            <ul class="city_meta_list">
                                <li><a href="#"><i class="fa fa-calendar"></i>Tanggal, {{ Carbon\Carbon::parse($album_foto->published_at)->format('d F Y') }}</a></li>
                            </ul>
                            <div class="city_blog2_text">
                                {{-- <h4><a href="#">{{$album_foto->title}}</a></h4> --}}
                                {!!$album_foto->description!!}
                            </div>
                            <div class="row" style="margin:10px 10px 10px 0;">
                                @foreach ($post as $p)
                                <div class="col-lg-4 col-md-4" style="margin-top: 10px; margin-bottom: 10px">
                                <a href="{{asset('storage/'.$p->image)}}" data-fslightbox><img src="{{asset('storage/'.$p->image)}}" alt="Foto" ></a>
                                </div>
                                @endforeach
                            </div>
                            <hr>
                            <h4 class="sidebar_heading">Berita Foto Lainnya</h4>
                            <div class="row">
                                @foreach ($other_foto as $bf2)
                                <div class="col-lg-3 col-md-4 col-sm-6 m-1">
                                    <div class="city_blog_fig">
                                        <a href="{{route('post_foto.detail',$bf2->slug)}}">
                                            <img src="{{asset('storage/'.$bf2->foto)}}" alt="{{$bf2->title}}">
                                        <div class="city_blog_text p-0" style="margin-top: 10px; margin-bottom:10px">
                                            <a href="{{route('post_foto.detail',$bf2->slug)}}">{{$bf2->title}}</a>
                                        </div>
                                    </div> 
                                </div>
                                @endforeach
                            </div>
                            </div>
                    </div>
                </div>
                
                
                
			</div>
			@include('layouts.sidebar-post')
        </div>					
    </div>
</div>
<!-- CITY EVENT2 WRAP END-->

@include('content.post-bottom')

@endsection
@section('scripts')
<script src="{{asset('vendor/fslightbox.js')}}"></script>  
@endsection
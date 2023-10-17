@extends('layouts.master')
@section('styles')
@endsection
@section('content')
<div class="sab_banner overlay">
    <div class="container">
        <div class="sab_banner_text">
            <h4 class="text-white">{{$map->title}}</h4>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('map.index')}}">Arsip Peta</a></li>
              
            </ul>
        </div>
    </div>
</div>
<!-- CITY EVENT2 WRAP START-->
<div class="city_blog2_wrap" style="margin-bottom: 90px;">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="city_blog2_fig fig2 detail">
                    <div class="blog_detail_row">
                        <div class="city_blog2_list">
                            <ul class="city_meta_list">
                            <li><a href="#"><i class="fa fa-calendar"></i>{{ Carbon\Carbon::parse($map->published_at)->format('d F Y') }}</a></li>
                            <li><a href="#"><i class="fa fa-user"></i>Administrator</a></li>
                            <li> <i class="fa fa-folder"></i> {{$map->categoryMapId->name}} </li>
                            <li> <i class="fa fa-eye"></i> {{$map->views}} kali dilihat </li>
                            </ul>
                            <div class="city_blog2_text">
                                <h4><a href="#">{{$map->title}}</a></h4>
                                {!!$map->description!!}
                                <p><a href="{{asset('storage/'.$map->file_peta)}}" data-fslightbox><img src="{{asset('storage/'.$map->file_peta)}}" alt="Peta"></a></p>
                            </div>
                            
                            </div>
                            <h4>Peta Lainnya</h4>
                            <div class="row" style="padding-bottom: 30px;">
                                @foreach ($other_maps as $om)
                                <div class="col-lg-3" style="margin-bottom: 50px;">
                                    <a href="{{route('map.detail',$om->slug)}}"><img src="{{asset('storage/'.$om->file_peta)}}" alt="Peta"></a>
                                <small class="text-center">{{$om->title}}</small>
                                </div>
                                @endforeach
                            </div>
                    </div>
                    
                </div>
                
                
                
			</div>
			@include('layouts.sidebar-post')
        </div>					
    </div>
</div>
<!-- CITY EVENT2 WRAP END-->

@endsection
@section('scripts')
<script src="{{asset('vendor/fslightbox.js')}}"></script>  
@endsection
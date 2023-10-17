@extends('layouts.masterppid')
@section('styles')
@endsection
@section('content')
<div class="sab_banner overlay">
    <div class="container">
        <div class="sab_banner_text">
            <h4 class="text-white">{{$page->title}}</h4>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">{{$page->title}}</li>
            </ul>
        </div>
    </div>
</div>
<!-- CITY EVENT2 WRAP START-->
<div class="city_blog2_wrap pb-50" style="margin-bottom: 90px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="city_blog2_fig fig2 detail">
                    <div class="blog_detail_row">
                        <div class="city_blog2_list">
                            <div class="city_blog2_text">
                                {!!$page->body!!}
                            </div>
                            </div>
                    </div>
                </div>    
            </div>
        </div>					
    </div>
</div>
<!-- CITY EVENT2 WRAP END-->

@endsection
@section('scripts')
<script src="{{asset('vendor/fslightbox.js')}}"></script>
@endsection
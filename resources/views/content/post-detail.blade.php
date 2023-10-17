@extends('layouts.master')
@section('styles')
@endsection
@section('content')
<div class="sab_banner overlay">
    <div class="container">
        <div class="sab_banner_text">
            <h4 class="text-white">{{$post->title}}</h4>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('post.index')}}">Arsip Berita</a></li>
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
                    <figure class="box">
                        @if ($post->image !== null)
                        <a href="{{asset('storage/'.$post->image)}}"data-fslightbox>
                            <img src="{{asset('storage/'.$post->image)}}" alt="Image">
                        </a>
                        @endif
                        <span class="city_blog2_met">{{$post->categoryId->name}}</span>
                    </figure>
                    <div class="blog_detail_row">
                        <div class="city_blog2_list">
                            <ul class="city_meta_list">
                                <li><a href="#"><i class="fa fa-calendar"></i>{{ Myhelpers::tglind($post->published_at) }}</a></li>
                                @if ($post->author_id !== null)
                            <li><a href="#"><i class="fa fa-user"></i>{{$post->authorId->name()}}</a></li>
                            @else
                            <li><a href="#"><i class="fa fa-user"></i>Administrator</a></li>
                            @endif
                            <li> <i class="fa fa-folder"></i> {{$post->categoryId->name}} </li>
                            <li> <i class="fa fa-eye"></i> {{ $post->read }} kali dilihat </li>
                            </ul>
                            <div class="city_blog2_text">
                                <h4><a href="#">{{$post->title}}</a></h4>
                                {!!$post->content!!}
                            </div>
                            </div>
                       
                        <!--CITY EVENT META START-->
                        <div class="city_event_meta">
                            
                            <!-- <div class="city_top_social">
                                <span>Bagikan ke :</span>
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google"></i></a></li>
                                </ul>
                            </div> -->
                        </div>
                        <!--CITY EVENT META END-->
                    </div>
                    <div class="blog_next_post">
                        <ul>
                        @if($prev_post_news)
                        <li><a href="{{route('post.detail',$prev_post_news->slug)}}"><i class="fa fa-angle-left"></i>Sebelumnya</a></li>
                        @endif
                        @if ($next_post_news)
                        <li><a href="{{route('post.detail',$next_post_news->slug)}}">Selanjutnya<i class="fa fa-angle-right"></i></a></li>    
                        @endif
                        </ul>
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
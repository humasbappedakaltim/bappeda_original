@extends('layouts.master')
@section('styles')

@endsection
@section('content')
<div class="sab_banner overlay">
    <div class="container">
        <div class="sab_banner_text">
        <h2>Berita Bulan {{$bulan->bulan}} {{$tahun}}</h2>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Berita</li>
            </ul>
        </div>
    </div>
</div>
<!-- SAB BANNER END-->

<!-- CITY EVENT2 WRAP START-->
<div class="city_blog2_wrap pb-50">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @foreach ($posts as $p)
                <div class="city_news2_post post2">
                    @if ($p->image !== null)
                    <figure class="box">
                        <div class="box-layer layer-1"></div>
                        <div class="box-layer layer-2"></div>
                        <div class="box-layer layer-3"></div>
                        <img src="{{asset('storage/'.$p->image)}}" alt="Image" style="width: 268px">
                    </figure>
                    @endif
                    <div class="city_news2_detail">
                        <ul class="city_meta_list">
                            <li><a href="#"><i class="fa fa-calendar"></i>{{ Carbon\Carbon::parse($p->created_at)->format('d F Y') }}</a></li>
                            @if ($p->author_id !== null)
                            <li><a href="#"><i class="fa fa-user"></i>{{$p->authorId->name()}}</a></li>
                            @else
                            <li><a href="#"><i class="fa fa-user"></i>Administrator</a></li>
                            @endif
                        </ul>
                        <h4>{{$p->title}}</h4>
                        <p style="text-align: justify">{!! Illuminate\Support\Str::of(strip_tags($p->content))->words(50) !!}</p>
                        <a class="theam_btn bg-color color" href="{{route('post.detail',$p->slug)}}" tabindex="0">Selengkapnya</a>
                    </div>
                        
                </div>
                @endforeach
                <div class="pagination">
                    <ul>
                        <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                        <li><a href="#">01</a></li>
                        <li><a href="#">02</a></li>
                        <li><a href="#">....</a></li>
                        <li><a href="#">08</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>
            </div>
            @include('layouts.sidebar-post')
        </div>	
    </div>
</div>

@include('content.post-bottom')


@endsection
@section('scripts')

@endsection
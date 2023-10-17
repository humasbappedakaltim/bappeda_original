@extends('layouts.masterppid')
@section('styles')

@endsection
@section('content')
<div class="sab_banner overlay">
    <div class="container">
        <div class="sab_banner_text">
            <h4 class="text-white">{{$title}}</h4>
            <ul class="breadcrumb">
              {{-- <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li> --}}
              {{-- <li class="breadcrumb-item active">Dasar Hukum</li> --}}
            </ul>
        </div>
    </div>
</div>
<!-- SAB BANNER END-->

<!-- CITY EVENT2 WRAP START-->
<div class="city_blog2_wrap pb-50" style="margin-bottom: 100px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach ($posts as $news => $p)
                <div class="city_news2_post post2">
                    @if ($p->image !== null)
                    <figure class="box">
                        {{-- <div class="box-layer layer-1"></div>
                        <div class="box-layer layer-2"></div>
                        <div class="box-layer layer-3"></div> --}}
                        <img src="{{asset('storage/'.$p->image)}}" alt="Image" style="width: 268px">
                    </figure>
                    @endif
                    <div class="city_news2_detail">
                        <ul class="city_meta_list">
                            <li><a href="#"><i class="fa fa-calendar"></i>{{ Myhelpers::tglind($p->published_at) }}</a></li>
                            <li> <i class="fa fa-folder"></i> {{$title}} </li>
                            <li> <i class="fa fa-user"></i> Administrator</li>
                            {{-- <li> <i class="fa fa-eye"></i> {{$p->read}} kali dilihat </li> --}}
                        </ul>
                        <h4>{{$p->title}}</h4>
                        <p style="text-align: justify">{!! Illuminate\Support\Str::of(strip_tags($p->content))->words(50) !!}</p>
                        <a class="theam_btn bg-color color" href="{{route('ppid.dasarhukumDetail',$p->slug)}}" tabindex="0">Selengkapnya</a>
                    </div>
                        
                </div>
                @endforeach
                <div class="pagination">
                    {{ $posts->onEachSide(0)->links('vendor.pagination.simple') }}
                </div>
            </div>
        </div>	
    </div>
</div>
@endsection
@section('scripts')

@endsection
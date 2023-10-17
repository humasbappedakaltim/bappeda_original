@extends('layouts.master')
@section('content')
@section('styles')
<link href="{{asset('')}}vendor/lity-2.4.1/dist/lity.css" rel="stylesheet">    
@endsection
<style>
 .width_control {
     height: 220px;
 }   
</style>
<div class="city_main_banner">
    <div class="container">
        <div class="main-banner-slider">
            @foreach ($slider as $s)
            {{-- <div>  --}}
                <img src="{{asset('storage/'.$s->file_sliders)}}" alt="Slider Image" style="width:100%">
                {{-- <div class="banner_text">
                    <div class="small_text animated">Welcome to</div>
                    <div class="medium_text animated">Smart City</div>
                    <div class="large_text animated">municipal</div>
                    <div class="banner_btn">
                        <a class="theam_btn animated" href="#">Read More</a>
                        <a class="theam_btn animated" href="#">Explore Now</a>
                    </div>
                    <div class="banner_search_form">
                        <label>Search Here</label>
                        <div class="banner_search_field animated">
                            <input type="text" placeholder="What  do you want to do">
                            <a href="#"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                </div> --}}
            {{-- </div> --}}
            @endforeach
        </div>
    </div>
</div>
<!--CITY MAIN BANNER END-->

<!--CITY BANNER SERVICES START-->
<div class="city_banner_services">
    {{-- <div class="container-fluid">
        <div class="city_service_list">
            <ul>
                <li>
                    <div class="city_service_text">
                        <span><i class="fa icon-law"></i></span>
                        <h5><a href="/page/unit-kerja">Unit Kerja </a></h5>
                    </div>
                </li>
                <li>
                    <div class="city_service_text">
                        <span><i class="fa icon-news"></i></span>
                        <h5><a href="/postingan">Arsip Berita</a></h5>
                    </div>
                </li>
                
                <li>
                    <div class="city_service_text">
                        <span><i class="fa icon-document"></i></span>
                        <h5><a href="/dokumen">Dokumen Perencanaan</a></h5>
                    </div>
                </li>
                <li>
                    <div class="city_service_text">
                        <span><i class="fa icon-calendar"></i></span>
                        <h5><a href="/agenda">Agenda</a></h5>
                    </div>
                </li>							
            </ul>
        </div>
    </div> --}}
</div>
<!--CITY BANNER SERVICES END-->


<div class="city_visit_wrap" style="padding-bottom:0px ">
    <div class="container">
        <div class="row">
            {{-- <div class="col-md-6 col-sm-6">
                <div class="city_visit_fig" style="margin-top: 20px;">
                    <figure class="box">
                        <div class="box-layer layer-1"></div>
                        <div class="box-layer layer-2"></div>
                        <div class="box-layer layer-3"></div>
                        <img src="{{asset('storage/'.setting('site.foto_visi_misi'))}}" alt="Foto Visi dan Misi" class="img-thumbnail">
                    </figure>
                </div>
            </div> --}}
            <div class="col-md-8 col-sm-8 col-lg-9">
                <div class="heding_full" style="margin-top: 20px; margin-bottom:0px;">
                    <div class="section_heading">
                        <h2>Selamat Datang</h2><br />
                        <h5>di Website Bappeda Provinsi Kalimantan Timur</h5>
                    </div>
                </div>   
                <div>
                   {!!setting('profil-kantor.visi_misi')!!} 
                </div>
                {{-- </div> --}}
            </div>
            <div class="col-md-4 col-sm-4 col-lg-3" style="margin-top: 15px; margin-bottom: 15px;">
                <div class="heding_full" style="margin-top: 20px; margin-bottom:0;">
                    <div class="section_heading">
                        <h2 style="font-size: 23px;">PEJABAT BAPPEDA</h2>
			<br>
			<h5 style="font-size:17px; line-height:0;">Provinsi Kalimantan Timur</h5>
                    </div>
                </div>
                <div class="slider-pejabat">
                    @foreach (App\Models\Pejabat::orderBy('id','asc')->take(21)->get() as $pe)
                <img src="{{asset('storage/'.$pe->foto)}}" alt="Foto {{$pe->nama}}">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


<!--CITY NEWS2 WRAP START-->
<div class="city_blog_wrap" style="background:#efeded; padding-top:0px; padding-bottom:20px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
            <div class="heding_full" style="margin-top: 20px; margin-bottom:0px;">
                <div class="section_heading">
                    <span>Topik</span>
                    <h2>Terkini</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($post_news as $kp=>$pn)
                @if ($kp == 0 OR $kp == 3)
                <div class="row">
                @endif
                <div class="col-md-6 col-sm-6 col-lg-4">
                    <div class="city_blog_fig">
                        <a href="{{route('post.detail',$pn->slug)}}">
                            <figure class="box" style="height: 200px;">
                                <img src="{{asset('storage/'.$pn->image)}}" alt="Image" style="height: inherit; object-fit: cover;">
                            </figure>
                        </a>
                        <div class="city_blog_text">
                            <i class="fa fa-calendar"></i> {{ Carbon\Carbon::parse($pn->published_at)->format('d F Y') }} | <i class="fa fa-folder"></i> {{$pn->categoryId->name}}<br />
                            <a href="{{route('post.detail',$pn->slug)}}" title="{{$pn->title}}">{{Str::limit($pn->title, 50, '...')}}</a>
                        </div>
                    </div>
                </div>
                @if ($kp == 2 OR $kp == 5)
                    </div>
                    @endif
                @endforeach
                <div class="col-lg-5">
                    <a class="see_more_btn" href="{{route('post.index')}}" style="border-top: none">Lihat Arsip Berita<i class="fa icon-next-1"></i></a>
                </div>
            </div>
            </div>
        <div class="col-lg-4" style="padding:0px 20px 20px 20px; background:white; margin-top:20px;">
        <div class="heding_full">
            <div class="section_heading" style="margin-top: 20px; margin-bottom:0px;">
                <span>Topik</span>
                <h2>Berita Foto</h2>
            </div>
        </div>
        <!--SECTION HEADING END-->
        <div class="row">
            @foreach ($berita_foto as $bf)
            <div class="col-lg-6 col-md-6 col-sm-6 m-1">
                <div class="city_blog_fig">
                    <a href="{{route('post_foto.detail',$bf->slug)}}">
                    <figure class="box" style="height: 120px;">
                        <img src="{{asset('storage/'.$bf->foto)}}" alt="Image" style="height: inherit; object-fit: cover;">
                    </figure>
                    <div class="city_blog_text p-0" style="margin-top: 10px; margin-bottom:10px">
                        <a href="{{route('post_foto.detail',$bf->slug)}}" title="{{$bf->title}}">{{Str::limit($bf->title, 35, '...')}}</a>
                    </div>
                </div> 
            </div>
            @endforeach
           
        </div>
        <div class="row">
            @foreach ($berita_foto2 as $bf2)
            <div class="col-lg-6 col-md-6 col-sm-6 m-1">
                <div class="city_blog_fig">
                    <a href="{{route('post_foto.detail',$bf2->slug)}}">
                    <figure class="box" style="height: 120px;">
                        <img src="{{asset('storage/'.$bf2->foto)}}" alt="Image" style="height: inherit; object-fit: cover;">
                    </figure>
                    <div class="city_blog_text p-0" style="margin-top: 10px; margin-bottom:10px">
                        <a href="{{route('post_foto.detail',$bf2->slug)}}" title="{{$bf2->title}}">{{Str::limit($bf2->title, 35, '...')}}</a>
                    </div>
                </div> 
            </div>
            @endforeach
            <div class="col-lg-12">
            <a class="see_more_btn" href="{{route('post_foto.index')}}" style="border-top: none">Lihat Arsip Berita Foto<i class="fa icon-next-1"></i></a>
            </div>
        </div>
            </div>
        </div>
    </div>
</div>

<!--CITY BLOG WRAP START-->
<div class="city_blog_wrap p-0" style="background:#dbd7d7">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
            <div class="heding_full" style="margin-top: 20px; margin-bottom:0px;">
                <div class="section_heading">
                    <span>Topik</span>
                    <h2>Berita Nasional</h2>
                </div>
            </div>
            <!--SECTION HEADING END-->
            <div class="row">
                @foreach ($berita_nasional as $kb=>$bn)
                @if ($kb == 0 OR $kb == 3)
                <div class="row">
                @endif
                <div class="col-md-6 col-sm-6 col-lg-4">
                    <div class="city_blog_fig">
                        <a href="{{route('post.detail',$bn->slug)}}">
                        <figure class="box">
                            <div class="box-layer layer-1"></div>
                            <div class="box-layer layer-2"></div>
                            <div class="box-layer layer-3"></div>
                            <img src="{{asset('storage/'.$bn->image)}}" alt="Image">
                        </figure>
                        </a>
                        <div class="city_blog_text">
                            <i class="fa fa-calendar"></i> {{ Carbon\Carbon::parse($bn->published_at)->format('d F Y') }}<br />
                            <span><strong>{{$bn->categoryId->name}}</strong></span><br />
                            <a href="{{route('post.detail',$bn->slug)}}">{{$bn->title}}</a>
                            
                        </div>
                    </div>
                </div>
                @if ($kb == 2 OR $kb == 5)
                </div>
                @endif
                @endforeach
            </div>
            </div>
            <div class="col-lg-4" style="background:rgb(174, 236, 179); margin-top:20px;">
                <div class="heding_full" style="margin-top: 20px; margin-bottom: 0px;">
                    <div class="section_heading">
                        <span>Feature</span>
                        <h2>Video </h2>
                    </div>
                </div>
                <div class="row">
                    @foreach ($videos as $v)
                    <div class="col-lg-6 col-md-6 col-sm-6 m-1" style="margin-bottom: 10px; ">
                        <div class="city_blog_fig">
                            <a href="https://youtube.com/watch?v={{$v->youtube_key}}" target="_blank" title="{{$v->title}}" data-lity>
                            <figure class="box">
                                <div class="box-layer layer-1"></div>
                                <div class="box-layer layer-2"></div>
                                <div class="box-layer layer-3"></div>
                                <img src="https://img.youtube.com/vi/{{$v->youtube_key}}/0.jpg" alt="Thumbnail {{$v->title}}">
                            </figure>
                        </div> 
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="city_event_wrap">
    <div class="bg_white width" style="padding-top: 50px; padding-bottom:50px;">
        <div class="container-fluid" >
            <div class="heding_full">
                <div class="section_heading">
                    <span>Terkini</span>
                    <h2>Agenda </h2>
                </div>
            </div>
            <div class="row">
                @foreach ($agendas as $ag)
                <div class="col-md-6 col-sm-6 col-lg-4">
                    <div class="city_event_fig">
                        <div class="city_event_text">
                            <div class="city_event_history">
                                <div class="event_date">
                                    <span>{{ Carbon\Carbon::parse($ag->created_at)->format('d') }}</span>
                                    <strong>{{ Carbon\Carbon::parse($ag->created_at)->format('M Y') }}</strong>
                                </div>
                                <div class="city_date_text">
                                    <a href="#"><strong>{{$ag->caption}}</strong></a>
                                    <a href="#"><i class="fa fa-map-marker"></i> {{$ag->location}}</a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                @foreach ($agendas2 as $ag2)
                <div class="col-md-6 col-sm-6 col-lg-4">
                    <div class="city_event_fig">
                        <div class="city_event_text">
                            <div class="city_event_history">
                                <div class="event_date">
                                    <span>{{ Carbon\Carbon::parse($ag2->created_at)->format('d') }}</span>
                                    <strong>{{ Carbon\Carbon::parse($ag2->created_at)->format('M Y') }}</strong>
                                </div>
                                <div class="city_date_text">
                                    <a href="#"><strong>{{$ag2->caption}}</strong></a>
                                    <a href="#"><i class="fa fa-map-marker"></i> {{$ag2->location}}</a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <a class="see_more_btn" href="/agenda" style="border-top: none">Lihat Arsip Agenda<i class="fa icon-next-1"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="city_project_wrap " style="background: rgb(228, 226, 226); padding-top:50px; padding-bottom:100px;">
    <div class="container">
        <div class="section_heading center">
            <span>Produk</span>
            <h2>Dokumen</h2>
        </div>
        <div class="d-block text-center" style="margin-bottom: 20px;">
            <a href="http://elib.bappedakaltim.com/katalog" target="_blank" class="theam_btn btn2" style="border:1px solid #CCC; background:green">Lihat di E-Library Bappeda Kaltim</a> <a href="/dokumen" class="theam_btn btn2" style="border:1px solid #CCC; background:#333">Download Area</a> 
        </div>
        <div class="city-project-slider row">
            @foreach ($dokumens as $d)
            <div>
                <div class="city_project_fig">
                    <a href="{{route('document.detail',$d->slug)}}"><img src="{{asset('storage/'.$d->cover)}}" alt="" style="width: 552px;"></a>    
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>	
<div class="city_news_wrap pb-50">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!--SECTION HEADING START-->
                <div class="section_heading margin-bottom">
                    <span>Topik Pilihan</span>
                    <h2>Kinerja Pembangunan</h2>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="city_news_fig">
                            <figure class="box">
                                <div class="box-layer layer-1"></div>
                                <div class="box-layer layer-2"></div>
                                <div class="box-layer layer-3"></div>
                            <img src="{{asset('storage/'.$kinerja_pembangunan_big->image)}}" alt="">
                            </figure>
                            <div class="city_news_text">
                                <h2>{{$kinerja_pembangunan_big->title}}</h2>
                                <ul class="city_news_meta">
                                    <li><a href="#"><i class="fa fa-calendar"></i> {{ Carbon\Carbon::parse($kinerja_pembangunan_big->created_at)->format('d F Y') }}</a></li>
                                </ul>
                                <a class="theam_btn border-color color" href="{{route('post.detail',$kinerja_pembangunan_big->slug)}}" tabindex="0">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="city_news_row">
                            <ul>
                                @foreach ($kinerja_pembangunan as $kp)
                                <li style="border-bottom: 1px solid #CCC">
                                    <div class="city_news_list">
                                        <figure class="box">
                                            <div class="box-layer layer-1"></div>
                                            <div class="box-layer layer-2"></div>
                                            <div class="box-layer layer-3"></div>
                                        <img src="{{asset('storage/'.$kp->image)}}" alt="" style="width:100px">
                                        </figure>
                                        <div class="city_news_list_text">
                                        <a href="{{route('post.detail',$kp->slug)}}"><h5>{{$kp->title}}</h5></a>
                                            <ul class="city_news_meta">
                                                <li><a href="#"> <i class="fa fa-calendar"></i> {{ Carbon\Carbon::parse($kp->created_at)->format('d F Y') }}</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                
                            </ul>
                        </div>
                    </div>
                </div>	
            </div>
            <div class="col-md-4">
                <div class="city_news_form">
                    <div class="city_news_feild feild2">
                        <h4>Penghargaan</h4>
                        <p>Daftar penghargaan yang diperoleh dalam beberapa Agenda dan Kegiatan Bappeda Prov. Kaltim </p>
                        <div class="city_document_list">
                            <ul>
                                @foreach (App\Penghargaan::orderBy('id','desc')->take(6)->get() as $pe)
                                <li><a href="#"><i class="fa icon-document"></i>{{$pe->title}}</a></li>
                                @endforeach
                            <li><a href="{{route('penghargaan.index')}}" class="btn btn-primary btn-outline">Lihat Semua Penghargaan <i class="fa icon-next-1"></i> </a></li>
                            </ul>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>	
<div class="city_requset_wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="city_request_list">
                    <div class="city_request_row text-center">
                        <div class="city_request_text">
                            <h4 style="margin-bottom:25px ">Aplikasi Bappeda Provinsi Kalimantan Timur</h4>
                            <div class="row">
                                @foreach (App\Models\Egov::take(4)->get() as $e)
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <a href="{{$e->links}}" target="_blank">
                                        <div class="panel panel-default">
                                            <div class="panel-body text-center">
                                            <img src="{{asset('storage/'.$e->feature_image)}}" alt="{{$e->title}}">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                              
                            </div>
                            <div class="row">
                                @foreach (App\Models\Egov::skip(4)->take(4)->get() as $e2)
                                <div class="col-lg-3 col-md-6 col-sm-4">
                                    <a href="{{$e2->links}}" target="_blank">
                                        <div class="panel panel-default">
                                            <div class="panel-body text-center">
                                            <img src="{{asset('storage/'.$e2->feature_image)}}" alt="{{$e2->title}}">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>	 
@endsection
@section('scripts')
<script src="{{asset('')}}vendor/lity-2.4.1/dist/lity.js"></script>   
@endsection
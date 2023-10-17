@extends('layouts.master')
@section('content')

<div class="sab_banner overlay">
    <div class="container">
        <div class="sab_banner_text">
            <h2>{{$document->title}}</h2>
            <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('document.index')}}">Dokumen</a></li>
            </ul>
        </div>
    </div>
</div>
 <!-- CITY SERVICES2 WRAP START-->
 <div class="city_health_department" style="padding-top: 20px;">
    <div class="container">
        <div class="city_health2_fig">
            <figure class="box">
                <div class="box-layer layer-1"></div>
                <div class="box-layer layer-2"></div>
                <div class="box-layer layer-3"></div>
                <img src="extra-images/health01.jpg" alt="">
            </figure>	
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="sidebar_widget">
                    
                    <!-- SIDE CONTACT INFO START-->
                    <div class="side_contact_info">
                        <h4 class="sidebar_title">Kontak Kami</h4>
                        <ul class="side_contact_list">
                            <li>
                                <div class="side_contact_text">
                                    <h6><i class="fa fa-tty"></i>Telp & Fax</h6>
                                    <a href="#">Telp. 0541 - 741044</a>
                                    <a href="#">Fax. 0541 - 742283 </a>
                                </div>
                            </li>
                            <li>
                                <div class="side_contact_text">
                                    <h6><i class="fa fa-envelope"></i>Email Address</h6>
                                    <a href="#">bappeda@kaltimprov.go.id</a>
                                </div>
                            </li>
                            <li>
                                <div class="side_contact_text">
                                    <h6><i class="fa fa-phone"></i>Alamat</h6>
                                    <p>Jl. Kesuma Bangsa No.2, Kel. Sungai Pinang Luar, Kec. Samarinda Kota, Kota Samarinda, Kalimantan Timur</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- SIDE CONTACT INFO END-->

                    <!-- SIDE CONTACT INFO START-->
                    <div class="side_contact_info">
                        <h4 class="sidebar_title">Terkini</h4>
                        <ul class="side_news_list">
                            @foreach (App\Models\Post::orderBy('id','desc')->take(3)->get() as $p)
                            <li>
                                <div class="side_news_text">
                                    <span> <i class="fa fa-calendar"></i> {{ Carbon\Carbon::parse($p->created_at)->format('d F Y') }}</span>
                                <a href="{{route('post.detail',$p->slug)}}"><p>{{$p->title}}</p></a>
                                
                                </div>
                            </li>
                            @endforeach
                            
                        </ul>
                    </div>
                    <!-- SIDE CONTACT INFO END-->

                    <!-- SIDE CONTACT INFO START-->
                    <div class="side_notice_list">
                        <h4 class="sidebar_title">Populer Download</h4>
                        <ul class="side_notice_row">
                            @foreach (App\Models\DataDocument::orderBy('id','desc')->take(5)->get() as $t)
                            <li>
                                <div class="side_notice_detail">
                                    <a href="#"><i class="fa fa-file"></i></a>
                                    <div class="side_notice_text">
                                        <h6><a href="#">{{$t->title}}</a></h6>
                                        <span>didownload 0{{$t->read}}x</span>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="city_health2_row">
                    <!--CITY HEALTH TEXT START-->
                    <div class="city_health2_text">
                        <!--SECTION HEADING START-->
                        <div class="section_heading">
                            <span>Dokumen</span>
                            <h3>{{$document->title}}</h3>
                        </div>
                        <img src="{{asset('storage/'.$document->cover)}}" alt="" style="width: 180px">
                        <p>{{$document->description}}</p>
                        <p><a href="" class="theam_btn border-color color">Download Dokumen</a></p>
                    </div>
                    
                    <!--CITY HEALTH TEXT START-->
                    <div class="city_health2_text text2">
                        <!--SECTION HEADING START-->
                        <div class="section_heading margin30">
                            <h3>Dokumen Lainnya</h3>
                        </div>
                        <!--SECTION HEADING END-->
                        <div class="row">
                            @foreach ($other_document as $dc)
                            <div class="col-md-6 col-sm-6 col-lg-3" style="margin-bottom: 10px;">
                                <div class="city_senior_team margin0" >
                                    <figure class="box">
                                        <div class="box-layer layer-1"></div>
                                        <div class="box-layer layer-2"></div>
                                        <div class="box-layer layer-3"></div>
                                        <img src="{{asset('storage/'.$dc->cover)}}" alt="" style="width: 200px;">
                                    </figure>
                                    <div class="city_senior_team_text" style="height: 80px;">
                                        <span>{{$dc->categoryId->name}}</span>
                                        <a style="font-size: 11px;" href="{{route('document.detail',$dc->slug)}}">{{$dc->title}}</a>
                                    </div>
                                </div>
                            </div>	
                            @endforeach
                        </div>		
                    </div>
                    
                </div>
            </div>
        </div>	
    </div>	
</div>
<!-- CITY SERVICES2 WRAP END-->   
@endsection
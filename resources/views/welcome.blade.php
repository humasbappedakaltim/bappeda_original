<!DOCTYPE html>
<html  >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/logo5.png" type="image/x-icon">
  <meta name="description" content="">
  <title>Portal Bappeda Provinsi Kalimantan Timur</title>
  <link rel="stylesheet" href="{{ asset('theme/home') }}/assets/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="{{ asset('theme/home') }}/assets/tether/tether.min.css">
  <link rel="stylesheet" href="{{ asset('theme/home') }}/assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('theme/home') }}/assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="{{ asset('theme/home') }}/assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="{{ asset('theme/home') }}/assets/socicon/css/styles.css">
  <link rel="stylesheet" href="{{ asset('theme/home') }}/assets/theme/css/style.css">
  <link rel="preload" as="style" href="{{ asset('theme/home') }}/assets/mobirise/css/mbr-additional.css">
  <link rel="stylesheet" href="{{ asset('theme/home') }}/assets/mobirise/css/mbr-additional.css" type="text/css">
  <!-- CUSTOM CSS -->
  <link href="{{asset('theme/main')}}/style.css" rel="stylesheet">
  <!-- ICONS CSS -->
  <link href="{{asset('theme/main/css')}}/font-awesome.css" rel="stylesheet">
  <style>   
  .cid-shwzkeWHwg {
  padding-top: 5rem;
  padding-bottom: 5rem;
  background-image: url("{{asset('img/bg-welcome.jpg')}}");
    }
    @media (max-width: 991px) {
    .cid-shwzkeWHwg .mbr-section-title,
    .cid-shwzkeWHwg .mbr-section-subtitle,
    .cid-shwzkeWHwg .mbr-section-btn,
    .cid-shwzkeWHwg .mbr-text {
        text-align: center;
    }
    }
    .cid-shwzkeWHwg .mbr-section-title {
    color: #ffffff;
    }
    .cid-shwzkeWHwg .mbr-text,
    .cid-shwzkeWHwg .mbr-section-btn {
    color: #fafafa;
    }
    .shadow-yellow {
        text-shadow: 2px 2px #0c4b04;
    }
    ul{
        list-style-type: none;
        margin: 0;
        padding: 0;
    }
  </style>
</head>
<body>
<section class="header2 cid-shwzkeWHwg mbr-parallax-background" id="header" style="border-bottom:5px solid rgb(47, 131, 47)">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-12 text-center">
                <img src="{{asset('img/logo-kaltim.png')}}" style="display: block;margin-left: auto; margin-right: auto;width:100px; height:120px">
                <h1 class="mbr-section-title mbr-fonts-style mb-3 display-2 shadow-yellow"><strong>Selamat Datang</strong></h1>
                <p class="mbr-text mbr-fonts-style display-5 shadow-yellow">Di Portal Badan Perencanaan Pembangunan Daerah <br />Provinsi Kalimantan Timur</p>
                <div class="mbr-section-btn mt-3">
                    <a class="btn btn-success display-4" href="/beranda"><span class="mobi-mbri mobi-mbri-globe-2 mbr-iconfont mbr-iconfont-btn"></span>Website</a> 
                    <a class="btn btn-success display-4" href="#app"><span class="mobi-mbri mobi-mbri-desktop mbr-iconfont mbr-iconfont-btn"></span>E-Gov</a>
		    <a class="btn btn-success display-4" href="/ppid"><span class="mobi-mbri mobi-mbri-globe-2 mbr-iconfont mbr-iconfont-btn"></span>PPID</a>
                    {{-- <a class="btn btn-success display-4" href="#contact"><span class="mobi-mbri mobi-mbri-phone mbr-iconfont mbr-iconfont-btn"></span>Kontak Kami</a></div> --}}
            </div>
        </div>
    </div>
</section>

<section class="gallery3 cid-shwzQWdR9F">
    <div class="container p-0">
        <div class="col-lg-12 p-0">
            <div class="carousel-portal slide p-0 m-0" id="shwUvb1ftb">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        @foreach (App\Models\Slider::orderBy('orders','asc')->whereActive(1)->get() as $key=>$value)
                            <li data-target="#myCarousel" data-slide-to="{{$loop->iteration}}" @if($key == 0) class="active" @endif ></li>
                        @endforeach;
                    </ol>
                
                    <div class="carousel-inner">
                        @foreach (App\Models\Slider::orderBy('orders','asc')->whereActive(1)->get() as $key=>$value)
                            <div class="carousel-item slider-image item @if($key == 0) active @endif">
                                <div class="item-wrapper" style="width:100%">
                                    <a href="{{ asset('storage')}}/{{$value->file_sliders}}" data-fslightbox>
                                        <img class="" src="{{ asset('storage')}}/{{$value->file_sliders}}">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <a class="carousel-control carousel-control-prev" role="button" data-slide="prev" href="#myCarousel">
                        <span class="mobi-mbri mobi-mbri-arrow-prev" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control carousel-control-next" role="button" data-slide="next" href="#myCarousel">
                        <span class="mobi-mbri mobi-mbri-arrow-next" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
            </div>
        </div>
    </div>
    <div class="container border rounded" id="app">
        <div class="mbr-section-head">
            <h4 class="mbr-section-title mbr-fonts-style align-center mb-0 display-5">
                <strong>E-Goverment</strong></h4>
        </div>
        <div class="row mt-4">
            @foreach (App\Models\Egov::orderBy('order','asc')->get() as $e)
            <div class="item features-image @if($e->title == 'SP4N LAPOR') col-md-3 offset-md-3" @else col-md-6 col-lg-3 col-xs-6 col-sm-6" @endif>
                <div class="item-wrapper">
                    <div class="item-img">
                        <a href="{{$e->links}}" target="_blank">
                        <img src="{{asset('storage/'.$e->feature_image)}}" alt="{{$e->title}}" class="img-thumbnail" style="height: 100px;object-fit: unset;">
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- <section class="contacts3 map1 cid-shwzzYefFD" id="contact">
    <div class="container">
        <div class="mbr-section-head">
            <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-5">
                <strong>Kontak Kami</strong></h3>  
        </div>
        <div class="row justify-content-center mt-4">
            <div class="card col-12 col-md-6">
                <div class="card-wrapper">
                    <div class="image-wrapper">
                        <span class="mbr-iconfont mobi-mbri-phone mobi-mbri"></span>
                    </div>
                    <div class="text-wrapper">
                        <h6 class="card-title mbr-fonts-style mb-1 display-7"><strong>Telepon &amp; Fax</strong></h6>
                        <p class="mbr-text mbr-fonts-style display-7">
                        <a href="tel:{{setting('profil-kantor.telp_kantor')}}" class="text-primary">{{setting('profil-kantor.telp_kantor')}} / </a><a href="tel:{{setting('profil-kantor.fax_kantor')}}" class="text-primary">{{setting('profil-kantor.fax_kantor')}}</a>
                        </p>
                    </div>
                </div>
                <div class="card-wrapper">
                    <div class="image-wrapper">
                        <span class="mbr-iconfont socicon-mail socicon"></span>
                    </div>
                    <div class="text-wrapper">
                        <h6 class="card-title mbr-fonts-style mb-1 display-7">
                            <strong>Email</strong>
                        </h6>
                        <p class="mbr-text mbr-fonts-style display-7">
                            <a href="mailto:{{setting('profil-kantor.email_kantor')}}" class="text-primary">{{setting('profil-kantor.email_kantor')}}</a>
                        </p>
                    </div>
                    
                </div>
                <div class="card-wrapper">
                    <div class="image-wrapper">
                        <span class="socicon-whatsapp socicon mbr-iconfont mbr-iconfont-social"></span>
                    </div>
                    <div class="text-wrapper">
                        <h6 class="card-title mbr-fonts-style mb-1 display-7">
                            <strong>WhatsApp</strong>
                        </h6>
                        <p class="mbr-text mbr-fonts-style display-7">
                            <a href="https://api.whatsapp.com/send?phone=+6281352012723&text=Selamat Pagi/Siang/Sore/Malam, Ingin menanyakan terkait Website BAPPEDA Prov Kaltim. Terimakasih" target="_blank" class="text-primary">+62 81352012723</a>
                        </p>
                    </div>
                    
                </div>
            </div>
            <div class="map-wrapper col-12 col-md-6">
                <h6 class="mbr-fonts-style mb-1 display-7">Jl. Kesuma Bangsa No.2, Kel. Sungai Pinang Luar, Kec. Samarinda Kota, Kota Samarinda, Kalimantan Timur</h6>
                <div class="google-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.671332131877!2d117.14820661533706!3d-0.4918171354156055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df67f9e3a5b4857%3A0x1095dd7216e92f7e!2sBappeda%20Kaltim!5e0!3m2!1sid!2sid!4v1606616846174!5m2!1sid!2sid" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>    
                </div>
            </div>
        </div>
    </div>
</section> --}}

<section class="footer3 cid-shwzFNTDYI" once="footers" id="footer3-4">
    <div class="mbr-overlay" style="opacity: 0.8; background-color: rgb(35, 35, 35);"></div>
    <div class="col-md-12">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="widget_list">
                        <h4 class="widget_title">Alamat Kami</h4>
                        <div class="widget_text">
                            <ul>
                                <li><a href="#"> {{ setting('profil-kantor.alamat_kantor') }} {{setting('profil-kantor.kodepos_kantor')}}</a></li>
                                    <li><a href="#">  </a></li>
                                    <li><a href="tel:{{setting('profil-kantor.telp_kantor')}}">Telepon : {{setting('profil-kantor.telp_kantor')}}</a></li>
                                    <li><a href="tel:{{setting('profil-kantor.fax_kantor')}}">Fax : {{setting('profil-kantor.fax_kantor')}} </a></li>
                                    <li><a href="mailto:{{setting('profil-kantor.email_kantor')}}">Email : {{setting('profil-kantor.email_kantor')}} </a></li>
                                    {{-- <li><a href="https://api.whatsapp.com/send?phone=+6281352012723&text=Selamat Pagi/Siang/Sore/Malam, Ingin menanyakan terkait Website BAPPEDA Prov Kaltim. Terimakasih" target="_blank">WhatsApp : +62 81352012723 </a></li> --}}
                            </ul>
                        </div>
                        <div class="city_top_social">
                            <ul>
                                <li><a href="{{setting('media-social.link_fb')}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{setting('media-social.link_twitter')}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{setting('media-social.link_yb')}}" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="{{setting('media-social.link_ig')}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="{{setting('media-social.link_wa')}}" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="widget_list">
                                <h5 class="widget_title">Pemerintah Daerah</h5>
                                <div class="widget_service">
                                    <ul>
                                        @foreach (App\Link::orderBy('order','asc')->where('category','internal')->get() as $l)
                                            <li><a href="{{$l->link}}" target="_blank">{{$l->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="widget_list">
                                <h5 class="widget_title">Instansi Terkait</h5>
                                <div class="widget_service">
                                    {{-- <div class="row"> --}}
                                        {{-- <div class="col-md-6"> --}}
                                            <ul>
                                                @foreach (App\Link::orderBy('order','asc')->where('category','external')->take(10)->get() as $l)
                                                <li><a href="{{$l->link}}" target="_blank">{{$l->name}}</a></li>
                                                @endforeach
                                            </ul>
                                        {{-- </div> --}}
                                        {{-- <div class="col-md-6">
                                            <ul>
                                                @foreach (App\Link::orderBy('order','asc')->where('category','external')->skip(10)->take(9)->get() as $l)
                                                    <li><a href="{{$l->link}}" target="_blank">{{$l->name}}</a></li>
                                                @endforeach
                                            </ul>
                                        </div> --}}
                                    {{-- </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="widget_copyright">
                    <div class="col-md-12">
                        <div class="copyright_text text-center">
                            <p><span>Copyright © 2020 - All Rights Reserved {{config('app.name')}}</span> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{ asset('theme/home') }}/assets/web/assets/jquery/jquery.min.js"></script> 
<script src="{{ asset('theme/home') }}/assets/popper/popper.min.js"></script>  
<script src="{{ asset('theme/home') }}/assets/tether/tether.min.js"></script> 
 <script src="{{ asset('theme/home') }}/assets/bootstrap/js/bootstrap.min.js"></script>  
 <script src="{{ asset('theme/home') }}/assets/smoothscroll/smooth-scroll.js"></script>  
 <script src="{{ asset('theme/home') }}/assets/parallax/jarallax.min.js"></script> 
 <script src="{{ asset('theme/home') }}/assets/theme/js/script.js"></script>
 <script src="{{asset('vendor/fslightbox.js')}}"></script>
 <script>
    $(document).ready(function(){
      $(".carousel-portal").carousel({interval: 5000});
    });
</script>
</body>
</html>
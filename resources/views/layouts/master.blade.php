<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @if (isset($title))
            {{ $title }}
        @else
            {{ setting('site.title') }}
        @endif
    </title>
    <link rel="shortcut icon" href="{{ asset('storage/settings') }}/September2020/akBHm4gYEq4pgdfOLIHQ.png">
    <meta name="robots" content="index, follow">
    <meta name="description" content="{{ setting('site.description') }}">
    <meta name="keywords" content="{{ setting('site.keyword') }}">
    <meta name="author" content="{{ setting('site.title') }}">
    <meta http-equiv="imagetoolbar" content="no">
    <meta name="language" content="Indonesia">
    <meta name="revisit-after" content="7">
    <meta name="webcrawlers" content="all">
    <meta name="rating" content="general">
    <meta name="spiders" content="all">
    <link href="{{ asset('theme/main/css') }}/bootstrap.css" rel="stylesheet">
    <!-- Slick Slider CSS -->
    <link href="{{ asset('theme/main/css') }}/slick-theme.css" rel="stylesheet" />
    <!-- ICONS CSS -->
    <link href="{{ asset('theme/main/css') }}/font-awesome.css" rel="stylesheet">
    <!-- ICONS CSS -->
    <link href="{{ asset('theme/main/css') }}/animation.css" rel="stylesheet">
    <!-- Pretty Photo CSS -->
    <link href="{{ asset('theme/main/css') }}/prettyPhoto.css" rel="stylesheet">
    <!-- Pretty Photo CSS -->
    <link href="{{ asset('theme/main/css') }}/jquery.bxslider.css" rel="stylesheet">
    <!-- Pretty Photo CSS -->
    <link href="{{ asset('theme/main/css') }}/style5.css" rel="stylesheet">
    <!-- Pretty Photo CSS -->
    <link href="{{ asset('theme/main/css') }}/demo.css" rel="stylesheet">
    <!-- Pretty Photo CSS -->
    <link href="{{ asset('theme/main/css') }}/fig-hover.css" rel="stylesheet">
    <!-- Typography CSS -->
    <link href="{{ asset('theme/main/css') }}/typography.css" rel="stylesheet">
    <!-- Custom Main StyleSheet CSS -->
    <link href="{{ asset('theme/main') }}/style.css" rel="stylesheet">
    <!-- Custom Main StyleSheet CSS -->
    <link href="{{ asset('theme/main/css') }}/component.css" rel="stylesheet">
    <!-- Custom Main StyleSheet CSS -->
    <link href="{{ asset('theme/main/css') }}/sidebar-widget.css" rel="stylesheet">
    <!-- Custom Main StyleSheet CSS -->
    <link href="{{ asset('theme/main/css') }}/shotcode.css" rel="stylesheet">
    <!-- Custom Main StyleSheet CSS -->
    <link href="{{ asset('theme/main') }}/svg-icon.css" rel="stylesheet">
    <!-- Color CSS -->
    <link href="{{ asset('theme/main/css') }}/color.css" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="{{ asset('theme/main/css') }}/responsive.css" rel="stylesheet">
    <link href="{{ asset('theme/main') }}/custom.css" rel="stylesheet">
    <link href="{{ asset('') }}fullcalendar/main.css" rel="stylesheet">
    <style>
        .sab_banner_text h5 {
            color: white;
        }

        .text-white {
            color: white;
        }

        .fa-white {
            color: white;
        }
    </style>
    @yield('styles')

</head>

<body class="demo-5">
    <!--WRAPPER START-->
    <div class="wrapper">
        <header>
            <!--CITY TOP WRAP START-->
            <div class="city_top_wrap">
                <div class="container">
                    <div class="city_top_logo">
                        <figure>
                            <h1><a href="{{ url('/') }}"><img src="{{ asset('storage/' . setting('site.logo')) }}"
                                        alt="TopLogo"></a></h1>
                        </figure>
                    </div>
                    <div class="city_top_news">
                        <span>Pengumuman</span>
                        <div class="city-news-slider">
                            <marquee behavior="" direction="">
                                @foreach (App\Models\Newsinfo::orderBy('id', 'desc')->take(1)->get() as $ni)
                                    <p>{!! $ni->content !!}<i class="fa fa-star"></i></p>
                                @endforeach
                            </marquee>
                        </div>
                    </div>
                    {{-- <div class="city_top_social">
							<ul>
								<li><a href="{{setting('media-social.link_fb')}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
								<li><a href="{{setting('media-social.link_twitter')}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
								<li><a href="{{setting('media-social.link_yb')}}" target="_blank"><i class="fa fa-youtube"></i></a></li>
								<li><a href="{{setting('media-social.link_ig')}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
							</ul>
						</div> --}}
                </div>
            </div>
            <!--CITY TOP WRAP END-->

            <!--CITY TOP NAVIGATION START-->
            <div class="city_top_navigation">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="navigation">
                                <ul>
                                    {{ menu('homepage', 'layouts.nav-item') }}
                                </ul>
                            </div>
                            <!--DL Menu Start-->
                            <div id="kode-responsive-navigation" class="dl-menuwrapper">
                                <button class="dl-trigger">Open Menu</button>
                                <ul class="dl-menu">
                                    {{ menu('homepage', 'layouts.nav-item2') }}
                                </ul>
                            </div>
                            <!--DL Menu END-->
                        </div>
                        {{-- <div class="col-md-2">
								<div class="city_top_form">
									<div class="city_top_search">
										<input type="text" placeholder="Pencarian">
										<a href="#"><i class="fa fa-search"></i></a>
									</div>
								</div>
							</div> --}}
                    </div>
                </div>
            </div>
            <!--CITY TOP NAVIGATION END-->


        </header>

        @yield('content')

        <footer>
            <div class="widget_wrap overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="widget_list">
                                <h4 class="widget_title">Alamat Kami</h4>
                                <div class="widget_text">
                                    <ul>
                                        <li><a href="#"> {{ setting('profil-kantor.alamat_kantor') }}
                                                {{ setting('profil-kantor.kodepos_kantor') }}</a></li>
                                        <li><a href="#"> </a></li>
                                        <li><a href="tel:{{ setting('profil-kantor.telp_kantor') }}">Telepon :
                                                {{ setting('profil-kantor.telp_kantor') }}</a></li>
                                        <li><a href="tel:{{ setting('profil-kantor.fax_kantor') }}">Fax :
                                                {{ setting('profil-kantor.fax_kantor') }} </a></li>
                                        <li><a href="mailto:{{ setting('profil-kantor.email_kantor') }}">Email :
                                                {{ setting('profil-kantor.email_kantor') }} </a></li>
                                        {{-- <li><a href="https://api.whatsapp.com/send?phone=+6281352012723&text=Selamat Pagi/Siang/Sore/Malam, Ingin menanyakan terkait Website BAPPEDA Prov Kaltim. Terimakasih" target="_blank">WhatsApp : +62 81352012723 </a></li> --}}
                                    </ul>
                                </div>
                                <div class="city_top_social">
                                    <ul>
                                        <li><a href="{{ setting('media-social.link_fb') }}" target="_blank"><i
                                                    class="fa fa-facebook"></i></a></li>
                                        <li><a href="{{ setting('media-social.link_twitter') }}" target="_blank"><i
                                                    class="fa fa-twitter"></i></a></li>
                                        <li><a href="{{ setting('media-social.link_yb') }}" target="_blank"><i
                                                    class="fa fa-youtube"></i></a></li>
                                        <li><a href="{{ setting('media-social.link_ig') }}" target="_blank"><i
                                                    class="fa fa-instagram"></i></a></li>
                                        <li><a href="{{ setting('media-social.link_wa') }}" target="_blank"><i
                                                    class="fa fa-whatsapp"></i></a></li>
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
                                                @foreach (App\Link::orderBy('order', 'asc')->where('category', 'internal')->get() as $l)
                                                    <li><a href="{{ $l->link }}"
                                                            target="_blank">{{ $l->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="widget_list">
                                        <h5 class="widget_title">Instansi Terkait</h5>
                                        <div class="widget_service">
                                            {{-- <div class="col-md-6"> --}}
                                            <ul>
                                                @foreach (App\Link::orderBy('order', 'asc')->where('category', 'external')->take(10)->get() as $l)
                                                    <li><a href="{{ $l->link }}"
                                                            target="_blank">{{ $l->name }}</a></li>
                                                @endforeach
                                            </ul>
                                            {{-- </div> --}}
                                            {{-- <div class="col-md-6">
                                                    <ul>
                                                        @foreach (App\Link::orderBy('order', 'asc')->where('category', 'external')->skip(9)->take(9)->get() as $l)
                                                            <li><a href="{{$l->link}}" target="_blank">{{$l->name}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget_copyright row">
                            <div class="col-md-3 col-sm-6">
                                <div class="widget_logo">
                                    <a href="#"><img
                                            src="{{ asset('') }}theme/main/images/top-logo-bappeda.png"
                                            alt=""></a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="copyright_text">
                                    <p><span>Copyright © 2021 - All Rights Reserved {{ config('app.name') }}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="copyright_text">
                                    <p>Pengunjung tahun ini : {{ $visitors['yearly'] }}</p>
                                    <p>Pengunjung bulan ini : {{ $visitors['monthly'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- <a href="https://bappeda.kaltimprov.go.id" style="position: fixed; right: 10px; bottom: 15px; z-index: 2;"><button type="button" class="btn btn-primary" style="height: 50px; background-color: #34495e;border-radius: 100%; width: 50px;"><span class="fc-icon fc-icon-chevron-left"></span></button></a> -->
        <a href="{{ setting('media-social.link_wa') }}" target="_blank"
            style="position: fixed; right: 10px; bottom: 15px; z-index: 3;"><button type="button"
                class="btn btn-primary"
                style="color: #fff; padding: 10px; height: 50px; background-color: #34495e;">Chat Admin</button></a>
    </div>
    <!--WRAPPER END-->
    <!--Jquery Library-->
    <script src="{{ asset('') }}theme/main/js/jquery.js"></script>
    <!--Bootstrap core JavaScript-->
    <script src="{{ asset('') }}theme/main/js/bootstrap.js"></script>
    <!--Slick Slider JavaScript-->
    <script src="{{ asset('') }}theme/main/js/slick.min.js"></script>
    <!--Pretty Photo JavaScript-->
    <script src="{{ asset('') }}theme/main/js/jquery.prettyPhoto.js"></script>
    <!--Pretty Photo JavaScript-->
    <script src="{{ asset('') }}theme/main/js/jquery.bxslider.min.js"></script>
    <!--Pretty Photo JavaScript-->

    <!--Pretty Photo JavaScript-->
    <script src="{{ asset('') }}theme/main/js/modernizr.custom.js"></script>
    <!--Pretty Photo JavaScript-->
    <script src="{{ asset('') }}theme/main/js/jquery.dlmenu.js"></script>
    <!--Pretty Photo JavaScript-->
    <script src="{{ asset('') }}theme/main/js/downCount.js"></script>
    <!--Counter up JavaScript-->
    <script src="{{ asset('') }}theme/main/js/waypoints.js"></script>
    <!--Pretty Photo JavaScript-->
    <script src="{{ asset('') }}theme/main/js/waypoints-sticky.js"></script>

    <!--Custom JavaScript-->
    <script src="{{ asset('') }}theme/main/js/custom.js"></script>
    <script>
        document.documentElement.className = 'js';
    </script>
    @yield('scripts')

</body>

</html>

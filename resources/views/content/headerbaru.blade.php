@extends('layouts.master')
@section('content')
@section('styles')
    <link href="{{ asset('') }}vendor/lity-2.4.1/dist/lity.css" rel="stylesheet">
    <link href="{{ asset('') }}fullcalendar/fullcalendar-edit.css" rel="stylesheet">
@endsection
<style>
    .width_control {
        height: 220px;
    }

    .text-overflow {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box !important;
        -webkit-line-clamp: 4;
        /* number of lines to show */
        -webkit-box-orient: vertical;
    }

    input[type=radio] {
        display: none;
    }

    input[type=radio]+span {
        display: inline-block;
        border: 1px solid #000;
        border-radius: 50%;
        margin: 0 0.5em;
    }

    input[type=radio]:checked+span {
        background-color: #5f65d9;
    }

    .radio3 {
        width: 1em;
        height: 1em;
    }

    .radio-inline {
        padding-left: 5px !important;
    }
</style>
<div class="city_main_banner">
    <div class="main-banner-slider">
        @foreach ($slider as $s)
            <a
                @if ($s->title == 'Survey Kepuasan Masyarakat (SKM)') href="#" data-toggle="modal" data-target="#modalGForm" @else href="{{ asset('storage/' . $s->file_sliders) }}" data-fslightbox @endif>
                <img src="{{ asset('storage/' . $s->file_sliders) }}" alt="Slider Image" style="width:100%">
            </a>
        @endforeach
    </div>
</div>
<!--CITY MAIN BANNER END-->
{{-- <div class="city_visit_wrap" style="padding-bottom:0px ">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class="heding_full" style="margin-top: 20px; margin-bottom:0px;">
                    <div class="section_heading">
                        <h2>Selamat Datang</h2><br />
                        <h5>di Website Bappeda Provinsi Kalimantan Timur</h5>
                    </div>
                </div>
                <div>
                    {!! setting('profil-kantor.visi_misi') !!}
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- AGENDA -->
<div class="city_blog_wrap" style="background:#efeded; padding-top:0px; padding-bottom:20px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heding_full" style="margin-top: 20px; margin-bottom:0px;">
                    <div class="section_heading">
                        {{-- <span>Berita</span> --}}
                        <h2>Berita Terkini</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-sm-8 col-lg-8">
                <div class="row">
                    {{-- <div id="calendar"></div> --}}
                    <div class="row">
                        @foreach ($post_news as $kp => $pn)
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="city_blog_fig">
                                    <a href="{{ route('post.detail', $pn->slug) }}">
                                        <figure class="box" style="height: 250px;">
                                            <img src="{{ asset('storage/' . $pn->image) }}" alt="Image"
                                                style="height: inherit; object-fit: cover;">
                                        </figure>
                                    </a>
                                    <div class="city_blog_text">
                                        <i class="fa fa-calendar"></i> {{ Myhelpers::tglind($pn->published_at) }} | <i
                                            class="fa fa-folder"></i> {{ $pn->categoryId->name }}<br />
                                        <a href="{{ route('post.detail', $pn->slug) }}"
                                            title="{{ $pn->title }}">{{ Str::limit($pn->title, 50, '...') }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        @foreach ($post_news2 as $kp => $pn2)
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="city_blog_fig">
                                    <a href="{{ route('post.detail', $pn2->slug) }}">
                                        <figure class="box" style="height: 250px;">
                                            <img src="{{ asset('storage/' . $pn2->image) }}" alt="Image"
                                                style="height: inherit; object-fit: cover;">
                                        </figure>
                                    </a>
                                    <div class="city_blog_text">
                                        <i class="fa fa-calendar"></i> {{ Myhelpers::tglind($pn2->published_at) }} | <i
                                            class="fa fa-folder"></i> {{ $pn2->categoryId->name }}<br />
                                        <a href="{{ route('post.detail', $pn2->slug) }}"
                                            title="{{ $pn2->title }}">{{ Str::limit($pn2->title, 50, '...') }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <a class="see_more_btn" href="{{ route('post.index') }}" style="border-top: none">Lihat
                                Selengkapnya<i class="fa icon-next-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-lg-4" style="padding:0px 20px 20px 20px;">
                <div class="row">
                    <div id="cobagan">
                        <div class="prevnext_agendabutton">
                            <button class="agenda-prev-button agendabutton" id="agenda-prev"
                                data-tanggal="{{ date('Y-m-d', strtotime(date('Y-m-d') . '-1 day')) }}" type="button">
                                <span class="fc-icon fc-icon-chevron-left"></span>
                            </button>
                            <button class="agenda-next-button agendabutton" id="agenda-next"
                                data-tanggal="{{ date('Y-m-d', strtotime(date('Y-m-d') . '+1 day')) }}" type="button">
                                <span class="fc-icon fc-icon-chevron-right"></span>
                            </button>
                        </div>
                        @if (!empty($agendahariini))
                            <div class="panel panel-default">
                                <div class="panel-heading text-center">
                                    {{ Myhelpers::tglind(date('Y-m-d')) }}
                                </div>
                            </div>
                            @foreach ($agendahariini as $ahariini)
                                <div class="panel panel-default">
                                    <div class="panel-heading text-center">
                                        {{ $ahariini->caption }}
                                    </div>
                                    <ul class="list-group">
                                        <li class="list-group-item">Jam : {{ $ahariini->times }}</li>
                                        <li class="list-group-item">Tempat : {{ $ahariini->location }}</li>
                                        @if ($ahariini->description != '')
                                            <li class="list-group-item">Dihadiri : {{ $ahariini->description }}</li>
                                        @else
                                            <li class="list-group-item">Dihadiri : -</li>
                                        @endif
                                    </ul>
                                </div>
                            @endforeach
                        @else
                            <div class="panel panel-default">
                                <div class="panel-heading text-center">
                                    {{ Myhelpers::tglind(date('Y-m-d')) }}
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading text-center">
                                    Tidak ada Agenda
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BERITA TERKINI DAN BERITA FOTO -->
{{-- <div class="city_blog_wrap" style="background: white; padding-top:0px; padding-bottom:20px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class="heding_full" style="margin-top: 20px; margin-bottom:0px;">
                    <div class="section_heading">
                        <span>Topik</span>
                        <h2>Terkini</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach ($post_news as $kp => $pn)
                        <div class="col-md-6 col-sm-6 col-lg-4">
                            <div class="city_blog_fig">
                                <a href="{{ route('post.detail', $pn->slug) }}">
                                    <figure class="box" style="height: 350px;">
                                        <img src="{{ asset('storage/' . $pn->image) }}" alt="Image"
                                            style="height: inherit; object-fit: cover;">
                                    </figure>
                                </a>
                                <div class="city_blog_text">
                                    <i class="fa fa-calendar"></i> {{ Myhelpers::tglind($pn->published_at) }} | <i
                                        class="fa fa-folder"></i> {{ $pn->categoryId->name }}<br />
                                    <a href="{{ route('post.detail', $pn->slug) }}"
                                        title="{{ $pn->title }}">{{ Str::limit($pn->title, 50, '...') }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    @foreach ($post_news2 as $kp => $pn2)
                        <div class="col-md-6 col-sm-6 col-lg-4">
                            <div class="city_blog_fig">
                                <a href="{{ route('post.detail', $pn2->slug) }}">
                                    <figure class="box" style="height: 350px;">
                                        <img src="{{ asset('storage/' . $pn2->image) }}" alt="Image"
                                            style="height: inherit; object-fit: cover;">
                                    </figure>
                                </a>
                                <div class="city_blog_text">
                                    <i class="fa fa-calendar"></i> {{ Myhelpers::tglind($pn2->published_at) }} | <i
                                        class="fa fa-folder"></i> {{ $pn2->categoryId->name }}<br />
                                    <a href="{{ route('post.detail', $pn2->slug) }}"
                                        title="{{ $pn2->title }}">{{ Str::limit($pn2->title, 50, '...') }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <a class="see_more_btn" href="{{ route('post.index') }}" style="border-top: none">Lihat
                            Selengkapnya<i class="fa icon-next-1"></i></a>
                    </div>
                </div>
            </div>
            BERITA NASIONAL
            <div class="col-md-5 col-sm-5 col-lg-4" style="padding:0px 20px 20px 20px; background: #efeded; margin-top:20px;">
                <div class="heding_full">
                    <div class="section_heading" style="margin-top: 20px; margin-bottom:0px;">
                        <span>Topik</span>
                        <h2>Berita Nasional</h2>
                    </div>
                </div>
                SECTION HEADING END
                <div class="row">
                    @foreach ($berita_nasional as $kb => $bn)
                        <div class="col-lg-6 col-md-6 col-sm-6 m-1">
                            <div class="city_blog_fig">
                                <a href="{{ route('post.detail', $bn->slug) }}">
                                <figure class="box" style="height: 120px;">
                                    <img src="{{ asset('storage/' . $bn->image) }}" alt="Image" style="height: inherit; object-fit: cover;">
                                </figure>
                                <div class="city_blog_text p-0" style="margin-top: 10px; margin-bottom:10px">
                                    <i class="fa fa-calendar"></i> {{ Myhelpers::tglind($bn->published_at) }}<br />
                                    <a href="{{ route('post.detail', $bn->slug) }}" title="{{ $bn->title }}">{{ Str::limit($bn->title, 25, '...') }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-lg-12">
                        <a class="see_more_btn" href="{{ route('post_foto.index') }}" style="border-top: none">Lihat Selengkapnya<i class="fa icon-next-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- Data Center -->
<div class="city_blog_wrap" style="background:#dbd7d7; padding-bottom: 0px;">
    <div class="container">
        {{-- Judul Data Center --}}
        <div class="row">
            <div class="col-md-12">
                <div class="heding_full" style="margin-top: 20px; margin-bottom:0px;">
                    <div class="section_heading">
                        <h2>Data Center</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <a href="{{ route('dataperencanaan.index') }}">
                        <div class="panel panel-default" style=" background-color: transparent";>
                            <div class="panel-body text-center">
                                <img src="{{ asset('img/book-stack.png') }}" alt=""
                                    style="width:100px; height:100px;">
                                <h2 style="font-weight:bold; color: #34495e!important; font-size: 4vh!important;">
                                    Perencanaan</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <a href="{{ route('datapengendalianevaluasi.index') }}">
                        <div class="panel panel-default" style=" background-color: transparent";>
                            <div class="panel-body text-center">
                                <img src="{{ asset('img/book-stack.png') }}" alt=""
                                    style="width:100px; height:100px;">
                                <h2 style="font-weight:bold; color: #34495e!important; font-size: 4vh!important;">
                                    Pengendalian dan Evaluasi</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <a href="{{ route('kumpulanpaparan.index') }}">
                        <div class="panel panel-default" style=" background-color: transparent";>
                            <div class="panel-body text-center">
                                <img src="{{ asset('img/book-stack.png') }}" alt=""
                                    style="width:100px; height:100px;">
                                <h2 style="font-weight:bold; color: #34495e!important; font-size: 4vh!important;">
                                    Kumpulan Paparan</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <a href="{{ route('datalainnya.index') }}">
                        <div class="panel panel-default" style=" background-color: transparent";>
                            <div class="panel-body text-center">
                                <img src="{{ asset('img/book-stack.png') }}" alt=""
                                    style="width:100px; height:100px;">
                                <h2 style="font-weight:bold; color: #34495e!important; font-size: 4vh!important;">Data
                                    Lainnya</h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        {{-- Judul Perencanaan, Pengendalian dan Evaluasi --}}
        {{-- <div class="row">
            <div class="col-md-6">
                <div class="heding_full" style="margin-top: 20px; margin-bottom:0px;">
                    <div class="section_heading">
                        <h2 style="color: #34495e!important; font-size: 5vh!important;">Perencanaan</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="heding_full">
                    <div class="section_heading" style="margin-top: 20px; margin-bottom:0px;">
                        <h2 style="color: #34495e!important; font-size: 5vh!important;">Pengendalian dan Evaluasi</h2>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- Tabel Perencanaan, Pengendalian dan Evaluasi --}}
        {{-- <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="2%">No</th>
                            <th>Judul</th>
                            <th width="20"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_documents as $document)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $document->title }}</td>
                                <td>
                                    @if (json_decode($document->file_documents) !== null)
                                        @foreach (json_decode($document->file_documents) as $i)
                                            <a href="{{ asset('storage') }}/{{ $i->download_link }}" target="_blank">Download</a>
                                        @endforeach
                                    @else
                                        <a href="{{ asset('storage') }}/{{ $document->file_documents }}" target="_blank">Download</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-lg-12">
                    <a class="see_more_btn" href="{{ route('dataperencanaan.index') }}" style="border-top: none">Lihat Selengkapnya<i class="fa icon-next-1"></i></a>
                </div>
            </div>
            <div class="col-md-6">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="2%">No</th>
                            <th>Judul</th>
                            <th width="20"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($data_pengendalianevaluasis->count() == 0)
                            <tr>
                                <td class="text-center" colspan="3">Tidak ada data</td>
                            </tr>
                            <tr>
                                <td class="text-center" colspan="3"></td>
                            </tr>
                            <tr>
                                <td class="text-center" colspan="3"></td>
                            </tr>
                            <tr>
                                <td class="text-center" colspan="3"></td>
                            </tr>
                            <tr>
                                <td class="text-center" colspan="3"></td>
                            </tr>
                            <tr>
                                <td class="text-center" colspan="3"></td>
                            </tr>
                            <tr>
                                <td class="text-center" colspan="3"></td>
                            </tr>
                            <tr>
                                <td class="text-center" colspan="3"></td>
                            </tr>
                            @else
                                @foreach ($data_pengendalianevaluasis as $pengendalian)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $pengendalian->nama_data }}</td>
                                        <td>
                                            @if (json_decode($pengendalian->file_data) !== null)
                                                @foreach (json_decode($pengendalian->file_data) as $i)
                                                    <a href="{{ asset('storage') }}/{{ $i->download_link }}" target="_blank">Download</a>
                                                @endforeach
                                            @else
                                                <a href="{{ asset('storage') }}/{{ $pengendalian->file_data }}" target="_blank">Download</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                    </tbody>
                </table>
                <div class="col-lg-12">
                    <a class="see_more_btn" href="{{ route('datapengendalianevaluasi.index') }}" style="border-top: none">Lihat Selengkapnya<i class="fa icon-next-1"></i></a>
                </div>
            </div>
        </div> --}}
        {{-- Judul Paparan, Data Lainnya --}}
        {{-- <div class="row">
            <div class="col-md-6">
                <div class="heding_full" style="margin-top: 20px; margin-bottom:0px;">
                    <div class="section_heading">
                        <h2 style="color: #34495e!important; font-size: 5vh!important;">Kumpulan Paparan</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="heding_full">
                    <div class="section_heading" style="margin-top: 20px; margin-bottom:0px;">
                        <h2 style="color: #34495e!important; font-size: 5vh!important;">Data Lainnya</h2>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- Tabel Paparan, Data Lainnya --}}
        {{-- <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="2%">No</th>
                            <th>Judul</th>
                            <th width="20"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($data_paparans->count() == 0)
                            <tr>
                                <td class="text-center" colspan="3">Tidak ada data</td>
                            </tr>
                            <tr>
                                <td class="text-center" colspan="3"></td>
                            </tr>
                            <tr>
                                <td class="text-center" colspan="3"></td>
                            </tr>
                            <tr>
                                <td class="text-center" colspan="3"></td>
                            </tr>
                            <tr>
                                <td class="text-center" colspan="3"></td>
                            </tr>
                            <tr>
                                <td class="text-center" colspan="3"></td>
                            </tr>
                            <tr>
                                <td class="text-center" colspan="3"></td>
                            </tr>
                            <tr>
                                <td class="text-center" colspan="3"></td>
                            </tr>
                        @else
                            @foreach ($data_paparans as $paparan)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $paparan->nama_data }}</td>
                                    <td>
                                        @if (json_decode($paparan->file_data) !== null)
                                            @foreach (json_decode($paparan->file_data) as $i)
                                                <a href="{{ asset('storage') }}/{{ $i->download_link }}" target="_blank">Download</a>
                                            @endforeach
                                        @else
                                            <a href="{{ asset('storage') }}/{{ $paparan->file_data }}" target="_blank">Download</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="col-lg-12">
                    <a class="see_more_btn" href="{{ route('kumpulanpaparan.index') }}" style="border-top: none">Lihat Selengkapnya<i class="fa icon-next-1"></i></a>
                </div>
            </div>
            <div class="col-md-6">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="2%">No</th>
                            <th>Judul</th>
                            <th width="20"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($data_centers->count() == 0)
                            <tr>
                                <td class="text-center" colspan="3">Tidak ada data</td>
                            </tr>
                            <tr>
                                <td class="text-center" colspan="3"></td>
                            </tr>
                            <tr>
                                <td class="text-center" colspan="3"></td>
                            </tr>
                            <tr>
                                <td class="text-center" colspan="3"></td>
                            </tr>
                            <tr>
                                <td class="text-center" colspan="3"></td>
                            </tr>
                            <tr>
                                <td class="text-center" colspan="3"></td>
                            </tr>
                            <tr>
                                <td class="text-center" colspan="3"></td>
                            </tr>
                            <tr>
                                <td class="text-center" colspan="3"></td>
                            </tr>
                        @else
                            @foreach ($data_centers as $centers)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $centers->nama_data }}</td>
                                    <td>
                                        @if (json_decode($centers->file_data) !== null)
                                            @foreach (json_decode($centers->file_data) as $i)
                                                <a href="{{ asset('storage') }}/{{ $i->download_link }}" target="_blank">Download</a>
                                            @endforeach
                                        @else
                                            <a href="{{ asset('storage') }}/{{ $centers->file_data }}" target="_blank">Download</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="col-lg-12">
                    <a class="see_more_btn" href="{{ route('datalainnya.index') }}" style="border-top: none">Lihat Selengkapnya<i class="fa icon-next-1"></i></a>
                </div>
            </div>
        </div> --}}
    </div>
</div>
<!-- PENGHARGAAN -->
<div class="city_blog_wrap" style="background: white; padding-bottom: 0px;">
    <div class="container">
        <div class="section_heading">
            <div class="row">
                <div class="col-md-6">
                    <h2>Penghargaan</h2>
                </div>
                <div class="col-md-6">
                    <a class="see_more_btn" href="{{ route('penghargaan.index') }}"
                        style="border-top: none; text-align: right;">Lihat Selengkapnya</a>
                </div>
            </div>
        </div>
        {{-- <div class="d-block text-center" style="margin-bottom: 20px;">
            <a href="http://elib.bappedakaltim.com/katalog" target="_blank" class="theam_btn btn2" style="border:1px solid #CCC; background:green">Lihat di E-Library Bappeda Kaltim</a> <a href="/dokumen" class="theam_btn btn2" style="border:1px solid #CCC; background:#333">Download Area</a>
        </div> --}}
        {{-- <div class="d-block text-center" style="margin-bottom: 20px;">
            <a href="{{ route('penghargaan.index')}}" target="_blank" class="theam_btn btn2" style="border:1px solid #CCC; background:green">Lihat Selengkapnya</a>
        </div> --}}
        <div class="city-project-slider row">
            @foreach ($penghargaan as $p)
                <div>
                    <div class="city_project_fig">
                        <a href="{{ asset('storage/' . $p->foto) }}" data-fslightbox><img
                                src="{{ asset('storage/' . $p->foto) }}" alt="" class="img-thumbnail"
                                style="height: 200px; object-fit:cover;"></a>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- <div class="row">
            <div class="col-lg-12">
                <a class="see_more_btn" href="{{ route('penghargaan.index') }}" style="border-top: none">Lihat
                    Selengkapnya</a>
            </div>
        </div> --}}
    </div>
</div>
<!-- PETA -->
<div class="city_blog_wrap" style="background:#dbd7d7; padding-bottom: 20px;">
    <div class="container">
        <div class="section_heading">
            {{-- <span>Produk</span> --}}
            <div class="row">
                {{-- <span>Produk</span> --}}
                <div class="col-md-6">
                    <h2>Peta</h2>
                </div>
                <div class="col-md-6">
                    <a class="see_more_btn" href="{{ route('map.index') }}"
                        style="border-top: none; text-align: right;">Lihat Selengkapnya</a>
                </div>
            </div>
        </div>
        {{-- <div class="d-block text-center" style="margin-bottom: 20px;">
            <a href="{{ route('map.index')}}" target="_blank" class="theam_btn btn2" style="border:1px solid #CCC; background:green">Lihat Selengkapnya</a>
        </div> --}}
        <div class="city-project-slider row">
            @foreach ($peta as $peta)
                <div>
                    <div class="city_project_fig">
                        <a href="{{ asset('storage/' . $peta->file_peta) }}" data-fslightbox><img
                                src="{{ asset('storage/' . $peta->file_peta) }}" alt=""
                                class="img-thumbnail" style="height: 200px; object-fit:cover;"></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- APLIKASI BAPPEDA KALTIM -->
<div class="city_requset_wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="city_request_list">
                    <div class="city_request_row text-center">
                        <div class="city_request_text">
                            <h4 style="margin-bottom:25px ">Aplikasi Bappeda Provinsi Kalimantan Timur</h4>
                            <div class="row">
                                @foreach (App\Models\Egov::orderBy('order', 'asc')->get() as $e)
                                    <div
                                        class="@if ($e->title == 'SP4N LAPOR') col-lg-3 col-md-6 col-md-offset-3 col-sm-6 @else col-lg-3 col-md-6 col-sm-6 @endif">
                                        <a href="{{ $e->links }}" target="_blank">
                                            <div class="panel panel-default">
                                                <div class="panel-body text-center">
                                                    <img src="{{ asset('storage/' . $e->feature_image) }}"
                                                        alt="{{ $e->title }}"
                                                        style="object-fit: unset;height:100px;">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            {{-- <div class="row">
                                <div class="col-md-offset-2">
                                    @foreach (App\Models\Egov::skip(4)->take(4)->get() as $e2)
                                    <div class="col-lg-3 col-md-6 col-sm-4">
                                        <a href="{{$e2->links}}" target="_blank">
                                            <div class="panel panel-default">
                                                <div class="panel-body text-center">
                                                <img src="{{asset('storage/'.$e2->feature_image)}}" alt="{{$e2->title}}" style="object-fit:contain; height:110px;">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- INSTAGRAM DAN VIDEO YOUTUBE -->
<div class="city_blog_wrap" style="background: #dbd7d7; padding-top:0px; margin-bottom:10px;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6" style="margin-top:20px;">
                <div class="heding_full" style="margin-top: 20px; margin-bottom:0px;">
                    <div class="section_heading">
                        <h2>Instagram</h2>
                    </div>
                </div>
                <div class="row" id="instagram-content">
                    <div class="col-sm-12 m-1" style="margin-bottom:10px">
                        <div class="row">
                            <div class="col-sm-2">
                                <img id="instagram-profile" style="width:100%;" src="#" alt="">
                            </div>
                            <div class="col-sm-10">
                                <h5 id="instagram-name"></h5>
                                <h6 id="instagram-followers"><span></span> Followers</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6" style="background:rgb(174, 236, 179); margin-top:20px;">
                <div class="heding_full" style="margin-top: 20px; margin-bottom:0px;">
                    <div class="section_heading">
                        <h2>Youtube</h2>
                    </div>
                </div>
                <div class="row" id="youtube-content">
                    <div class="col-sm-12 m-2">
                        <div class="row">
                            <div class="col-sm-2">
                                <img id="youtube-profile" style="width:100%;" src="#" alt="">
                            </div>
                            <div class="col-sm-10">
                                <h5 id="youtube-name">Nama Youtube</h5>
                                <h6 id="youtube-subscriber"><span></span> Subscribers</h6>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="row" id="youtube-content1" class="mt-3">
		            <div class="col-sm-12 m-1" style="margin-bottom:10px;margin-top:60px;">
                        <div class="row">
                            <div class="col-sm-2">
                                <img id="youtube-profile1" style="width:100%;" src="#" alt="">
                            </div>
                            <div class="col-sm-10">
                                <h5 id="youtube-name1">Nama Youtube</h5>
                                <h6 id="youtube-subscriber1"><span></span> Subscribers</h6>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <a class="twitter-timeline" data-width="100%" data-dnt="true"
                    href="https://twitter.com/bapp_kaltim?ref_src=twsrc%5Etfw" data-tweet-limit="1">Tweets by
                    bapp_kaltim</a>
                <script async defer src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> --}}
            </div>
        </div>
    </div>
</div>
{{-- MODAL AGENDA KLIK  --}}
<div class="modal animated fadeIn" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" style="display: contents;">Detail Agenda</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalklikevent">
                <form>
                    <div class="form-group">
                        <label>Nama Agenda</label>
                        <textarea id="nama_agenda" class="form-control" rows="5" disabled></textarea>
                    </div>
                    <div class="form-group">
                        <label>Tempat</label>
                        <input id="tempat_agenda" type="text" class="form-control" disabled value="">
                    </div>
                    <div class="form-group">
                        <label>Dihadiri</label>
                        <input id="tempat_agenda" type="text" class="form-control" disabled value="">
                    </div>
                    <div class="form-group">
                        <label>Tanggal & Jam</label>
                        <input id="tempat_agenda" type="text" class="form-control" disabled value="">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"
                    style="padding: 6px 12px; color: #fff; background-color: #d9534f; border-color: #d43f3a;">Tutup</button>
            </div>
        </div>
    </div>
</div>
{{-- MODAL GOOGLE FORM   --}}
<div class="modal animated fadeIn" id="modalGForm"="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" style="display: contents;">Survei Kepuasan Masyarakat Bappeda Provinsi
                    Kalimantan Timur</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalklikevent">
                <iframe
                    src="https://docs.google.com/forms/d/e/1FAIpQLScr3V2FD7NDIfjEvUdKFI50QR7-3pmyXMoiY4Z6zEF7dlq2NQ/viewform?embedded=true"
                    width="700" height="520" frameborder="0" marginheight="0" marginwidth="0"></iframe>
            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-danger" data-dismiss="modal" style="padding: 6px 12px; color: #fff; background-color: #d9534f; border-color: #d43f3a;">Tutup</button> --}}
            </div>
        </div>
    </div>
</div>
{{-- MODAL LINK RPD   --}}
<div class="modal animated fadeIn" id="modalLinkRPD"="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h6 class="modal-title" style="display: contents;">Ruang Tanggapan Rencana Pembangunan Daerah (RPD) Provinsi Kalimantan Timur<br>Tahun 2024 - 2026</h6> --}}
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalklikevent">
                {{-- <a href="{{route('ruangpublik.index')}}"><img src="{{asset('img/SliderLinkRPD.png')}}" alt="TopLogo"></a> --}}
                <div class="heding_full" style="margin-top: 20px; margin-bottom:0px;">
                    <div class="section_heading">
                        <h2>Selamat Datang</h2><br />
                        <h5>di Website Bappeda Provinsi Kalimantan Timur</h5>
                    </div>
                </div>
                <div>
                    {!! setting('profil-kantor.visi_misi') !!}
                </div>
            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-danger" data-dismiss="modal" style="padding: 6px 12px; color: #fff; background-color: #d9534f; border-color: #d43f3a;">Tutup</button> --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('vendor/fslightbox.js') }}"></script>
<script src="{{ asset('') }}vendor/lity-2.4.1/dist/lity.js"></script>
<script src="{{ asset('') }}fullcalendar/main.js"></script>
<script>
    jQuery(document).ready(function($) {

        startcalendar();
        $("#modalLinkRPD").modal();
        // $("#modalGForm").modal();

        // @if ($message = Session::get('sukses'))
        //     $("#modal5detik").modal();
        //     setTimeout(function(){ $('#modal5detik').modal('hide')}, 3000);
        // @endif

        // if({{ $hasilsurvery }} == 0) {
        //     $("#modalSurvei").modal();
        // }

        $(document).on('click', '#agenda-prev', function() {
            var tanggalnya = $(this).data('tanggal');
            agendaprevnext(tanggalnya);
        });

        $(document).on('click', '#agenda-next', function() {
            var tanggalnya = $(this).data('tanggal');
            agendaprevnext(tanggalnya);
        });

        $(document).ready(function() {
            instagram()
            youtubeBappeda()
            // youtubeKaltimBerdaulat()
        })

        function instagram() {
            var facebookToken = '{{ setting('media-social.api_ig') }}';
            $.ajax({
                    url: 'https://graph.facebook.com/v11.0/17841439622453485?fields=followers_count,profile_picture_url,username,media&access_token=' +
                        facebookToken,
                    type: 'GET'
                })
                .done(function(data) {
                    $('#instagram-profile').attr('src', data.profile_picture_url);
                    $('#instagram-name').html('<a href="https://www.instagram.com/' + data.username +
                        '">@' + data.username + '</a>');
                    $('#instagram-followers > span').html(data.followers_count);
                    for (let index = 0; index < 2; index++) {
                        var id = data.media.data[index].id;
                        $.ajax({
                                url: 'https://graph.facebook.com/v11.0/' + id +
                                    '?fields=media_url,caption,like_count,permalink&access_token=' +
                                    facebookToken,
                                type: 'GET'
                            })
                            .done(function(dataa) {
                                var tag = '<div class="col-md-6 col-sm-6 col-lg-6">' +
                                    '<div class="city_blog_fig">' +
                                    '<a href="' + dataa.permalink + '">' +
                                    '<figure class="box" style="height: 200px;">' +
                                    '<img src="' + dataa.media_url +
                                    '" alt="Image" style="height: inherit; object-fit: cover;">' +
                                    '</figure>' +
                                    '</a>' +
                                    '<div class="city_blog_text">' +
                                    '<i class="fa fa-heart"></i> ' + dataa.like_count + '<br />' +
                                    '<p class="text-overflow">' + dataa.caption + '</p>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';
                                $('#instagram-content').append(tag);
                            })
                            .fail(function(fail) {
                                console.log(fail);
                            });
                    }
                })
                .fail(function(fail) {
                    console.log(fail);
                });
        }

        function youtubeBappeda() {
            var youtubeToken = 'AIzaSyAThV4ZiB8_zFNkuqfZVvyswqnjH98QkTI';
            var youtubeChannelId = 'UC5LF3CO4omiNMSrKOJUuXzQ';
            $.ajax({
                    url: 'https://youtube.googleapis.com/youtube/v3/channels?part=statistics&part=snippet&id=' +
                        youtubeChannelId + '&key=' + youtubeToken,
                    type: 'GET'
                })
                .done(function(data) {
                    $('#youtube-profile').attr('src', data.items[0].snippet.thumbnails.default.url);
                    $('#youtube-name').html('<a href="https://www.youtube.com/channel/' + youtubeChannelId +
                        '">' + data.items[0].snippet.title + '</a>');
                    $('#youtube-subscriber > span').html(data.items[0].statistics.subscriberCount);
                    $.ajax({
                            url: 'https://www.googleapis.com/youtube/v3/search?key=' + youtubeToken +
                                '&channelId=' + youtubeChannelId +
                                '&part=snippet,id&order=date&maxResults=4',
                            type: 'GET'
                        })
                        .done(function(dataa) {
                            var element = dataa.items;
                            for (var i = 0; i < 2;) {
                                if (element[i].id.kind == 'youtube#video') {
                                    var tag =
                                        '<div class="col-md-6 col-sm-6 col-lg-6"><div class="city_blog_fig">' +
                                        '<iframe src="https://www.youtube.com/embed/' + element[i].id
                                        .videoId + '?autoplay=0&mute=1"></iframe><br />' +
                                        '<p>' + element[i].snippet.title + '</p>' +
                                        '</div>';
                                    $('#youtube-content').append(tag);
                                    i++;
                                } else {
                                    break;
                                }

                            }
                        })
                        .fail(function(fail) {
                            console.log(fail);
                        });
                })
                .fail(function(fail) {
                    console.log(fail);
                });
        }

        // function youtubeKaltimBerdaulat() {
        //     console.log("kaltim berdaulat")
        //     var youtubeToken = 'AIzaSyBC5H-f5frracfQppN9B2aYWd-qfZJ0Ggw';
        //     var youtubeChannelId = 'UCW0yOAVXuRWSLt6v7V4Ncug';
        //     $.ajax({
        //         url: 'https://youtube.googleapis.com/youtube/v3/channels?part=statistics&part=snippet&id='+youtubeChannelId+'&key='+youtubeToken,
        //         type: 'GET'
        //     })
        //     .done(function (data) {
        //         $('#youtube-profile1').attr('src', data.items[0].snippet.thumbnails.default.url);
        //         $('#youtube-name1').html('<a href="https://www.youtube.com/channel/'+youtubeChannelId+'">'+data.items[0].snippet.title+'</a>');
        //         $('#youtube-subscriber1 > span').html(data.items[0].statistics.subscriberCount);
        //         $.ajax({
        //             url: 'https://www.googleapis.com/youtube/v3/search?key='+youtubeToken+'&channelId='+youtubeChannelId+'&part=snippet,id&order=date&maxResults=4',
        //             type: 'GET'
        //         })
        //         .done(function (dataa) {
        //             var element = dataa.items;
        //             for(var i=0; i<2 ;) {
        //                 if(element[i].id.kind == 'youtube#video') {
        //                     var tag = '<div class="col-lg-6 col-md-6 col-sm-6 m-1" style="margin-bottom: 10px;">'+
        // 		'<iframe src="https://www.youtube.com/embed/'+element[i].id.videoId+'?autoplay=0&mute=1"></iframe><br />'+
        //                         '<p>'+element[i].snippet.title+'</p>'+
        // 		'</div>';
        //                     $('#youtube-content1').append(tag);
        // 	    i++;
        //                 } else {
        // 	    break;
        // 	}

        //             }
        //         })
        //         .fail(function(fail) {
        //             console.log(fail);
        //         });
        //     })
        //     .fail(function(fail) {
        //         console.log(fail);
        //     });
        // }

        function agendaprevnext(tanggalnya) {
            var getUrlHost = window.location.origin
            $.ajax({
                type: "GET",
                url: getUrlHost + '/agendaprevnext/' + tanggalnya,
                success: function(data) {
                    console.log("berhasil agendaprevnext");
                    $("#cobagan").html(data)
                },
                error: function(data) {
                    console.log("gagal agendaprevnext");
                }
            });
        }

        function startcalendar() {
            var getUrlHost = window.location.origin
            $.ajax({
                url: getUrlHost + '/allagenda',
                success: function(result) {
                    var calendarEl = document.getElementById('calendar');
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        events: result,
                        height: 900,
                        buttonText: {
                            today: 'Hari ini',
                            month: 'Bulan',
                            week: 'Minggu',
                            day: 'Hari',
                            list: 'List'
                        },
                        eventStartEditable: false,
                        headerToolbar: {
                            left: 'prev,next',
                            center: 'title',
                            right: ''
                        },
                        locale: 'id',
                        initialView: 'dayGridMonth',
                        navLinks: true,
                        editable: true,
                        dayMaxEvents: true,
                        navLinkDayClick: function(date, jsEvent) {
                            kliktanggal(date, jsEvent);
                        },
                        eventClick: function(calEvent) {
                            klikevent(calEvent)
                        }
                    });
                    calendar.render();
                },
            });
        }

        function kliktanggal(date, jsEvent) {
            var tanggal = date.toISOString();
            var getUrlHost = window.location.origin
            $.ajax({
                type: "GET",
                url: getUrlHost + '/kliktanggal/' + tanggal,
                success: function(data) {
                    $("#cobagan").html(data)
                },
                error: function(data) {
                    console.log("fail");
                }
            });
        }

        function klikevent(calEvent) {
            var idnya = calEvent.event.id;
            var getUrlHost = window.location.origin
            $.ajax({
                type: "GET",
                url: getUrlHost + '/klikevent/' + idnya,
                success: function(data) {
                    $("#modalklikevent").html(data)
                    $("#myModal").modal();
                },
                error: function(data) {
                    console.log("gagal klik event");
                }
            });
        }
    });
</script>
@endsection

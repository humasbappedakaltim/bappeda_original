@extends('layouts.master')
@section('styles')
<link href="{{asset('theme/main/css/selectric.css')}}" rel="stylesheet">
<link href="{{asset('')}}fullcalendar/main.css" rel="stylesheet">
<link href="{{asset('')}}fullcalendar/fullcalendar-edit.css" rel="stylesheet">
@endsection
@section('content')
<div class="sab_banner overlay">
    <div class="container">
        <div class="sab_banner_text">
            <h4 class="text-white">{{$title}}</h4>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Agenda</li>
            </ul>
        </div>
    </div>
</div>
<div class="city_event2_wrap" style="margin-bottom: 90px;">
    <div class="container">
     <div class="row">
          <div class="col-lg-8">
            <div class="city_full_event">
                @error('keyword')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <ul>
                    @foreach ($agendas as $a)
                    <li>
                        <div class="city_full_event_list overlay">
                            <div class="city_event2_calender">
                                <ul>
                                    <li>
                                        <h4>{{ Myhelpers::tglindPer($a->schedule,'hari') }}</h4>
                                        <p>Hari</p>
                                    </li>
                                    <li>
                                        <h4>{{ Myhelpers::tglindPer($a->schedule,'tanggal') }}</h4>
                                        <p>Tanggal</p>
                                    </li>
                                    <li>
                                        <h4>{{ Myhelpers::tglindPer($a->schedule,'bulan') }}</h4>
                                        <p>Bulan</p>
                                    </li>
                                    <li>
                                        <h4>{{ Myhelpers::tglindPer($a->schedule,'tahun') }}</h4>
                                        <p>Tahun</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="city_event2_meeting">
                                <h4 style="line-height: 35px;">{{$a->caption}}</h4>
                                <ul class="city_meta_list">
                                    <li><a href="#"><i class="fa fa-clock-o"></i>{{ $a->times}}</a></li>
                                    <li><a href="#"><i class="fa fa-map-marker"></i>{{$a->location}}</a></li>
                                </ul>
                                <p>@if(!empty($a->description))
                                Dihadiri {{ $a->description }}
                                @endif
                                </p>
                            </div>
                            {{-- <a class="theam_btn btn2" href="#">Lihat Detail</a> --}}
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>   
          </div> 
          <div class="col-md-4">
            <div class="sidebar_widget">
                <div class="event_sidebar">
                    <h4 class="sidebar_heading">Pencarian Agenda</h4>
                    <div class="sidebar_search">
                        <form action="{{route('search_event')}}" method="GET">
                            <input type="text" name="keyword" placeholder="Masukkan keyword..." required>
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="event_sidebar event" style="background-color: transparent!important;">
                    {{-- <h4 class="sidebar_heading">Terkini</h4>
                    <div class="event_categories">
                        <ul>
                            @foreach ($agenda_terkini as $at)
                            <li>
                                <div class="event_categories_list">
                                    <div class="event_categories_date">
                                        <h5>{{ Carbon\Carbon::parse($at->schedule)->format('d') }}</h5>
                                        <p>{{ Carbon\Carbon::parse($at->schedule)->format('M Y') }}</p>
                                    </div>
                                    <div class="event_categories_text">
                                        <p>{{$at->caption}}</p>
                                        <a href="#"><i class="fa fa-map-marker"></i> {{$at->location}}</a>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            
                        </ul>
                    </div> --}}
                    <div class="row">
                        <div id="cobagan">
                            <div class="prevnext_agendabutton">
                                <button class="agenda-prev-button agendabutton" id="agenda-prev" data-tanggal="{{ date('Y-m-d', strtotime(date('Y-m-d') .'-1 day')) }}" type="button">
                                    <span class="fc-icon fc-icon-chevron-left"></span>
                                </button>
                                <button class="agenda-next-button agendabutton" id="agenda-next" data-tanggal="{{ date('Y-m-d', strtotime(date('Y-m-d') .'+1 day')) }}" type="button">
                                    <span class="fc-icon fc-icon-chevron-right"></span>
                                </button>
                            </div>
                            @if(!empty($agendahariini))
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
                                    <li class="list-group-item">Dihadiri : {{ $ahariini->description }}</li>
                                </ul>
                                {{-- <div class="panel-footer text-center">{{ Myhelpers::tglind($ahariini->schedule) }}, Jam : {{ $ahariini->times }}</div> --}}
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
                
                
                {{-- <div class="event_sidebar margin0">
                    <h4 class="sidebar_heading">Arsip Agenda</h4>
                    <div class="categories_list archive">
                        <ul>
                            <li><a href="#">March</a></li>
                            <li><a href="#">Febuary</a></li>
                            <li><a href="#">January</a></li>
                            <li><a href="#">December</a></li>
                            <li><a href="#">November</a></li>
                            <li><a href="#">October</a></li>
                        </ul>
                    </div>
                </div> --}}
            </div>
        </div> 
     </div>   
    </div>
</div>

@endsection
@section('scripts')
<script src="{{asset('theme/main/js/jquery.nice-select.min.js')}}"></script>
<script>
    jQuery(document).ready(function($){
        $(document).on('click', '#agenda-prev', function(){
            var tanggalnya = $(this).data('tanggal');
            agendaprevnext(tanggalnya);
        });

        $(document).on('click', '#agenda-next', function(){
            var tanggalnya = $(this).data('tanggal');
            agendaprevnext(tanggalnya);
        });
	
        function agendaprevnext(tanggalnya){
            var getUrlHost = window.location.origin
            $.ajax({
                type: "GET",
                url: getUrlHost+'/agendaprevnext/'+tanggalnya,
                success: function(data) {
                    console.log("berhasil agendaprevnext");
                    $("#cobagan").html(data)
                },
                error: function(data){
                    console.log("gagal agendaprevnext");
                }
            });
        }
        
        function kliktanggal(date, jsEvent){
            var tanggal = date.toISOString();
            var getUrlHost = window.location.origin
            $.ajax({
                type: "GET",
                url: getUrlHost+'/kliktanggal/'+tanggal,
                success: function(data) {
                    $("#cobagan").html(data)
                },
                error: function(data){
                    console.log("fail");
                }
            });
        }
    });
</script>
@endsection
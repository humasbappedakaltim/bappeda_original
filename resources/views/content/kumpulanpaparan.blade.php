@extends('layouts.master')
@section('content')
<div class="sab_banner overlay">
    <div class="container">
        <div class="sab_banner_text">
            <h4 class="text-white">{{$title}}</h4>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">{{$title}}</li>
            </ul>
        </div>
    </div>
</div>
<div class="city_blog2_wrap " style="padding-top: 20px; padding-bottom:20px; margin-bottom: 90px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    {{-- Bidang P2EPD --}}
                    <div class="panel panel-default" style="margin-top:5px; margin-bottom:5px;">
                        <div class="panel-heading" role="tab" id="headingP2EPD">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseP2EPD" aria-expanded="true" aria-controls="collapseP2EPD">
                                    Bidang Perencanaan, Pengendalian dan Evaluasi Pembangunan Daerah (Bidang P2EPD) <i class="fa fa-angle-down"></i>
                                </a>
                            </h4>
                        </div>
                    </div>
                    {{-- Bidang P2EPD --}}
                    <div id="collapseP2EPD" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingP2EPD"> 
                        @foreach (App\Models\CategoryPaparan::where('bidang','P2EPD')->orderBy('order','asc')->get() as $k=>$c)
                        <div class="panel panel-default" style="padding:10px 20px 0; background-color:transparent;">
                            <div class="panel-heading" role="tab" id="heading{{$c->id}}">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#collapse" href="#collapse{{$c->id}}" aria-expanded="@if($k == 0) true @else false @endif" aria-controls="collapse{{$c->id}}">
                                        {{$c->nama_kategori}} <i class="fa fa-angle-down"></i>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse{{$c->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$c->id}}">
                                <div class="panel-body" style="background-color:#fff;">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="2">No</th>
                                                <th>Judul</th>
                                                {{-- <th>Deskripsi</th> --}}
                                                <th width="20"></th>	
                                            </tr>	
                                        </thead>	
                                        <tbody>
                                            @foreach (App\Models\DataPaparan::where('category_paparans_id',$c->id)->orderBy('order','desc')->get() as $d)
                                            <tr>
                                                <td class="text-center">{{$loop->iteration}}</td>
                                                <td>{{$d->nama_data}}</td>
                                                {{-- <td>{{$d->description}}</td> --}}
                                                <td>  
                                                @if (json_decode($d->file_data) !== null )
                                                    @foreach (json_decode($d->file_data) as $i)
                                                    <a href="{{asset('storage',)}}/{{$i->download_link}}" target="_blank">Download</a>
                                                    @endforeach
                                                @else
                                                <a href="{{asset('storage',)}}/{{$d->file_data}}" target="_blank">Download</a>
                                                @endif	
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    {{-- Bidang PPM --}}
                    <div class="panel panel-default" style="margin-top:5px; margin-bottom:5px;">
                        <div class="panel-heading" role="tab" id="headingPPM">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsePPM" aria-expanded="true" aria-controls="collapsePPM">
                                    Bidang Pemerintahan dan Pembangunan Manusia (Bidang PPM) <i class="fa fa-angle-down"></i>
                                </a>
                            </h4>
                        </div>
                    </div>
                    {{-- Bidang PPM --}}
                    <div id="collapsePPM" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingPPM"> 
                        @foreach (App\Models\CategoryPaparan::where('bidang','PPM')->orderBy('order','asc')->get() as $k=>$c)
                        <div class="panel panel-default" style="padding:10px 10px 0; background-color:transparent;">
                            <div class="panel-heading" role="tab" id="heading{{$c->id}}">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#collapse" href="#collapse{{$c->id}}" aria-expanded="@if($k == 0) true @else false @endif" aria-controls="collapse{{$c->id}}">
                                        {{$c->nama_kategori}} <i class="fa fa-angle-down"></i>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse{{$c->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$c->id}}">
                                <div class="panel-body" style="background-color:#fff;">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="2">No</th>
                                                <th>Judul</th>
                                                {{-- <th>Deskripsi</th> --}}
                                                <th width="20"></th>	
                                            </tr>	
                                        </thead>	
                                        <tbody>
                                            @foreach (App\Models\DataPaparan::where('category_paparans_id',$c->id)->orderBy('order','desc')->get() as $d)
                                            <tr>
                                                <td class="text-center">{{$loop->iteration}}</td>
                                                <td>{{$d->nama_data}}</td>
                                                {{-- <td>{{$d->description}}</td> --}}
                                                <td>  
                                                @if (json_decode($d->file_data) !== null )
                                                    @foreach (json_decode($d->file_data) as $i)
                                                    <a href="{{asset('storage',)}}/{{$i->download_link}}" target="_blank">Download</a>
                                                    @endforeach
                                                @else
                                                <a href="{{asset('storage',)}}/{{$d->file_data}}" target="_blank">Download</a>
                                                @endif	
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    {{-- Bidang Ekonomi --}}
                    <div class="panel panel-default" style="margin-top:5px; margin-bottom:5px;">
                        <div class="panel-heading" role="tab" id="headingEkonomi">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEkonomi" aria-expanded="true" aria-controls="collapseEkonomi">
                                    Bidang Perekonomian dan Sumber Daya Alam (Bidang Ekonomi) <i class="fa fa-angle-down"></i>
                                </a>
                            </h4>
                        </div>
                    </div>
                    {{-- Bidang Ekonomi --}}
                    <div id="collapseEkonomi" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEkonomi"> 
                        @foreach (App\Models\CategoryPaparan::where('bidang','Ekonomi')->orderBy('order','asc')->get() as $k=>$c)
                        <div class="panel panel-default" style="padding:10px 10px 0; background-color:transparent;">
                            <div class="panel-heading" role="tab" id="heading{{$c->id}}">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#collapse" href="#collapse{{$c->id}}" aria-expanded="@if($k == 0) true @else false @endif" aria-controls="collapse{{$c->id}}">
                                        {{$c->nama_kategori}} <i class="fa fa-angle-down"></i>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse{{$c->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$c->id}}">
                                <div class="panel-body" style="background-color:#fff;">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="2">No</th>
                                                <th>Judul</th>
                                                {{-- <th>Deskripsi</th> --}}
                                                <th width="20"></th>	
                                            </tr>	
                                        </thead>	
                                        <tbody>
                                            @foreach (App\Models\DataPaparan::where('category_paparans_id',$c->id)->orderBy('order','desc')->get() as $d)
                                            <tr>
                                                <td class="text-center">{{$loop->iteration}}</td>
                                                <td>{{$d->nama_data}}</td>
                                                {{-- <td>{{$d->description}}</td> --}}
                                                <td>  
                                                @if (json_decode($d->file_data) !== null )
                                                    @foreach (json_decode($d->file_data) as $i)
                                                    <a href="{{asset('storage',)}}/{{$i->download_link}}" target="_blank">Download</a>
                                                    @endforeach
                                                @else
                                                <a href="{{asset('storage',)}}/{{$d->file_data}}" target="_blank">Download</a>
                                                @endif	
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    {{-- Bidang Infraswil --}}
                    <div class="panel panel-default" style="margin-top:5px; margin-bottom:5px;">
                        <div class="panel-heading" role="tab" id="headingInfraswil">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseInfraswil" aria-expanded="true" aria-controls="collapseInfraswil">
                                    Bidang Infrastruktur dan Kewilayahan (Bidang Infraswil) <i class="fa fa-angle-down"></i>
                                </a>
                            </h4>
                        </div>
                    </div>
                    {{-- Bidang Infraswil --}}
                    <div id="collapseInfraswil" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingInfraswil"> 
                        @foreach (App\Models\CategoryPaparan::where('bidang','Infraswil')->orderBy('order','asc')->get() as $k=>$c)
                        <div class="panel panel-default" style="padding:10px 10px 0; background-color:transparent;">
                            <div class="panel-heading" role="tab" id="heading{{$c->id}}">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#collapse" href="#collapse{{$c->id}}" aria-expanded="@if($k == 0) true @else false @endif" aria-controls="collapse{{$c->id}}">
                                        {{$c->nama_kategori}} <i class="fa fa-angle-down"></i>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse{{$c->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$c->id}}">
                                <div class="panel-body" style="background-color:#fff;">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="2">No</th>
                                                <th>Judul</th>
                                                {{-- <th>Deskripsi</th> --}}
                                                <th width="20"></th>	
                                            </tr>	
                                        </thead>	
                                        <tbody>
                                            @foreach (App\Models\DataPaparan::where('category_paparans_id',$c->id)->orderBy('order','desc')->get() as $d)
                                            <tr>
                                                <td class="text-center">{{$loop->iteration}}</td>
                                                <td>{{$d->nama_data}}</td>
                                                {{-- <td>{{$d->description}}</td> --}}
                                                <td>  
                                                @if (json_decode($d->file_data) !== null )
                                                    @foreach (json_decode($d->file_data) as $i)
                                                    <a href="{{asset('storage',)}}/{{$i->download_link}}" target="_blank">Download</a>
                                                    @endforeach
                                                @else
                                                <a href="{{asset('storage',)}}/{{$d->file_data}}" target="_blank">Download</a>
                                                @endif	
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    {{-- Umum --}}
                    <div class="panel panel-default" style="margin-top:5px; margin-bottom:5px;">
                        <div class="panel-heading" role="tab" id="headingUmum">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseUmum" aria-expanded="true" aria-controls="collapseUmum">
                                    Umum <i class="fa fa-angle-down"></i>
                                </a>
                            </h4>
                        </div>
                    </div>
                    {{-- Umum --}}
                    <div id="collapseUmum" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingUmum"> 
                        @foreach (App\Models\CategoryPaparan::where('bidang','Umum')->orderBy('order','asc')->get() as $k=>$c)
                        <div class="panel panel-default" style="padding:10px 10px 0; background-color:transparent;">
                            <div class="panel-heading" role="tab" id="heading{{$c->id}}">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#collapse" href="#collapse{{$c->id}}" aria-expanded="@if($k == 0) true @else false @endif" aria-controls="collapse{{$c->id}}">
                                        {{$c->nama_kategori}} <i class="fa fa-angle-down"></i>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse{{$c->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$c->id}}">
                                <div class="panel-body" style="background-color:#fff;">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="2">No</th>
                                                <th>Judul</th>
                                                {{-- <th>Deskripsi</th> --}}
                                                <th width="20"></th>	
                                            </tr>	
                                        </thead>	
                                        <tbody>
                                            @foreach (App\Models\DataPaparan::where('category_paparans_id',$c->id)->orderBy('order','desc')->get() as $d)
                                            <tr>
                                                <td class="text-center">{{$loop->iteration}}</td>
                                                <td>{{$d->nama_data}}</td>
                                                {{-- <td>{{$d->description}}</td> --}}
                                                <td>  
                                                @if (json_decode($d->file_data) !== null )
                                                    @foreach (json_decode($d->file_data) as $i)
                                                    <a href="{{asset('storage',)}}/{{$i->download_link}}" target="_blank">Download</a>
                                                    @endforeach
                                                @else
                                                <a href="{{asset('storage',)}}/{{$d->file_data}}" target="_blank">Download</a>
                                                @endif	
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
@endsection
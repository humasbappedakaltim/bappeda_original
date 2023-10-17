@extends('layouts.masterppid')
@section('content')
<div class="sab_banner overlay">
    <div class="container">
        <div class="sab_banner_text">
            <h4 class="text-white">{{$title}}</h4>
            <ul class="breadcrumb">
                {{-- <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li> --}}
                <li class="breadcrumb-item active">{{$title}}</li>
            </ul>
        </div>
    </div>
</div>
<div class="city_blog2_wrap " style="padding-top: 20px; padding-bottom:20px; margin-bottom:90px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    {{-- Data Document --}}
                    @foreach ($groupDocument as $key => $item)
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingDocuments{{$loop->iteration}}">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#documents{{$loop->iteration}}" aria-expanded="@if($loop->iteration == 1) true @else false @endif" aria-controls="documents{{$loop->iteration}}">
                                    {{$key}} <i class="fa fa-angle-down"></i>
                                </a>
                            </h4>
                        </div>
                        <div id="documents{{$loop->iteration}}" class="panel-collapse collapse @if($loop->iteration == 1) in @endif" role="tabpanel" aria-labelledby="headingDocuments{{$loop->iteration}}">
                            <div class="panel-body">
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
                                        @foreach ($item as $k => $i)
                                            @foreach ($i as $data)
                                        <tr>
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            <td>{{$data->title}}</td>
                                            <td>  
                                            @if (json_decode($data->file_documents) !== null )
                                                @foreach (json_decode($data->file_documents) as $link_down)
                                                <a href="{{asset('storage',)}}/{{$link_down->download_link}}" target="_blank">Download</a>
                                                @endforeach
                                            @else
                                            <a href="{{asset('storage',)}}/{{$data->file_documents}}" target="_blank">Download</a>
                                            @endif	
                                            </td>
                                        </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>	  	
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- Data Pengendalian dan Evaluasi --}}
                    @foreach ($groupPengendalian as $key => $item)
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingPengendalian{{$loop->iteration}}">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#pengendalians{{$loop->iteration}}" aria-expanded="@if($loop->iteration == 1) true @else false @endif" aria-controls="pengendalians{{$loop->iteration}}">
                                    {{$key}} <i class="fa fa-angle-down"></i>
                                </a>
                            </h4>
                        </div>
                        <div id="pengendalians{{$loop->iteration}}" class="panel-collapse collapse @if($loop->iteration == 1) in @endif" role="tabpanel" aria-labelledby="headingPengendalian{{$loop->iteration}}">
                            <div class="panel-body">
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
                                        @foreach ($item as $k => $i)
                                            @foreach ($i as $data)
                                        <tr>
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            <td>{{$data->nama_data}}</td>
                                            {{-- <td>{{$d->description}}</td> --}}
                                            <td>  
                                            @if (json_decode($data->file_data) !== null )
                                                @foreach (json_decode($data->file_data) as $link_down)
                                                <a href="{{asset('storage',)}}/{{$link_down->download_link}}" target="_blank">Download</a>
                                                @endforeach
                                            @else
                                            <a href="{{asset('storage',)}}/{{$data->file_data}}" target="_blank">Download</a>
                                            @endif	
                                            </td>
                                        </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>	  	
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- Data Paparan --}}
                    @foreach ($groupPaparan as $key => $item)
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingPaparans{{$loop->iteration}}">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#paparans{{$loop->iteration}}" aria-expanded="@if($loop->iteration == 1) true @else false @endif" aria-controls="paparans{{$loop->iteration}}">
                                    {{$key}} <i class="fa fa-angle-down"></i>
                                </a>
                            </h4>
                        </div>
                        <div id="paparans{{$loop->iteration}}" class="panel-collapse collapse @if($loop->iteration == 1) in @endif" role="tabpanel" aria-labelledby="headingPaparans{{$loop->iteration}}">
                            <div class="panel-body">
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
                                        @foreach ($item as $k => $i)
                                            @foreach ($i as $data)
                                        <tr>
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            <td>{{$data->nama_data}}</td>
                                            {{-- <td>{{$d->description}}</td> --}}
                                            <td>  
                                            @if (json_decode($data->file_data) !== null )
                                                @foreach (json_decode($data->file_data) as $link_down)
                                                <a href="{{asset('storage',)}}/{{$link_down->download_link}}" target="_blank">Download</a>
                                                @endforeach
                                            @else
                                            <a href="{{asset('storage',)}}/{{$data->file_data}}" target="_blank">Download</a>
                                            @endif	
                                            </td>
                                        </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>	  	
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- Data Center --}}
                    @foreach ($groupCenter as $key => $item)
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingCenters{{$loop->iteration}}">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#centers{{$loop->iteration}}" aria-expanded="@if($loop->iteration == 1) true @else false @endif" aria-controls="centers{{$loop->iteration}}">
                                    {{$key}} <i class="fa fa-angle-down"></i>
                                </a>
                            </h4>
                        </div>
                        <div id="centers{{$loop->iteration}}" class="panel-collapse collapse @if($loop->iteration == 1) in @endif" role="tabpanel" aria-labelledby="headingCenters{{$loop->iteration}}">
                            <div class="panel-body">
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
                                        @foreach ($item as $k => $i)
                                            @foreach ($i as $data)
                                        <tr>
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            <td>{{$data->nama_data}}</td>
                                            {{-- <td>{{$d->description}}</td> --}}
                                            <td>  
                                            @if (json_decode($data->file_data) !== null )
                                                @foreach (json_decode($data->file_data) as $link_down)
                                                <a href="{{asset('storage',)}}/{{$link_down->download_link}}" target="_blank">Download</a>
                                                @endforeach
                                            @else
                                            <a href="{{asset('storage',)}}/{{$data->file_data}}" target="_blank">Download</a>
                                            @endif	
                                            </td>
                                        </tr>
                                            @endforeach
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
@endsection
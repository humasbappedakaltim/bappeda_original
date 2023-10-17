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
                    @foreach (App\Models\CategoryPengendalianevaluasi::orderBy('order','desc')->get() as $k=>$c)
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading{{$c->id}}">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$c->id}}" aria-expanded="@if($k == 0) true @else false @endif" aria-controls="collapse{{$c->id}}">
                                    {{$c->nama_kategori}} <i class="fa fa-angle-down"></i>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse{{$c->id}}" class="panel-collapse collapse @if($k == 0) in @endif" role="tabpanel" aria-labelledby="heading{{$c->id}}">
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
                                        @foreach (App\Models\DataPengendalianevaluasi::orderBy('order','desc')->where('category_pengendalianevaluasis_id',$c->id)->get() as $d)
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
@endsection
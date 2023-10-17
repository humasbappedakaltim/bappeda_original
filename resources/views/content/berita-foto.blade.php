@extends('layouts.master')
@section('styles')
@endsection
@section('content')
<div class="sab_banner overlay">
    <div class="container">
        <div class="sab_banner_text">
            <h4 class="text-white">{{$title}}</h4>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('post_foto.index')}}">{{$title}}</a></li>
              
            </ul>
        </div>
    </div>
</div>

<div class="city_news2_wrap">
    <div class="container" style="margin-bottom: 40px;">
        @php
        $no = 1;	
        @endphp
            @foreach ($foto as $f)
            @if ($no == 1 OR $no == 5)
            <div class="row">	
            @endif
            <div class="col-md-4 col-sm-6 col-lg-3" style="margin-bottom:30px;">
            <a href="{{route('post_foto.detail',$f->slug)}}" title="{{$f->title}}">
                    <img src="{{asset('storage/'.$f->foto)}}" style="height: 150px; width:100%" alt="{{$f->title}}" class="img-thumbnail"><br /><br />
                    <p> <i class="fa fa-calendar"></i> {{ Carbon\Carbon::parse($f->published_at)->format('d F Y') }}</p>
                    {{-- <strong>{{$f->title}}</strong> --}}
		 <p class="text-center">{{$f->title}}</p>
                    <hr>
                    </a>
            </div>
            @php
			$no++;	
			@endphp	
			@if ($no == 1 OR $no == 5)
			</div>	
			@endif
            @endforeach
        <div class="pagination">
            {{ $foto->onEachSide(2)->links('vendor.pagination.simple') }}
        </div>
    </div>
</div>

@include('content.post-bottom')

@endsection
@section('scripts')

@endsection
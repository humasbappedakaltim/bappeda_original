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
<div class="city_blog2_wrap " style="padding-top: 20px; padding-bottom:20px; background:white; margin-bottom:90px;">
	<div class="container" >
		<div class="row">
			@php
			$no = 1;
			@endphp
			@foreach ($penghargaan as $p)
			@if ($no == 1 OR $no == 5 OR $no == 9)
			<div class="row">	
			@endif
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 text-center ">
				<a href="{{asset('storage/'.$p->foto)}}" data-fslightbox><img src="{{asset('storage')}}/{{$p->foto}}" class="img-thumbnail" style="height: 200px;" alt="{{$p->title}}"></a>
			<p>{{$p->title}} </p>
			</div>
			@if ($no == 4 OR $no == 8 OR $no == 12)
			</div>	<hr>
			@endif
			@php
			$no++;	
			@endphp
			@endforeach
		</div>					
	</div>
</div>

@endsection
@section('scripts')
<script src="{{asset('vendor/fslightbox.js')}}"></script>  
@endsection
@extends('layouts.master')
@section('styles')
<link href="{{asset('')}}vendor/lity-2.4.1/dist/lity.css" rel="stylesheet">    
@endsection
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
			<div class="city_health_department" style="padding-top: 20px;">
			<div class="container">
				<div class="city_health2_text text2" style="margin-top: 20px;">
						@php
						$no = 1;	
						@endphp
						@foreach ($videos as $v)
						@if ($no == 1 OR $no == 5 OR $no == 9)
						<div class="row">	
						@endif
						<div class="col-md-4 col-sm-6 col-lg-3" style="margin-bottom: 20px;">
							<div class="city_senior_team margin0" >
								<a style="font-size: 11px;" href="https://youtube.com/watch?v={{$v->youtube_key}}" data-lity>
								<figure class="box">
									<div class="box-layer layer-1"></div>
									<div class="box-layer layer-2"></div>
									<div class="box-layer layer-3"></div>
									<img src="https://img.youtube.com/vi/{{$v->youtube_key}}/0.jpg" alt="Cover {{$v->title}}">
								</figure>
								</a>
								<div class="city_senior_team_text">
									<a style="font-size: 11px;" href="https://youtube.com/watch?v={{$v->youtube_key}}" data-lity>{{$v->title}}</a>
								</div>
							</div>
						</div>
						@php
						$no++;	
						@endphp	
						@if ($no == 1 OR $no == 5 OR $no == 9)
						</div>	
						@endif
						@endforeach		
						<div class="pagination">
							{{ $videos->onEachSide(2)->links('vendor.pagination.simple') }}
						</div>
				</div>
			</div>
			</div>
@include('content.post-bottom')
@endsection
@section('scripts')
<script src="{{asset('')}}vendor/lity-2.4.1/dist/lity.js"></script> 	
@endsection
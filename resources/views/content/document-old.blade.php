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
			<div class="city_health_department" style="padding-top: 20px;">
			<div class="container">
				<div class="city_health2_text text2" style="margin-top: 20px;">
						@php
						$no = 1;	
						@endphp
						@foreach ($document as $dc)
						@if ($no == 1 OR $no == 7)
						<div class="row">	
						@endif
						<div class="col-md-4 col-sm-6 col-lg-2" style="margin-bottom: 20px;">
							<div class="city_senior_team margin0" >
								<figure class="box">
									<div class="box-layer layer-1"></div>
									<div class="box-layer layer-2"></div>
									<div class="box-layer layer-3"></div>
									<img src="{{asset('storage/'.$dc->cover)}}" alt="Cover {{$dc->title}}">
								</figure>
								<div class="city_senior_team_text">
									<a style="font-size: 11px;" href="{{route('document.detail',$dc->slug)}}">{{$dc->title}}</a>
								</div>
							</div>
						</div>
						@php
						$no++;	
						@endphp	
						@if ($no == 1 OR $no == 7)
						</div>	
						@endif
						@endforeach		
						<div class="pagination">
							{{ $document->onEachSide(2)->links('vendor.pagination.simple') }}
						</div>
				</div>
			</div>
				
			</div>
            @include('content.post-bottom')
@endsection
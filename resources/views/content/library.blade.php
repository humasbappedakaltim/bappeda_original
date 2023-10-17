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
			<div class="city_blog2_wrap " style="padding-top: 20px; padding-bottom:20px;">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<select name="" id="" class="form-control">
								<option value=""> --- Pilih Kategori ---</option>
								@foreach (App\CategoryLibrary::all() as $c)
									<option value="{{$c->id}}">{{$c->name}}</option>
								@endforeach
							</select>
						</div>
						<div class="col-lg-12">
							<table class="table table-bordered" style="background: white">
								<thead>
								<tr>
								<th>Judul</th>
								<th>Deskripsi</th>
								<th width="20"></th>	
								</tr>	
								</thead>	
								<tbody>
								@if ($library->count() >= 1)
								@foreach ($library as $l)
								<tr>
								<td>{{$l->title}}</td>
								<td>{{$l->description}}</td>
								<td> <a href="">Download</a> </td>
								</tr>
								@endforeach
								@else
									<tr>
										<td colspan="2" class="text-center"> Tidak ada data tersedia!</td>
									</tr>
								@endif	
								</tbody>
								<p>
									{{$library->links()}}
								</p>
							   </table>	 
						</div>
					</div>					
				</div>
			</div>
			
			@include('content.post-bottom')
@endsection
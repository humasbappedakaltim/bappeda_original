@extends('layouts.masterppid')
@section('styles')
@endsection
@section('content')
<div class="sab_banner overlay">
    <div class="container">
        <div class="sab_banner_text">
            <h4 class="text-white">{{$title}}</h4>
            <ul class="breadcrumb">
              {{-- <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li> --}}
              {{-- <li class="breadcrumb-item active">Dasar Hukum</li> --}}
            </ul>
        </div>
    </div>
</div>
<!-- SAB BANNER END-->
<div class="city_blog2_wrap pb-50" style="margin-bottom: 90px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach (App\Models\Egov::orderBy('order','asc')->get() as $e)
                <div class="@if($e->title == 'SP4N LAPOR') col-lg-3 col-md-6 col-md-offset-4 col-sm-6 @else col-lg-3 col-md-6 col-sm-6 @endif">
                    <a href="{{$e->links}}" target="_blank">
                        <div class="panel panel-default">
                            <div class="panel-body text-center">
                            <img src="{{asset('storage/'.$e->feature_image)}}" alt="{{$e->title}}" style="object-fit: unset;height:100px;">
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script src="{{asset('vendor/fslightbox.js')}}"></script>
@endsection
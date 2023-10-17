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
					@foreach (App\Models\DataCategory::orderBy('orders','asc')->where('type','document_planning')->where('id','25')->get() as $k=>$c)
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="heading{{$c->id}}">
							<h4 class="panel-title">
							<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$c->id}}" aria-expanded="@if($k == 0) true @else false @endif" aria-controls="collapse{{$c->id}}">
								{{$c->name}} <i class="fa fa-angle-down"></i>
							</a>
							</h4>
						</div>
						<div id="collapse{{$c->id}}" class="panel-collapse collapse @if($k == 0) in @endif" role="tabpanel" aria-labelledby="heading{{$c->id}}">
							<div class="panel-body">
								<!-- <div class="table-responsive"> -->
									<table class="table table-bordered">
										<thead>
											<tr>
												<th width="2">No</th>
												<th>Cover</th>
												<th>Judul</th>
												<th width="20"></th>	
											</tr>	
										</thead>	
										<tbody>
											@foreach (App\Models\DataDocument::where('category_id',$c->id)->orderBy('order','desc')->get() as $d)
											<tr>
												<td class="text-center">{{$loop->iteration}}</td>
												<td>
												@if (json_decode($d->file_documents) !== null )
														@foreach (json_decode($d->file_documents) as $i)
														<a href="{{asset('storage',)}}/{{$i->download_link}}" target="_blank">
															<img src="{{asset('storage/'.$d->cover)}}" alt="Image" style="width: 268px" class="img-rounded">
														</a>
														@endforeach
													@else
													<a href="{{asset('storage',)}}/{{$d->file_documents}}" target="_blank">
														<img src="{{asset('storage/'.$d->cover)}}" alt="Image" style="width: 268px" class="img-rounded">
													</a>
													@endif
													
												</td>
												<td style="font-size:20px;">{{$d->title}}</td>
												<td>  
													@if (json_decode($d->file_documents) !== null )
														@foreach (json_decode($d->file_documents) as $i)
														<a href="{{asset('storage',)}}/{{$i->download_link}}" target="_blank">Download</a>
														@endforeach
													@else
													<a href="{{asset('storage',)}}/{{$d->file_documents}}" target="_blank">Download</a>
													@endif
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								<!-- </div> -->
							</div>
						</div>
						</div>	
					@endforeach
				</div>	
                <div id="disqus_thread"></div>
			</div>
		</div>					
	</div>
</div>
@endsection
@section('scripts')
<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://http-bappeda-kaltimprov-go-id.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
@endsection
<div class="col-md-4">
    <div class="sidebar_widget">
        <div class="event_sidebar">
            <h4 class="sidebar_heading">Pencarian Berita</h4>
            <div class="sidebar_search">
                <form action="{{route('search_post')}}" method="GET">
                    <input type="text" name="keyword" placeholder="Masukkan keyword..." required>
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
        <div class="event_sidebar">
            <h4 class="sidebar_heading">Informasi Lain</h4>
            <div class="categories_list">
                <ul>
                    @foreach (App\Models\CategoryPost::all() as $cp)
                    @php
                    $post_count = App\Models\Post::where('category_id',$cp->id)->get();    
                    @endphp
                    <li><a href="{{route('post.category',$cp->slug)}}">{{$cp->name}}<span>({{$post_count->count()}})</span></a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="event_sidebar">
            <h4 class="sidebar_heading">Postingan Lain</h4>
            <div class="event_categories">
                <ul>
                    @foreach (App\Models\Post::orderBy('id','desc')->take(5)->get() as $lp)
                    <li>
                        <div class="event_categories_list">
                            @if ($lp->image !== null)
                            <figure class="box">
                                <div class="box-layer layer-1"></div>
                                <div class="box-layer layer-2"></div>
                                <div class="box-layer layer-3"></div>
                                <img src="{{asset('storage/'.$lp->image)}}" alt="Image" style="width:115px">
                            </figure>
                            @endif
                            <div class="event_categories_text">
                            <a href="{{route('post.detail',$lp->slug)}}"><h6>{{$lp->title}}</h6></a>
                                <ul class="blog_author_date">
                                    <li><a href="#">{{ Myhelpers::tglind($lp->published_at) }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="event_sidebar">
        <h4 class="sidebar_heading">Arsip Berita </h4>
            <div class="categories_list archive">
                <ul>
                   @foreach (App\Models\Bulan::orderBy('id','asc')->take(date('m'))->get() as $b)
                    <li><a href="{{route('post.filterMonth',['month'=>$b->id,'year'=>date('Y')])}}">{{$b->bulan}} {{date('Y')}}</a></li>
                   @endforeach
                </ul>
            </div>
        </div>      
    </div>	
</div>
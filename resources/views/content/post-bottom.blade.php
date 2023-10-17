<div class="city_requset_wrap requst02">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="city_request_list">
                    <div class="city_request_row">
                        <span><i class="fa icon-news"></i></span>
                        <div class="city_request_text">
                            <span>Sebelumnya</span>
                            <h4>Populer Postingan</h4>
                        </div>
                    </div>
                    <div class="city_request_link">
                        <ul>
                            @foreach (App\Models\Post::orderBy('read','desc')->take(4)->get() as $pi)
                            <li style="width: 100%"><a href="{{route('post.detail',$pi->slug)}}">{{$pi->title}} ( {{number_format($pi->read)}} views)</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="city_request_list">
                    <div class="city_request_row">
                        <span><i class="fa icon-shout"></i></span>
                        <div class="city_request_text">
                            <span>Informasi</span>
                            <h4>Berita & Publikasi</h4>
                        </div>
                    </div>
                    <div class="city_request_link">
                        <ul>
                            <li><a href="/postingan">Berita</a></li>
                            <li><a href="/agenda">Agenda</a></li>
                            <li><a href="/berita-foto">Berita Foto</a></li>
                            <li><a href="/dokumen">Dokumen Perencanaan</a></li>
                            <li><a href="/library">Library</a></li>
                            <li><a href="/peta/kategori/rtrw">Peta RTRW</a></li>
                            <li class="margin0"><a href="/video">Video</a></li>
                            <li class="margin0"><a href="/data-center">Data Center</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>	
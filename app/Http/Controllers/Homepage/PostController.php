<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\CategoryPost;
use App\Models\Bulan;
use App\Models\AlbumFoto;
use App\Models\PostsFoto;
use DB;
use App\Models\Visitors;

class PostController extends Controller
{


    public function index(){
        $data['title'] = "Berita";
	    $visitors = new Visitors();
    	$data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
        $data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=', date('Y'))->count();
        $posts = Post::orderBy('published_at','desc')->orderBy('title','asc')->where('category_id',2)->where('status','1')->paginate(5);
        $data['posts'] = $posts;
        if($posts){
            return view('content.post',$data);
        }
        else{
            return view('error-404'); 
        }
    }

    public function detailPost(Request $request, $slug){
	$visitors = new Visitors();
        $data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
        $data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=', date('Y'))->count();
	    $row = Post::where('slug',$slug);

        if($request->session()->has('konten')) {
            $exist = false;
            $array = $request->session()->get('konten');

            foreach ($array as $no => $val) {
                if($val == $slug) {
                    $exist = true;
                }
            };
            if(!$exist) {
                array_push($array, $slug);
                $request->session()->put('konten', $array);
		        $read = (is_null($row->first()->read) || $row->first()->read == '') ? 0 : $row->first()->read;
                $row->update(['read' => $read+1]);
            }
        } else {
            $array = [$slug];
            $request->session()->put('konten', $array);
	    $read = (is_null($row->first()->read) || $row->first()->read == '') ? 0 : $row->first()->read;
            $row->update(['read' => $read+1]);
        }

        $post = $row->first();
        $data['title'] = $post->title;
        $next_post_news = Post::where('id',$post->id + 1)->first();
        $prev_post_news = Post::where('id',$post->id - 1)->first();   
        if($post){
            return view('content.post-detail',$data)->with(compact('post','next_post_news','prev_post_news'));
        }
        else{
            return view('error-404'); 
        }
        
    }

    public function beritaFoto(){
        $data['title'] = 'Berita Foto';
	    $visitors = new Visitors();
    	$data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
    	$data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->count();
        $foto = AlbumFoto::orderBy('id','desc')->paginate(12);
        $data['foto'] = $foto;
        if($foto){
            return view('content.berita-foto',$data);
        }
        else{
            return view('error-404'); 
        }
        
    }

    public function searchPost(Request $request){
        $this->validate($request, [
            'keyword' => 'required|regex:/^[a-zA-Z]+$/u|max:50',
        ]);
        $data['title'] = 'Pencarian berita';
	    $visitors = new Visitors();
    	$data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
    	$data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->count();
        if ($request->has('keyword')) {
            $post = Post::orderBy('published_at','desc')->orderBy('title','asc')->where("title",'like','%'.$request->keyword.'%')->where('category_id',2)->get();
            $data['posts'] = $post;
            if($post){
                return view('content.search_post',$data);
            }
            else{
                return view('error-404'); 
            }
        }
        else{
            return view('error-404'); 
        }
        
        
    }

    public function detailBeritaFoto($slug){
	$visitors = new Visitors();
    	$data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
    	$data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->count();
        $album_foto = AlbumFoto::where('slug',$slug)->first();  
        $data['title'] = $album_foto->title;
        $post = PostsFoto::orderBy('id','desc')->where('album_id',$album_foto->id)->get();
        $other_foto  = AlbumFoto::where('id','!=',$album_foto->id)->take(4)->get(); 
        if($post){
            return view('content.post_foto-detail',$data)->with(compact('album_foto','post','other_foto'));
        }
        else{
            return view('error-404'); 
        }
        
    }

    public function detailCategory($slug){
	$visitors = new Visitors();
    	$data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
    	$data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->count();
        $category = CategoryPost::where('slug',$slug)->first();
        if($category){
            $posts = Post::orderBy('published_at','desc')->orderBy('title','asc')->where('category_id',$category->id)->paginate(5);
            return view('content.post-category', $data)->with(compact('posts','category'));
        }
        else{
            return view('error-404'); 
        }
    }

    public function filterByMonth($month,$year){
	$visitors = new Visitors();
    	$data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
    	$data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->count();
        $bulan = Bulan::findOrFail($month); 
        $tahun = $year;
        $posts = Post::whereMonth('created_at',$month)->whereYear('created_at',$year)->get();
        if($posts){
            return view('content.post-filter-month', $data)->with(compact('posts','bulan','tahun'));
        }
        else{
            return view('error-404'); 
        }
        
    }
}

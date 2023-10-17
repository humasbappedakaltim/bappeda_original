<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Visitors;

class VideoController extends Controller
{
    public function index(){
        $data['title'] = "Video";
	    $visitors = new Visitors();
        $data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
        $data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=', date('Y'))->count();
        $video = Video::orderBy('id','desc')->paginate(12);
        $data['videos'] = $video;
        if($video){
            return view('content.video',$data);
        }
        else{
            return view('error-404'); 
        }
    }
}

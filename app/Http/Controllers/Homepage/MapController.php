<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Map;
use DB;
use App\Models\Visitors;

class MapController extends Controller
{
    public function index(){
        $data['title'] = "Peta";
	    $visitors = new Visitors();
        $data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
        $data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=', date('Y'))->count();
        $maps = Map::orderBy('id','desc')->paginate(10);
        $data['maps'] = $maps;
        if($maps){
            return view('content.map',$data);
        }
        else{
            return view('error-404'); 
        }
    }

    public function detail($slug){
        $map = Map::where('slug',$slug)->first();
        $other_maps = Map::where('id','!=',$map->id)->take(8)->get();
        DB::table('maps')->increment('views');
        $data['title'] = $map->title;  
	$visitors = new Visitors();
    	$data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
    	$data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->count();
        if($map){
            return view('content.map-detail',$data)->with(compact('map','other_maps'));
        }
        else{
            return view('error-404'); 
        }
        
    }
}

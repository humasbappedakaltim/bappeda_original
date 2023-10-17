<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Visitors;

class PageController extends Controller
{
    public function detailPage($slug){
        $page = Page::where('slug',$slug)->first();
        $title = $page->title;
	    $visitors = new Visitors();
    	$data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
        $data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=', date('Y'))->count();
        if($page){
            return view('content.page-detail', $data)->with(compact('page','title'));
        }
        else{
            return view('error-404'); 
        }
        
    }

    public function detailPagePpid($slug){
        $page = Page::where('slug',$slug)->first();
        $title = $page->title;
	    $visitors = new Visitors();
    	$data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
    	$data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->count();
        if($page){
            return view('content.pageppid-detail', $data)->with(compact('page','title'));
        }
        else{
            return view('error-404'); 
        }
        
    }
    
}

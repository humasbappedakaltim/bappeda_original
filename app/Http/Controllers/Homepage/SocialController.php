<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Visitors;

class SocialController extends Controller
{
    public function index(Request $request)
    {
	$visitors = new Visitors();
        $data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
        $data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=', date('Y'))->count();
        $data['videos'] = Video::orderBy('id','desc')->where('status','1')->take(2)->get();

        return view('content.social', $data);
    }
}

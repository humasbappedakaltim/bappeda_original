<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Library;
use App\Models\Visitors;

class LibraryController extends Controller
{
    public function index(){
        $data['title'] = 'Library';
	$visitors = new Visitors();
        $data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
        $data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=', date('Y'))->count();
        $data['library'] = Library::orderBy('id','desc')->paginate(12);
        return view('content.library',$data);
    }
}

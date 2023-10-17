<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Penghargaan;
use App\Models\Visitors;

class PenghargaanController extends Controller
{
    public function index(){
        $data['title'] = "Penghargaan";
	$visitors = new Visitors();
        $data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
        $data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=', date('Y'))->count();
        $penghargaan = Penghargaan::orderBy('id','desc')->get();
        $data['penghargaan'] = $penghargaan;
        return view('content.penghargaan',$data);
    }
}

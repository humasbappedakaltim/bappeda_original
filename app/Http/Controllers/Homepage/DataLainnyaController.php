<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataCenter;
use App\Models\Visitors;

class DataLainnyaController extends Controller
{
    public function index(){
	$visitors = new Visitors();
        $data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
        $data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=', date('Y'))->count();
        $data['title'] = 'Data Lainnya';
        $data['datacenter'] = DataCenter::orderBy('orders','desc');
        return view('content.datalainnya',$data);
    }
}

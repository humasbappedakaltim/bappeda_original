<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataPengendalianevaluasi;
use App\Models\Visitors;

class DataPengendalianEvaluasiController extends Controller
{
    public function index(){
	$visitors = new Visitors();
    $data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
    $data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=', date('Y'))->count();
        $data['title'] = 'Data Pengendalian dan Evaluasi';
        $data['datapengendalian'] = DataPengendalianevaluasi::orderBy('id','desc');
        return view('content.datapengendalian',$data);
    }
}

<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pejabat;
use App\Models\Visitors;

class PegawaiBappedaController extends Controller
{
    public function pejabat(){
        $data['title'] = 'Pejabat ASN BAPPEDA Provinsi Kalimantan Timur';
	$visitors = new Visitors();
    $data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
    $data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=', date('Y'))->count();
        $data['pejabat'] = Pejabat::orderBy('id','asc')->take(21)->get();
        return view('content.pejabatasnbappeda',$data);
    }

    public function pegawaiasn(){
        $data['title'] = 'ASN BAPPEDA Provinsi Kalimantan Timur';
	$visitors = new Visitors();
    $data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
    $data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=', date('Y'))->count();
	$data['pejabat'] = Pejabat::orderBy('id','asc')->take(21)->get();
        $data['pegawaiasn'] = Pejabat::where('status_pns', '=', NULL)->orderBy('golongan','desc')->get();
        return view('content.asnbappeda',$data);
    }
}



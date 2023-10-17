<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataDocument;
use App\Models\Visitors;

class RuangPublikController extends Controller
{
    public function index(){
	$visitors = new Visitors();
        $data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
        $data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=', date('Y'))->count();
        $data['title'] = 'Ruang Publik';
        $data['document'] = DataDocument::orderBy('id','desc');
        return view('content.ruangpublik',$data);
    }

}

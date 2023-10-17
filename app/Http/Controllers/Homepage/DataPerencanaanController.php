<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataDocument;
use App\Models\Visitors;

class DataPerencanaanController extends Controller
{
    public function index(){
	$visitors = new Visitors();
        $data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
        $data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=', date('Y'))->count();
        $data['title'] = 'Data Perencanaan';
        $data['document'] = DataDocument::orderBy('id','desc');
        return view('content.dataperencanaan',$data);
    }

    public function detailDocument($slug){
	$visitors = new Visitors();
        $data['visitors']['yearly'] = $visitors->whereYear('created_at', '=', date('Y'))->count();
        $data['visitors']['monthly'] = $visitors->whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=', date('Y'))->count();
        $document = DataDocument::where('slug',$slug)->first();
        if($document){
            $other_document = DataDocument::where('id','!=',$document->id)->take(6)->get();
            return view('content.document-detail', $data)->with(compact('document','other_document'));
        }
        else{
            return view('error-404'); 
        }
    }
}

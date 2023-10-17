<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriSubBidang;

class HomeController extends Controller
{
    public function index(){
        return view('content.home');
    }

    public function ajaxoptionsubbidang($id_bidang)
    {
        $id_subbidang  = KategoriSubBidang::where('kategori_bidang_id',$id_bidang)->get();

        foreach ($id_subbidang as $key => $value) {
            $html[] = '<option value="'.$value->id.'">'.$value->nama_sub_bidang.'</option>';
        }
        return $html;
    }
}

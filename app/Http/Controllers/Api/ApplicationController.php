<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Api\BaseController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;


class ApplicationController extends BaseController
{
    public function index() {
        $egov = DB::table('egovs')->orderBy('order', 'DESC')->get()->transform(fn($i) => [
            'id' => $i->id,
            'title' => $i->title,
            'thumbnail' => url('').'/storage/'.$i->feature_image,
            'links' =>$i->links,
        ]);
        return $this->sendResponse( $egov );
    }
}

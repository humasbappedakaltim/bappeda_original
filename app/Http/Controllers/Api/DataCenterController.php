<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Api\BaseController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

use Carbon\Carbon;
use App\Models\DataCategory;
use App\Models\DataDocument;
use App\Models\CategoryPengendalianevaluasi;
use App\Models\CategoryPaparan;
use App\Models\CategoryDataCenter;

class DataCenterController extends BaseController
{
    public function perencanaan() {

        $data = DataCategory::with('document')->orderBy('id','asc')->where('type','document_planning')->get();
        return $this->sendResponse($data);
    }

    public function pengendalian() {

        $data = CategoryPengendalianevaluasi::with('document')->orderBy('order','asc')->get();
        return $this->sendResponse($data);
    }

    public function paparan() {

        $data = CategoryPaparan::with('document')->where('bidang','P2EPD')->orderBy('order','asc')->get();
        return $this->sendResponse($data);
    }

    public function lainnya() {

        $data = CategoryDataCenter::with('document')->orderBy('order','asc')->get();
        return $this->sendResponse($data);
    }

}

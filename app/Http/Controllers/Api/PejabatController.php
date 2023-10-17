<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Api\BaseController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Pejabat;
class PejabatController extends BaseController
{
    public function index(){

        return $this->sendResponse(Pejabat::paginate(Request::get('limit', 10)));
    }

}

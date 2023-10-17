<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Api\BaseController;
use Illuminate\Support\Facades\Request;

use Carbon\Carbon;

use App\Models\Agenda;

class AgendaController extends BaseController
{
    public function index() {
        $response = Agenda::latest()->paginate(Request::get('limit', 3))->transform(fn($i) => [
            'schedule' => $i->schedule,
            'caption' => $i->caption,
            'description' => $i->description,
            'location' => $i->location,
            'times' => $i->times,
        ]);
        return $this->sendResponse($response);
    }
}

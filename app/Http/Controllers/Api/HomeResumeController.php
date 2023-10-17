<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Api\BaseController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Slider;
class HomeResumeController extends BaseController
{
    public function index() {

        $slider = Slider::where('active', 1)->get()->transform(fn($i) => [
            'photo' => url('').'/storage/'.$i->file_sliders,
            'titel' => $i->title
        ]);
        
        $post = Post::where('status', 1)->latest()->paginate(3)->transform(fn($i) => [
            'id' => $i->id,
            'thumbnail' => url('').'/storage/'.$i->image,
            'title' => $i->title,
            'content' => Str::limit($i->content, 200, '....'),
            'published' => Carbon::parse($i->published_at)->toDateTimeString(),
        ]);

        $response = compact('slider','post');
        return $this->sendResponse($response);
    }
}


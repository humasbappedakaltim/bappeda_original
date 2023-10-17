<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Api\BaseController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

use Carbon\Carbon;
use App\Models\Post;

class NewsController extends BaseController
{
    public function index() {

        $post = Post::where('category_id', Request::get('category', 6))->latest()->paginate(Request::get('limit', 3))->transform(fn($i) => [
            'id' => $i->id,
            'thumbnail' => url('').'/storage/'.$i->image,
            'title' => $i->title,
            'content' => Str::limit($i->content, 200, '....'),
            'published' => Carbon::parse($i->published_at)->toDateTimeString(),
        ]);

        return $this->sendResponse($post);
    }

    public function detail($id) {
        $i = Post::with('category')->where('id', $id)->first();
        return $this->sendResponse([
            'id' => $i->id,
            'thumbnail' => url('').'/storage/'.$i->image,
            'category' => $i->category->name,
            'title' => $i->title,
            'content' => $i->content,
            'read' => $i->read,
            'published' => Carbon::parse($i->published_at)->toDateTimeString(),
        ]);
    }
}

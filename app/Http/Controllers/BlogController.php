<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::where('published_at', '<=', Carbon::now())->first();
        $posts->dump();
            // ->orderBy('published_at', 'desc')
            // ->paginate(config('blog.posts_per_page'));

        return view('blog.index', compact('posts'));
    }
}

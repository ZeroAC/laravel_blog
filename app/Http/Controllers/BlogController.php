<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'asc')
            ->paginate(config('blog.posts_per_page'));//分页查询 出现4条记录
        return view('blog.index', compact('posts'));
    }
    public function showPost($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('blog.post', ['post' => $post]);
    }
}

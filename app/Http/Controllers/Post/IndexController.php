<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $uncategorized_cat = Category::where('title', Category::UNCATEGORIZES_TITLE)->first();
        $posts = Post::where('category_id', '!=', $uncategorized_cat->id)->paginate(2);
        $posts_random = Post::inRandomOrder()->where('category_id', '!=', $uncategorized_cat->id)->limit(4)->get();
        $posts_liked = Post::withCount('likedUsers')->orderBy('liked_users_count', 'desc')->where('category_id', '!=', $uncategorized_cat->id)->get()->take(4);
        return view('post.index', compact('posts','posts_random', 'posts_liked'));
    }
}

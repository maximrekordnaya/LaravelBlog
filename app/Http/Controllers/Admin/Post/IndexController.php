<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;


class IndexController extends BaseController
{
    public function __invoke()
    {
        $uncategorized_cat = Category::where('title' , Category::UNCATEGORIZES_TITLE)->first();
        $posts = Post::whereNotIn('category_id', [$uncategorized_cat->id])->get();
//        dd($posts);
        $uncategorized_posts = $uncategorized_cat->posts;
        return view('admin.post.index', compact('posts', 'uncategorized_posts'));
    }
}

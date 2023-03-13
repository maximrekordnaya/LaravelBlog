<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data = [];
        $data['user_q'] = User::all()->count();
        $data['post_q'] = Post::all()->count();
        $data['category_q'] = Category::all()->count();
        $data['tag_q'] = Tag::all()->count();


        return view('admin.main.index', compact('data'));
    }
}

<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke(Category $category)
    {
        $uncategorized = Category::where('title', 'Без категорії')->firstOrFail();
        if ($category->id === $uncategorized->id) {
            return redirect()->route('admin.category.index')->withErrors(['Нельзя удалить категорию "Без категории".']);
        }
        $category->posts()->update(['category_id'=>$uncategorized->id]);

        if($category->id !== $uncategorized->id) {
            $category->delete();
        }
        return redirect()->route('admin.category.index');
    }
}

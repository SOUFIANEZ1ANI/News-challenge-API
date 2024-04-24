<?php

namespace App\Http\Controllers;

use App\Http\Resources\NewsResource;
use App\Models\Category;

class CategoryController extends Controller
{
    public function search(string $name)
    {
        $category = Category::query()
            ->where('name', 'LIKE', '%' . $name . '%')
            ->firstOrFail();

        $news = $category->news()
            ->active()
            ->with('category')
            ->latest('start_date')
            ->paginate();

        return NewsResource::collection($news);
    }
}

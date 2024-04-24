<?php

namespace App\Http\Controllers;

use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\UpdateRequest;
use App\Http\Resources\NewsResource;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()
            ->with('category')
            ->active()
            ->latest('start_date')
            ->paginate();

        return NewsResource::collection($news);
    }

    public function store(CreateRequest $request)
    {
        $news = News::query()
            ->create($request->validated())
            ->load('category');

        return new NewsResource($news);
    }

    public function show(News $news)
    {
        $news->load('category');

        return new NewsResource($news);
    }

    public function update(News $news, UpdateRequest $request)
    {
        $news->update($request->validated());
        $news->load('category');

        return new NewsResource($news);
    }

    public function destroy(News $news)
    {
        $news->delete();

        return response()->noContent();
    }
}

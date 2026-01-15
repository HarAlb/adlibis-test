<?php

namespace App\Http\UseCases\Article;

use App\Models\Article;

final class ReadArticlesUseCase
{
    public function execute(int $perPage = 10)
    {
        return Article::query()
            ->with([
                'comments' => fn ($query) => $query->whereNull('parent_id')->withCount('replies')->limit(3)
            ])
            ->withCount('comments')
            ->orderByDesc('published_at')->cursorPaginate($perPage);
    }
}

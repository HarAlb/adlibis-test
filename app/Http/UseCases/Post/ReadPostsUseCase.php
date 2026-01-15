<?php

namespace App\Http\UseCases\Post;

use App\Models\Post;

final class ReadPostsUseCase
{
    public function execute(int $perPage = 10)
    {
        return Post::query()
            ->with([
                'comments' => fn ($query) => $query->whereNull('parent_id')->withCount('replies')->limit(3),
                'video',
                'author'
            ])
            ->withCount('comments')
            ->orderByDesc('published_at')
            ->cursorPaginate($perPage);
    }
}

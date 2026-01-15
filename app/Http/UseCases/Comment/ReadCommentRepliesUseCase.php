<?php

namespace App\Http\UseCases\Comment;

use App\Models\Comment;

final class ReadCommentRepliesUseCase
{
    public function execute(int $id, int $perPage = 10)
    {
        $comment = Comment::query()->findOrFail($id);

        return $comment->replies()
            ->withCount('replies')
            ->with('author')
            ->latest()
            ->cursorPaginate($perPage);
    }
}

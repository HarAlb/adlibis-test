<?php

namespace App\Http\UseCases\Comment;

use App\Models\Comment;

final class StoreReplyUseCase
{
    public function execute(int $commentId, string $body, ?int $userId = null)
    {
        $comment = Comment::query()->findOrFail($commentId);

        return $comment->replies()->create([
            'body' => $body,
            'user_id' => $userId
        ])->load('parent', 'author')->loadCount('replies');
    }
}

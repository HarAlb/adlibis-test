<?php

namespace App\Http\UseCases\Comment;

use Illuminate\Database\Eloquent\Relations\Relation;

final class StoreCommentUseCase
{
    public function execute(string $commentableType, int $commentableId, array $data, ?int $userId = null)
    {
        $class = Relation::getMorphedModel($commentableType);
        $entity = $class::findOrFail($commentableId);

        return $entity->comments()->create([
            'body' => $data['body'],
            'user_id' => $userId,
            'parent_id' => $data['parent_id'] ?? null,
        ])->load('author', 'parent')->loadCount('replies');
    }
}

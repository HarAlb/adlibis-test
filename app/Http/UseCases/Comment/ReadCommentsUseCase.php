<?php

namespace App\Http\UseCases\Comment;

use Illuminate\Database\Eloquent\Relations\Relation;

final class ReadCommentsUseCase
{
    public function execute(string $commentableType, int $commentableId, ?int $perPage = 10)
    {
        $class = Relation::getMorphedModel($commentableType);
        $entity = $class::findOrFail($commentableId);

        return $entity->comments()
            ->whereNull('parent_id')
            ->withCount('replies')
            ->with('author')
            ->latest()
            ->cursorPaginate($perPage);
    }
}

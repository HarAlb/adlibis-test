<?php

namespace App\Http\Handlers\Api\Comment;

use App\Http\Resources\CommentResource;
use App\Http\UseCases\Comment\ReadCommentRepliesUseCase;
use App\Http\UseCases\Comment\ReadCommentsUseCase;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use OpenApi\Attributes as OAT;

final class ReadCommentsHandler
{
    public function __construct(
        private readonly ReadCommentsUseCase $readCommentsUseCase
    )
    {
    }

    #[
        OAT\Get(
            path: '/comments/{commentable_type}/{commentable_id}',
            description: 'Список комментариев к сущности (статья или пост) с пагинацией',
            summary: 'Комментарии сущности',
            tags: ['Комментарии'],
            responses: [
                new OAT\Response(
                    response: 200,
                    description: 'OK',
                    content: new OAT\JsonContent(
                        ref: '#/components/schemas/CommentPaginateResponseWrapper'
                    )
                )
            ],
        ),
        OAT\Parameter(name: 'cursor', ref: '#/components/parameters/cursor'),
        OAT\Parameter(name: 'commentable_type', ref: '#/components/parameters/commentable_type'),
        OAT\Parameter(name: 'commentable_id', ref: '#/components/parameters/commentable_id'),
        OAT\Parameter(name: 'per_page', ref: '#/components/parameters/per_page'),
    ]
    public function __invoke(string $commentableType, int $commentableId): AnonymousResourceCollection
    {
        $comments = $this->readCommentsUseCase->execute($commentableType, $commentableId, request()->get('per_page', 10));

        return CommentResource::collection($comments);
    }
}

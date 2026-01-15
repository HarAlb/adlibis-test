<?php

namespace App\Http\Handlers\Api\Comment;

use App\Http\Resources\CommentResource;
use App\Http\UseCases\Comment\ReadCommentRepliesUseCase;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use OpenApi\Attributes as OAT;

final class ReadRepliesHandler
{
    public function __construct(
        private readonly ReadCommentRepliesUseCase $readCommentRepliesUseCase
    )
    {
    }

    #[
        OAT\Get(
            path: '/comments/{id}/replies',
            description: 'Список ответов на комментарий',
            summary: 'Список ответов на комментарий',
            security: [['bearerAuth' => []]],
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
        OAT\Parameter(name: 'id', ref: '#/components/parameters/id'),
        OAT\Parameter(name: 'per_page', ref: '#/components/parameters/per_page'),
    ]
    public function __invoke(int $id): AnonymousResourceCollection
    {
        $comments = $this->readCommentRepliesUseCase->execute($id, request()->get('per_page', 10));

        return CommentResource::collection($comments);
    }
}

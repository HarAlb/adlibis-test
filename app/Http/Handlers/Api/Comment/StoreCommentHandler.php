<?php

namespace App\Http\Handlers\Api\Comment;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Resources\CommentResource;
use App\Http\UseCases\Comment\StoreCommentUseCase;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use OpenApi\Attributes as OAT;

final class StoreCommentHandler
{
    public function __construct(
        private readonly StoreCommentUseCase $storeCommentUseCase
    )
    {
    }

    #[
        OAT\Post(
            path: '/comments/{commentable_type}/{commentable_id}',
            description: 'Создание комментария к статье или публикации',
            summary: 'Создание комментария',
            security: [['bearerAuth' => []]],
            requestBody: new OAT\RequestBody(
                required: true,
                content: new OAT\MediaType(
                    mediaType: 'application/json',
                    schema: new OAT\Schema(
                        ref: '#/components/schemas/StoreCommentRequest'
                    )
                )
            ),
            tags: ['Комментарии'],
            responses: [
                new OAT\Response(
                    response: 201,
                    description: 'Комментарий создан',
                    content: new OAT\JsonContent(
                        ref: '#/components/schemas/CommentResponse'
                    )
                ),
                new OAT\Response(
                    response: 422,
                    description: 'Ошибка валидации'
                )
            ]
        ),
        OAT\Parameter(name: 'commentable_type', ref: '#/components/parameters/commentable_type'),
        OAT\Parameter(name: 'commentable_id', ref: '#/components/parameters/commentable_id'),
    ]
    public function __invoke(string $commentableType, int $commentableId, StoreCommentRequest $request): CommentResource
    {
        $comment = $this->storeCommentUseCase->execute(
            $commentableType,
            $commentableId,
            $request->validated(),
        );

        return CommentResource::make($comment);
    }
}

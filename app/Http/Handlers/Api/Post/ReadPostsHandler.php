<?php

namespace App\Http\Handlers\Api\Post;

use App\Http\Resources\ArticleResource;
use App\Http\Resources\PostResource;
use App\Http\UseCases\Article\ReadArticlesUseCase;
use App\Http\UseCases\Post\ReadPostsUseCase;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use OpenApi\Attributes as OAT;

final class ReadPostsHandler
{
    public function __construct(
        private readonly ReadPostsUseCase $readPostsUseCase
    )
    {
    }

    #[
        OAT\Get(
            path: '/posts',
            description: 'Получение списка публикаций с курсорной пагинацией',
            summary: 'Список публикаций',
            tags: ['Публикация'],
            responses: [
                new OAT\Response(
                    response: 200,
                    description: 'OK',
                    content: new OAT\JsonContent(
                        ref: '#/components/schemas/PostCursorPaginateResponseWrapper'
                    )
                )
            ],
        ),
        OAT\Parameter(name: 'cursor', ref: '#/components/parameters/cursor'),
        OAT\Parameter(name: 'per_page', ref: '#/components/parameters/per_page'),
    ]
    public function __invoke(): AnonymousResourceCollection
    {
        $articles = $this->readPostsUseCase->execute(request()->get('per_page', 10));

        return PostResource::collection($articles);
    }
}

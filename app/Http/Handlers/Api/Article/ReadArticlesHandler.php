<?php

namespace App\Http\Handlers\Api\Article;

use App\Http\Resources\ArticleResource;
use App\Http\UseCases\Article\ReadArticlesUseCase;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use OpenApi\Attributes as OAT;

final class ReadArticlesHandler
{
    public function __construct(
        private readonly ReadArticlesUseCase $readArticlesUseCase
    )
    {
    }

    #[
        OAT\Get(
            path: '/articles',
            description: 'Получение списка новостей с курсорной пагинацией',
            summary: 'Список новостей',
            security: [['bearerAuth' => []]],
            tags: ['Новости'],
            responses: [
                new OAT\Response(
                    response: 200,
                    description: 'OK',
                    content: new OAT\JsonContent(
                        ref: '#/components/schemas/ArticleCursorPaginateResponseWrapper'
                    )
                )
            ],
        ),
        OAT\Parameter(name: 'cursor', ref: '#/components/parameters/cursor'),
        OAT\Parameter(name: 'per_page', ref: '#/components/parameters/per_page'),
    ]
    public function __invoke(): AnonymousResourceCollection
    {
        $articles = $this->readArticlesUseCase->execute(request()->get('per_page', 10));

        return ArticleResource::collection($articles);
    }
}

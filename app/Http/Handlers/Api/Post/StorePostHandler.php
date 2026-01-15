<?php

namespace App\Http\Handlers\Api\Post;

use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Http\UseCases\Post\StorePostUseCase;
use App\Models\User;
use OpenApi\Attributes as OAT;

final class StorePostHandler
{
    public function __construct(
        private readonly StorePostUseCase $storePostUseCase
    )
    {
    }

    #[
        OAT\Post(
            path: '/posts',
            description: 'Создание новой публикации с видеофайлом',
            summary: 'Создание публикации',
            requestBody: new OAT\RequestBody(
                required: true,
                content: new OAT\MediaType(
                    mediaType: 'multipart/form-data',
                    schema: new OAT\Schema(ref: '#/components/schemas/StorePostRequest')
                )
            ),
            tags: ['Публикация'],
            responses: [
                new OAT\Response(
                    response: 200,
                    description: 'OK',
                    content: new OAT\JsonContent(
                        ref: '#/components/schemas/PostResponseWrapper'
                    )
                ),
                new OAT\Response(
                    response: 422,
                    description: 'Ошибка валидации данных'
                )
            ],
        )
    ]
    public function __invoke(StorePostRequest $request): PostResource
    {
        $post = $this->storePostUseCase
            ->execute(
                $request->validated('title'),
                $request->validated('content'),
                $request->file('video'),
                User::query()->inRandomOrder()->value('id') // Not Correct
            );

        return PostResource::make($post);
    }
}

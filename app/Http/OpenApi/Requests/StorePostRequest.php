<?php

namespace App\Http\OpenApi\Requests;

use OpenApi\Attributes as OAT;

#[OAT\Schema(
    schema: 'StorePostRequest',
    required: ['title', 'content', 'video'],
    properties: [
        new OAT\Property(
            property: 'title',
            type: 'string',
            maxLength: 255,
            example: 'Новая публикация'
        ),
        new OAT\Property(
            property: 'content',
            type: 'string',
            example: 'Текст публикации'
        ),
        new OAT\Property(
            property: 'video',
            description: 'Видео-файл публикации',
            type: 'string',
            format: 'binary'
        ),
    ],
    type: 'object'
)]
final class StorePostRequest {}

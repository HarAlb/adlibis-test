<?php

namespace App\Http\OpenApi\Responses;

use OpenApi\Attributes as OAT;

#[OAT\Schema(
    schema: 'PostResponse',
    properties: [
        new OAT\Property(property: 'id', type: 'integer', example: 23),
        new OAT\Property(property: 'title', type: 'string'),
        new OAT\Property(property: 'content', type: 'string'),
        new OAT\Property(property: 'description', type: 'string'),
        new OAT\Property(property: 'published_at', type: 'string', format: 'date-time'),
        new OAT\Property(
            property: 'comments',
            type: 'array',
            items: new OAT\Items(ref: '#/components/schemas/CommentResponse')
        ),
        new OAT\Property(property: 'comments_count', type: 'integer', example: 6),
        new OAT\Property(property: 'video', ref: '#/components/schemas/MediaResponse', nullable: false),
        new OAT\Property(property: 'author', ref: '#/components/schemas/AuthorResponse', nullable: true)
    ],
    type: 'object'
)]
final class PostResponse {}

<?php

namespace App\Http\OpenApi\Responses;

use OpenApi\Attributes as OAT;

#[OAT\Schema(
    schema: 'ArticleResponse',
    properties: [
        new OAT\Property(property: 'id', type: 'integer', example: 23),
        new OAT\Property(property: 'title', type: 'string'),
        new OAT\Property(property: 'content', type: 'string'),
        new OAT\Property(property: 'published_at', type: 'string', format: 'date-time'),
        new OAT\Property(
            property: 'comments',
            type: 'array',
            items: new OAT\Items(ref: '#/components/schemas/CommentResponse')
        ),
        new OAT\Property(property: 'comments_count', type: 'integer', example: 6),
    ],
    type: 'object'
)]
final class ArticleResponse {}

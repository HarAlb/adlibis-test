<?php

namespace App\Http\OpenApi\Responses;

use OpenApi\Attributes as OAT;

#[OAT\Schema(
    schema: 'CommentResponse',
    properties: [
        new OAT\Property(property: 'id', type: 'integer', example: 334),
        new OAT\Property(
            property: 'author',
            ref: '#/components/schemas/AuthorResponse'
        ),
        new OAT\Property(property: 'body', type: 'string'),
        new OAT\Property(property: 'created_at', type: 'string', format: 'date-time'),
        new OAT\Property(property: 'replies_count', type: 'integer', example: 2),
        new OAT\Property(
            property: 'parent',
            ref: '#/components/schemas/CommentParentResponse'
        ),
    ],
    type: 'object'
)]
final class CommentResponse {}

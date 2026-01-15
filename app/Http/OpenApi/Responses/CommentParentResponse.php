<?php

namespace App\Http\OpenApi\Responses;

use OpenApi\Attributes as OAT;

#[OAT\Schema(
    schema: 'CommentParentResponse',
    properties: [
        new OAT\Property(property: 'id', type: 'integer', example: 334),
        new OAT\Property(
            property: 'author',
            ref: '#/components/schemas/AuthorResponse'
        ),
        new OAT\Property(property: 'body', type: 'string'),
        new OAT\Property(property: 'created_at', type: 'string', format: 'date-time'),
        new OAT\Property(property: 'replies_count', type: 'integer', example: 2),
    ],
    type: 'object'
)]
final class CommentParentResponse {}

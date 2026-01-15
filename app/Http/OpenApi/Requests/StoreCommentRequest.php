<?php

namespace App\Http\OpenApi\Requests;

use OpenApi\Attributes as OAT;

#[OAT\Schema(
    schema: 'StoreCommentRequest',
    required: ['commentable_type', 'commentable_id', 'body'],
    properties: [
        new OAT\Property(
            property: 'parent_id',
            description: 'ID родительского комментария (для ответа)',
            type: 'integer',
            example: null,
            nullable: true
        ),
        new OAT\Property(
            property: 'body',
            description: 'Текст комментария',
            type: 'string',
            example: 'Отличная статья!'
        ),
    ],
    type: 'object'
)]
final class StoreCommentRequest {}

<?php

namespace App\Http\OpenApi\Responses\Wrappers;

use OpenApi\Attributes as OAT;

#[
    OAT\Schema(
        schema: 'CommentPaginateResponseWrapper',
        properties: [
            new OAT\Property(
                property: 'data',
                type: 'array',
                items: new OAT\Items(ref: '#/components/schemas/CommentResponse')
            ),
            new OAT\Property(
                property: 'links',
                ref: '#/components/schemas/CursorLinks'
            ),
            new OAT\Property(
                property: 'meta',
                ref: '#/components/schemas/CursorMeta'
            ),
        ],
        type: 'object'
    )
]
final class CommentPaginateResponseWrapper {}

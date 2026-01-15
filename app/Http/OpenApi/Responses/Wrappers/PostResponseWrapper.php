<?php

namespace App\Http\OpenApi\Responses\Wrappers;

use OpenApi\Attributes as OAT;

#[
    OAT\Schema(
        schema: 'PostResponseWrapper',
        properties: [
            new OAT\Property(
                property: 'data',
                ref: '#/components/schemas/PostResponse'
            )
        ],
        type: 'object'
    )
]
final class PostResponseWrapper {}

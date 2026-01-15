<?php

namespace App\Http\OpenApi\Responses\Wrappers;

use OpenApi\Attributes as OAT;

#[
    OAT\Schema(
        schema: 'CommentResponseWrapper',
        properties: [
            new OAT\Property(
                property: 'data',
                ref: '#/components/schemas/CommentResponse'
            )
        ],
        type: 'object'
    )
]
final class CommentResponseWrapper {}

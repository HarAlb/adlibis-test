<?php

namespace App\Http\OpenApi\Responses;

use OpenApi\Attributes as OAT;

#[OAT\Schema(
    schema: 'CursorMeta',
    properties: [
        new OAT\Property(property: 'path', type: 'string', example: '/articles'),
        new OAT\Property(property: 'per_page', type: 'integer', example: 10),
        new OAT\Property(property: 'next_cursor', type: 'string', nullable: true),
        new OAT\Property(property: 'prev_cursor', type: 'string', nullable: true),
    ],
    type: 'object'
)]
final class CursorMetaResponse {}

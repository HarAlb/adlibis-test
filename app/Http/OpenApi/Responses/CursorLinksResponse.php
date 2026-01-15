<?php

namespace App\Http\OpenApi\Responses;

use OpenApi\Attributes as OAT;

#[OAT\Schema(
    schema: 'CursorLinks',
    properties: [
        new OAT\Property(property: 'first', type: 'string', nullable: true),
        new OAT\Property(property: 'last', type: 'string', nullable: true),
        new OAT\Property(property: 'prev', type: 'string', nullable: true),
        new OAT\Property(property: 'next', type: 'string', nullable: true),
    ],
    type: 'object'
)]
final class CursorLinksResponse {}

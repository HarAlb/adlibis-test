<?php

namespace App\Http\OpenApi\Responses;

use OpenApi\Attributes as OAT;

#[OAT\Schema(
    schema: 'MediaResponse',
    properties: [
        new OAT\Property(property: 'id', type: 'integer', example: 23),
        new OAT\Property(property: 'type', type: 'string', example: 'video'),
        new OAT\Property(property: 'size', type: 'integer', example: 117464, nullable: true),
        new OAT\Property(property: 'path', type: 'string', example: 'videos/aGE0rxCqQh.mp4'),
    ],
    type: 'object'
)]
final class MediaResponse {}

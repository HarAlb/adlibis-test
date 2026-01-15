<?php

namespace App\Http\OpenApi\Responses;

use OpenApi\Attributes as OAT;

#[OAT\Schema(
    schema: 'AuthorResponse',
    properties: [
        new OAT\Property(property: 'id', type: 'integer', example: 23),
        new OAT\Property(property: 'name', type: 'string'),
        new OAT\Property(property: 'email', type: 'string'),
    ],
    type: 'object'
)]
final class AuthorResponse {}

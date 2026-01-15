<?php

namespace App\Http\OpenApi\Parameters\Path;

use OpenApi\Attributes as OAT;

#[OAT\Parameter(
    name: 'id',
    description: 'Id',
    in: 'path',
    required: true,
    schema: new OAT\Schema(type: 'integer'),
    example: 1
)]
class IdParameter {}

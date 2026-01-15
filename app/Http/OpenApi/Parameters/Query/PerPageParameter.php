<?php

namespace App\Http\OpenApi\Parameters\Query;

use OpenApi\Attributes as OAT;

#[OAT\Parameter(
    name: 'per_page',
    description: 'Per Page',
    in: 'query',
    required: false,
    schema: new OAT\Schema(type: 'int'),
    example: 3
)]
class PerPageParameter {}

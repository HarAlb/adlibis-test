<?php

namespace App\Http\OpenApi\Parameters\Query;

use OpenApi\Attributes as OAT;

#[OAT\Parameter(
    name: 'cursor',
    description: 'Cursor',
    in: 'query',
    required: false,
    schema: new OAT\Schema(type: 'string'),
    example: 'eyJjcmVhdGVkX2F0IjoiMjAyNi0wMS0xNCAyMTowMzo1NyIsIl9wb2ludHNUb05leHRJdGVtcyI6dHJ1ZX0'
)]
class CursorParameter {}

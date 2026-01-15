<?php

namespace App\Http\OpenApi\Parameters\Path;

use OpenApi\Attributes as OAT;

#[OAT\Parameter(
    name: 'commentable_id',
    description: 'Commentable Id',
    in: 'path',
    required: true,
    schema: new OAT\Schema(type: 'integer'),
    example: 1
)]
class CommentableIdParameter {}

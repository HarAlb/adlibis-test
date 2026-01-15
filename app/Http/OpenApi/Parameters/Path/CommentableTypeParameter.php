<?php

namespace App\Http\OpenApi\Parameters\Path;

use OpenApi\Attributes as OAT;

#[OAT\Parameter(
    name: 'commentable_type',
    description: 'commentable_type article|post',
    in: 'path',
    required: true,
    schema: new OAT\Schema(type: 'string'),
    example: 'article'
)]
class CommentableTypeParameter {}

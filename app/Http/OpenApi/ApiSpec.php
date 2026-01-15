<?php

namespace App\Http\OpenApi;

use OpenApi\Attributes as OAT;

#[
    OAT\Info(
        version: '1.0',
        title: 'Adlibis API Documentation'
    ),
    OAT\Server(
        url: L5_SWAGGER_CONST_HOST,
        description: 'API Server'
    ),
    OAT\SecurityScheme(
        securityScheme: 'bearerAuth',
        type: 'http',
        scheme: 'bearer'
    )
]
class ApiSpec {}

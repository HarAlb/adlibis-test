<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'disk',
        'path',
        'type',
        'size',
        'is_main',
        'sort_order',
    ];

    public function mediable(): MorphTo
    {
        return $this->morphTo();
    }
}

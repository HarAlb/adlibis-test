<?php

namespace App\Models;

use App\Http\Enums\MediaType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'description',
        'content',
        'published_at',
    ];

    public function medias(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    public function video(): HasOne
    {
        return $this->hasOne(Media::class, 'mediable_id')
            ->where('mediable_type', $this->getMorphClass())
            ->where('type', MediaType::VIDEO->value);
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

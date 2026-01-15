<?php

namespace App\Http\UseCases\Post;

use App\Http\Enums\MediaType;
use App\Models\Post;
use App\Http\UseCases\Media\MediaStoreUseCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

final class StorePostUseCase
{
    public function __construct(
        private readonly MediaStoreUseCase $mediaStoreUseCase,
    ) {}

    public function execute(string $title, string $content, UploadedFile $video, ?int $userId = null): Post
    {
        $post = Post::create([
            'title' => $title,
            'content' => $content,
            'published_at' => now(),
            'user_id' => $userId,
            'description' => Str::limit($content,64)
        ]);

        $this->mediaStoreUseCase->execute($video, $post, MediaType::VIDEO->value, true);

        return $post->load('comments', 'author', 'video')->loadCount('comments');
    }
}

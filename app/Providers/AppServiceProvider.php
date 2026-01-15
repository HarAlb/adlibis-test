<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Relation::morphMap([
            'article' => Article::class,
            'comment' => Comment::class,
            'post' => Post::class
        ]);

        Route::pattern('id', '[0-9]+');

        Route::pattern('commentable_type', 'article|post');
        Route::pattern('commentable_id', '[0-9]+');
    }
}

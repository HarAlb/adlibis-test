<?php

use App\Http\Handlers\Api\Article\ReadArticlesHandler;
use App\Http\Handlers\Api\Comment\ReadRepliesHandler;
use App\Http\Handlers\Api\Comment\StoreCommentHandler;
use App\Http\Handlers\Api\Comment\ReadCommentsHandler;
use App\Http\Handlers\Api\Post\ReadPostsHandler;
use App\Http\Handlers\Api\Post\StorePostHandler;
use Illuminate\Support\Facades\Route;

Route::prefix('articles')->group(function () {
    Route::get('', ReadArticlesHandler::class);
});


Route::prefix('comments')->group(function () {
    Route::get('/{id}/replies', ReadRepliesHandler::class);

    Route::get('/{commentable_type}/{commentable_id}', ReadCommentsHandler::class);
    Route::post('/{commentable_type}/{commentable_id}', StoreCommentHandler::class);
});

Route::prefix('posts')->group(function () {
    Route::get('', ReadPostsHandler::class);
    Route::post('', StorePostHandler::class);
});

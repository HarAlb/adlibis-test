<?php

namespace Database\Seeders;

use App\Http\Enums\MediaType;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Media;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        Article::factory(100)->create()->each(function (Article $article) {
            $guestComments = Comment::factory(3)->create([
                'commentable_type' => $article->getMorphClass(),
                'commentable_id' => $article->id,
            ]);

            $userComments = Comment::factory(3)
                ->fromUser()
                ->create([
                    'commentable_type' => $article->getMorphClass(),
                    'commentable_id' => $article->id,
                ]);

            $allComments = $guestComments->merge($userComments);

            $allComments->each(function (Comment $comment) use ($article) {
                Comment::factory(rand(1, 2))
                    ->fromUser()
                    ->create([
                        'commentable_type' => $article->getMorphClass(),
                        'commentable_id' => $article->id,
                        'parent_id' => $comment->id,
                    ]);
            });
        });

        Post::factory(10)
            ->create()->each(function (Post $post) {
                $guestComments = Comment::factory(20)->create([
                    'commentable_type' => $post->getMorphClass(),
                    'commentable_id' => $post->id,
                ]);

                $guestComments->each(function (Comment $comment) use ($post) {
                    Comment::factory(rand(1, 2))
                        ->fromUser()
                        ->create([
                            'commentable_type' => $post->getMorphClass(),
                            'commentable_id' => $post->id,
                            'parent_id' => $comment->id,
                        ]);
                });

                Media::factory(1)->video()->forModel($post)->create([
                    'is_main' => true
                ]);
        });
    }
}

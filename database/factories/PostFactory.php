<?php

namespace Database\Factories;

use App\Models\Media;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(6),
            'description' => $this->faker->sentence(10),
            'content' => $this->faker->paragraphs(3, true),
            'published_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'user_id' => User::factory(),
        ];
    }

    public function withVideos(int $count = 1): self
    {
        return $this->afterCreating(function (Post $post) use ($count) {
            Media::factory()
                ->count($count)
                ->forModel($post) // привязка к Post через morph
                ->video()
                ->create();
        });
    }
}

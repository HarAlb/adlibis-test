<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'body' => $this->faker->sentence(15),
            'parent_id' => null,
        ];
    }

    public function fromUser(): self
    {
        return $this->state(fn () => [
            'user_id' => User::factory(),
        ]);
    }

    public function reply(int $parentId): self
    {
        return $this->state(fn () => [
            'parent_id' => $parentId,
        ]);
    }
}

<?php

namespace Database\Factories;

use App\Http\Enums\MediaType;
use App\Models\Media;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    protected $model = Media::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = $this->faker->randomElement([MediaType::VIDEO->value, MediaType::IMAGE->value]);

        return [
            'mediable_type' => 1,
            'mediable_id'   => null,
            'disk'          => 'public',
            'path'          => $type === MediaType::VIDEO->value
                ? 'videos/' . Str::random(10) . '.mp4'
                : 'images/' . Str::random(10) . '.jpg',
            'type'          => $type,
            'size'          => $this->faker->numberBetween(1024, 10_485_760),
            'is_main'       => false,
            'sort_order'    => 0,
        ];
    }

    public function video(): self
    {
        return $this->state(fn () => [
            'type' => MediaType::VIDEO->value,
            'path' => 'videos/' . Str::random(10) . '.mp4',
        ]);
    }

    public function image(): self
    {
        return $this->state(fn () => [
            'type' => MediaType::IMAGE->value,
            'path' => 'images/' . Str::random(10) . '.jpg',
        ]);
    }

    public function forModel($model): self
    {
        return $this->state(fn() => [
            'mediable_type' => $model->getMorphClass(),
            'mediable_id' => $model->id,
        ]);
    }
}

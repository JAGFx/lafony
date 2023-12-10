<?php

namespace Database\Factories;

use App\Models\Audio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @template TModel of Audio
 *
 * @extends Factory<TModel>
 */
class AudioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<TModel>
     */
    protected $model = Audio::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
        ];
    }
}

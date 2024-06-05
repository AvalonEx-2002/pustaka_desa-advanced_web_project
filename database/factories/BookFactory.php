<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Book::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->sentence(3, true),
            'author' => $this->faker->name,
            'publisher' => $this->faker->company(),
            'publishYear' => $this->faker->numberBetween(1990, 2024),
            'quantity' => $this->faker->numberBetween(1, 2),
            'category_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}

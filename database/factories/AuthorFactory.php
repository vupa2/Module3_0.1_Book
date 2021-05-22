<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AuthorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Author::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => 1,
            'name' => $this->faker->name(),
            'year_of_birth' => $this->faker->date(),
            'year_of_dead' => $this->faker->date(),
            'age' => $this->faker->numberBetween(20, 100),
            'country' => $this->faker->country(),
            'image' => null,
            'description' => $this->faker->paragraph(),
            'summary' => $this->faker->sentence(),
        ];
    }
}

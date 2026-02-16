<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Libro>
 */
class LibroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo' => $this->faker->unique()->numerify('LIB-#####'),
            'autor' => $this->faker->name(),
            'editor' => $this->faker->company(),
            'fecha_creacion' => $this->faker->dateTimeBetween('-5 years', 'now'),
            'fecha_emision' => $this->faker->dateTimeBetween('now', '+1 year'),
        ];
    }
}

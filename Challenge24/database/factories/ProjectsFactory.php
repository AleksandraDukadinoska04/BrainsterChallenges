<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProjectsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => implode(' ', $this->faker->words(rand(3, 5))),
            'subtitle' => $this->faker->sentence(rand(1, 6)),
            'photo' => 'https://blog.brainster.co/wp-content/uploads/2024/02/1200x628_Nosecka-copy-1-1024x536.webp',
            'URL' => 'https://blog.brainster.co/marketing-proekt-landing-page-bitbite/',
            'description' => $this->faker->text(200),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}

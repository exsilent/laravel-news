<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $createdDate = $this->faker->dateTime();
        $categories = Category::all();

        return [
            'title' => $this->faker->sentence(3),
            'text' => $this->faker->paragraph(),
            'category_id' => $categories->random()->id,
            'created_at' => $createdDate,
            'updated_at' => $this->faker->dateTime($createdDate),
        ];
    }
}

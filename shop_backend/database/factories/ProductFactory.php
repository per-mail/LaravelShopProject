<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Group;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // sentence(5) - генерируем заголовок из 5 слов
            'title' => $this->faker->sentence(5),
            'description' => $this->faker->text,
            'content' => $this->faker->text,
            'price' => $this->faker->text,
            'price_old' => $this->faker->text,
            'count' => $this->faker->text,
            'preview_image' => $this->faker->imageUrl(),                        
// выбираем случайную категорию
            'category_id' => Category::get()->random()->id,
            'group_id' => Group::get()->random()->id,   
        ];
    }
}

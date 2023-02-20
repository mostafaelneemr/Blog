<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use function PHPSTORM_META\map;

class CategoryPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            'category_id' => rand(1 ,5),
            'post_id' => rand(1 ,100),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

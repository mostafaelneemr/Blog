<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Stringable;

class PostFactory extends Factory
{

    // protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->unique()->sentence();
        $slug = Str::slug($title); //::slug($title, '-');
        $ispublished = ['1' , '0'];
        return [
            'user_id' => rand(1,5),
            'title' => $title,
            'slug' => $slug,
            'sub_title' => $title,
            'details' => $this->faker->paragraph(),
            'post_type' => 'post',
            'is_published' => $ispublished[rand(0,1)],
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Post::class;

    public function definition()
    {
        $title = $this->faker->sentence(rand(5, 10));
        $cat = [3,4,5,7,8,10];
        $cat = $cat[rand(0,5)];
        return [
            'created_by' => 1,
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->paragraph(rand(1, 2)),
            'keywords' => str_replace(' ', ',', $title),
            'visibility' => 1,
            'featured' => rand(0, 1),
            'breaking' => rand(0, 1),
            'slider' => rand(0, 1),
            'recommended' => rand(0, 1),
            'show_on_headline' => rand(0, 1),
            'show_registered_user' => rand(0, 1),
            'optional_url' => '',
            'tags' => implode(',', $this->faker->words(rand(3, 6))),
            'post_types' => 1,
            'lang_id' => 1,
            'category_id' => $cat,
            'sub_category_id' => null,
            'scheduled_post' => 0,
            'status' => 1,
        ];
    }
}

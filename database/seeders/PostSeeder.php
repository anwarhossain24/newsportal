<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostArticle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::factory()
            ->count(100)
            ->create();
        //add media to each post
        $posts->each(function ($post) {
            $con = new PostArticle();
            $con->post_id = $post->id;
            $con->article_content = fake()->paragraphs(rand(35,50), true);
            $con->save();
            $post->addMediaFromUrl( 'https://source.unsplash.com/random/800x600')
                ->toMediaCollection('post image');
            $post->save();
        });
    }
}

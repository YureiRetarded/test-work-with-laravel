<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(100)->create();
        $tags = Tag::factory(100)->create();
        $posts = Post::factory(10000)->create();
        foreach ($posts as $post) {
            $tagsId = $tags->random(10)->pluck('id');
            $post->tags()->attach($tagsId);
        }
    }
}
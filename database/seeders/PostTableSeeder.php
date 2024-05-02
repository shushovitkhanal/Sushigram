<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $a = new Post;
        $a->title = "First Post";
        $a->caption = "This is my first post";
        $a->user_id = 1;
        $a ->image = 'https://picsum.photos/id/87/854/480';
        $a -> save();

        Post::factory()->count(50)->create();
    }
}

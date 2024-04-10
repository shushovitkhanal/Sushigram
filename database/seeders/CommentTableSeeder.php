<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $a = new Comment;
        $a->content = "This is a comment";
        $a->author = 1;
        $a->post_reference = 1;
        $a->save();

        $a = new Comment;
        $a->content = "This is a another comment";
        $a->author = 1;
        $a->post_reference = 1;
        $a->save();

        $a = new Comment;
        $a->content = "This is one more comment that looks the same";
        $a->author = 1;
        $a->post_reference = 1;
        $a->save();

        //Comment::factory()->count(50)->create();


    }
}

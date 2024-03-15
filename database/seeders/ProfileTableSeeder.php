<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $a = new Profile;
        $a->email = "swalton@swan.ac.uk";
        $a->name = "Sean Walton";
        $a->password = "homestead";
        $a->save();

        Profile::factory()->count(50)->create();
    }
}

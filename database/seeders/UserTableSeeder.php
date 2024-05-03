<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $a = new User;
        $a->email = "swalton@swan.ac.uk";
        $a->name = "Sean Walton";
        $a->password = "homestead";
        $a->save();

        $a = new User;
        $a->email = "nepalese@swan.ac.uk";
        $a->name = "Nepalese Society";
        $a->password = "nepalese";
        $a->save();

        $a = new User;
        $a->email = "thai@swan.ac.uk";
        $a->name = "Thai Society";
        $a->password = "thai";
        $a->save();

        $a = new User;
        $a->email = "indian@swan.ac.uk";
        $a->name = "Indian Society";
        $a->password = "indian";
        $a->save();

        User::factory()->count(50)->create();
    }
}

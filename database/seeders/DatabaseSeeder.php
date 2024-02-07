<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    //    User::factory(5)->create();

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);
        Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);
        Category::create([
            'name' => 'Politics',
            'slug' => 'politics'
        ]);
        Category::create([
            'name' => 'Business',
            'slug' => 'business'
        ]);
        Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);
        Category::create([
            'name' => 'Hobby',
            'slug' => 'hobby'
        ]);
        Category::create([
            'name' => 'Romantic',
            'slug' => 'Romantic'
        ]);

        Category::create([
            'name' => 'Friendship',
            'slug' => 'friendship'
        ]);
        Category::create([
            'name' => 'Nature',
            'slug' => 'nature'
        ]);


       User::factory()->create([
        'name' => 'Murtaza',
        'user_name' => 'murtaza',
        'email' => 'murtaza@gmail.com',
        'password' => 'password'
       ]);
    }
}

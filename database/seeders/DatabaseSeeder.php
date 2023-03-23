<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
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
//         \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin',
            'role' => 0,
            'password' => '$2y$10$iKNZ3UMikAwFr/aDe9d8hObblDTd0b2inY5nimhDKwav5.gRkOzkK', //adminadmin
        ]);

        Category::factory()->create([

            'title' => 'Без категорії',

        ]);
        Category::factory( 5)->create();
        Post::factory(5)->create();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\Category::factory()->create([
        //     'name' => 'Test User',
        //     'slug' => 'test@example.com',
        // ]);

        // \App\Models\Posts::factory()->create([
        //     'title' => 'Test Post',
        //     'slug' => 'test-post',
        //     'body' => 'test post body',
        //     'excerpt' => 'test excerpt',
        //     'category_id' => '2'
        // ]);
        \App\Models\User::factory()->create([
            'name' => 'Anang',
            'username' => 'test-username',
            'email' => 'test@example.com',
            'password' => Hash::make('password')
        ]);
        \App\Models\Posts::factory(15)->create();
        \App\Models\User::factory(5)->create();
        \App\Models\Category::factory()->create([
            'name' => 'Lifestyle',
            'slug' => 'lifestyle',
        ]);
        \App\Models\Category::factory()->create([
            'name' => 'Self Improvement',
            'slug' => 'self-improvement',
        ]);
        \App\Models\Category::factory()->create([
            'name' => 'Household',
            'slug' => 'household',
        ]);
    }
}

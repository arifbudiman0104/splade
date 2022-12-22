<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::factory()->create([
            'name' => 'ArifCode',
            'email' => 'arifcode@admin.com',
            'email_verified_at' => now(),
            // 'is_admin' => 1,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        Category::create([
            'title' => 'Laravel',
        ]);
        Category::create([
            'title' => 'Tailwind CSS',
        ]);
        Category::create([
            'title' => 'Alpine JS',
        ]);
        Category::create([
            'title' => 'Web Development',
        ]);
        Category::create([
            'title' => 'Personal',
        ]);
        Post::factory(20)->create();
    }
}

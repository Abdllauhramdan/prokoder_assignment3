<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        // إنشاء مستخدمين أولاً لأنهم مرتبطين مع المنشورات والتعليقات
        \App\Models\User::factory(10)->create()->each(function ($user) {
            // إنشاء منشورات لكل مستخدم
            \App\Models\Post::factory(3)->create(['user_id' => $user->id])->each(function ($post) {
                // إنشاء تعليقات لكل منشور
                \App\Models\Comment::factory(5)->create(['post_id' => $post->id, 'user_id' => \App\Models\User::inRandomOrder()->first()->id]);
            });
        });

    }
}

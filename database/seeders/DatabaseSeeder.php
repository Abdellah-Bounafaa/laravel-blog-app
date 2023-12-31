<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $categories = [
            "Technology",
            "Culture",
        ];
        foreach ($categories as $categorie) {
            \App\Models\Category::factory()->create([
                'title' => $categorie,
            ]);
        }
    }
}
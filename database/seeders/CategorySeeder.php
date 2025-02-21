<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::insert([
           ['title' => 'легкий'],
           ['title' => 'хрупкий'],
           ['title' => 'тяжелый'],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['category' => 'general'],
            ['category' => 'entertainment'],
            ['category' => 'sports'],
            ['category' => 'movies'],
            ['category' => 'politics'],
            ['category' => 'cars']
        ];


        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

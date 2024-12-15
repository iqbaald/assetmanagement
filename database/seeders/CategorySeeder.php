<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['categoryId' => 1, 'categoryName' => 'Category 1'],
            ['categoryId' => 2, 'categoryName' => 'Category 2'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

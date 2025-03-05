<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['category_name' => 'Technology'],
            ['category_name' => 'Health'],
            ['category_name' => 'Travel'],
            ['category_name' => 'Education'],
            ['category_name' => 'Entertainment'],
            ['category_name' => 'Lifestyle'],
            ['category_name' => 'Business'],
            ['category_name' => 'Food'],
            ['category_name' => 'Sports'],
            ['category_name' => 'Fashion']
        ];
        

        foreach ($categories as $category) {
            Category::firstOrCreate($category);
        }
    }
}

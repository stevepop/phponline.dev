<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    private $categories = [
        [
            'title' => 'Tutorials'
        ],
        [
            'title' => 'Packages'
        ],
        [
            'title' => 'Events'
        ],
        [
            'title' => 'News'
        ]
    ];

    public function run()
    {
        foreach ($this->categories as $category) {
            $category = Category::create($category);
        }
    }
}

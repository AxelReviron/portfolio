<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    private array $categories = [
        [
            'en' => 'Frontend',
            'fr' => 'Frontend',
        ],
        [
            'en' => 'Backend',
            'fr' => 'Backend',
        ],
        [
            'en' => 'Tools & Services',
            'fr' => 'Outils et Services',
        ],
        [
            'en' => 'Videos Games & Others',
            'fr' => 'Jeux Vidéos et Autres',
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->categories as $category) {
            Category::factory([
                'name' => $category,
            ])->create();
        }
    }
}

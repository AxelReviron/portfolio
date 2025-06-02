<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::factory()->create([
            'name' => 'Portfolio',
            'description' => 'Personal portfolio',
            'website' => 'https://axel-reviron.fr',
            'github_url'=> 'https://github.com/AxelReviron/portfolio',
        ])->technologies()->attach([
            Technology::where('name', 'VueJS')->first()->getKey(),
            Technology::where('name', 'Laravel')->first()->getKey(),
            Technology::where('name', 'Inertia')->first()->getKey(),
            Technology::where('name', 'Tailwind')->first()->getKey(),
        ]);
    }
}

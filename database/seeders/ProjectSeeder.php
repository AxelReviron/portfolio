<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    private array $projects = [
        [
            'name' => 'Portfolio',
            'description' => 'Personal portfolio',
            'website' => 'https://axel-reviron.fr',
            'github_url' => 'https://github.com/AxelReviron/portfolio',
            'technologies' => ['TypeScript', 'VueJS', 'Laravel', 'Inertia', 'Tailwind']
        ],
        [
            'name' => 'Quentin Salomon',
            'description' => 'Portfolio of Quentin Salomon, a video editor.',
            'website' => 'https://quentin-salomon.fr/',
            'github_url' => null,
            'technologies' => ['TypeScript', 'VueJS', 'Laravel', 'Inertia', 'Tailwind']
        ],
        [
            'name' => 'Hubspot Supercharger',
            'description' => 'Browser extension for HubSpot, add custom logos, distinct color schemes, and menu navigation customization. ',
            'website' => 'https://quentin-salomon.fr/',
            'github_url' => null,
            'technologies' => ['TypeScript', 'Plasmo', 'Node.js']
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->projects as $projectDatas) {
            $project = Project::factory()->create([
                'name' => $projectDatas['name'],
                'description' => $projectDatas['description'],
                'website' => $projectDatas['website'],
                'github_url'=> $projectDatas['github_url'],
            ]);

            $technologyIds = Technology::whereIn('name', $projectDatas['technologies'])
                ->pluck('id')
                ->toArray();

            $project->technologies()->attach($technologyIds);
        }
    }
}

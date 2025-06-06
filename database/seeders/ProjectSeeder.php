<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileCannotBeAdded;

class ProjectSeeder extends Seeder
{
    private array $projects = [
        [
            'name' => [
                'en' => 'Portfolio',
                'fr' => 'Portfolio',
            ],
            'description' => [
                'en' => 'Personal portfolio',
                'fr' => 'Portfolio personnel',
            ],
            'website' => 'https://axel-reviron.fr',
            'github_url' => 'https://github.com/AxelReviron/portfolio',
            'technologies' => ['TypeScript', 'VueJS', 'Laravel', 'Inertia', 'Tailwind'],
            'media' => [
                [
                    'path' => 'storage/app/private/seeders/media/projects/portfolio.png',
                    'collection' => 'cover_images',
                    'name' => 'portfolio_cover',
                ],
            ]
        ],
        [
            'name' => [
                'en' => 'Quentin Salomon',
                'fr' => 'Quentin Salomon',
            ],
            'description' => [
                'en' => 'Portfolio of Quentin Salomon, a video editor.',
                'fr' => 'Portfolio de Quentin Salomon, un monteur vidéo.',
            ],
            'website' => 'https://quentin-salomon.fr/',
            'github_url' => null,
            'technologies' => ['TypeScript', 'VueJS', 'Laravel', 'Inertia', 'Tailwind'],
            'media' => [
                [
                    'path' => 'storage/app/private/seeders/media/projects/quentin-salomon.png',
                    'collection' => 'cover_images',
                    'name' => 'quentin_salomon_cover',
                ],
            ]
        ],
        [
            'name' => [
                'en' => 'Hubspot Supercharger - Browser Extension',
                'fr' => 'Hubspot Supercharger - Extension de Navigateur',
            ],
            'description' => [
                'en' => 'Browser extension for HubSpot, add custom logos, distinct color schemes, and menu navigation customization.',
                'fr' => 'Extension de navigateur pour HubSpot, ajouter des logos personnalisés, des schémas de couleurs, et la personnalisation du menu de navigation.'
            ],
            'website' => 'https://chromewebstore.google.com/detail/hubspot-supercharger/pgnnijfjmonogolbphlhldecnjcnbolp?hl=fr',
            'github_url' => null,
            'technologies' => ['TypeScript', 'Plasmo', 'Node.js'],
            'media' => [
                [
                    'path' => 'storage/app/private/seeders/media/projects/supercharger.jpg',
                    'collection' => 'cover_images',
                    'name' => 'supercharger_cover',
                ],
            ]
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
                'github_url' => $projectDatas['github_url'],
            ]);

            $technologyIds = Technology::whereIn('name', $projectDatas['technologies'])
                ->pluck('id')
                ->toArray();

            $project->technologies()->attach($technologyIds);

            if (isset($projectDatas['media']) && is_array($projectDatas['media'])) {
                foreach ($projectDatas['media'] as $mediaData) {
                    $mediaPath = base_path($mediaData['path']);

                    if (file_exists($mediaPath)) {
                        $project->addMedia($mediaPath)
                            ->preservingOriginal()
                            ->setFileName($mediaData['name'] . '.' . pathinfo($mediaPath, PATHINFO_EXTENSION))
                            ->toMediaCollection($mediaData['collection']);
                    }
                }
            }
        }
    }
}

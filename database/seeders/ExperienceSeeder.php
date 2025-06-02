<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    private array $experiences = [
        [
            'name' => 'Xefi',
            'description' => 'CDI',
            'website' => 'https://www.xefi.com/',
            'start_date' => '2024-12-02',
            'end_date' => '2025-06-21',
        ],
        [
            'name' => 'Kaffein / Ideagency',
            'description' => 'Alternance',
            'website' => 'https://www.ideagency.fr/',
            'start_date' => '2023-09-20',
            'end_date' => '2024-11-08',
        ],
        [
            'name' => 'Kaffein',
            'description' => 'Stage',
            'website' => 'https://www.ideagency.fr/',
            'start_date' => '2023-05-01',
            'end_date' => '2023-07-31',
        ],
        [
            'name' => 'École 42',
            'description' => 'Piscine C',
            'website' => 'https://42.fr/',
            'start_date' => '2022-08-27',
            'end_date' => '2022-08-01',
        ],
        [
            'name' => 'OpenClassrooms',
            'description' => 'Prep Fullstack',
            'website' => 'https://openclassrooms.com/',
            'start_date' => '2022-04-01',
            'end_date' => '2022-07-31',
        ],

    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->experiences as $experience) {
            Experience::factory()->create([
                'name' => $experience['name'],
                'description' => $experience['description'],
                'website' => $experience['website'],
                'start_date' => $experience['start_date'],
                'end_date' => $experience['end_date'],
            ]);
        }
    }
}

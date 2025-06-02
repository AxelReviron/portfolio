<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    private array $technologies = [
        'Frontend' => [
            'VueJS' => [
                'icon' => 'devicon-vuejs-plain colored',
                'website' => 'https://vuejs.org/'
            ],
            'Nuxt' => [
                'icon' => 'devicon-nuxtjs-plain colored',
                'website' => 'https://nuxt.com/'
            ],
            'Tailwind' => [
                'icon' => 'devicon-tailwindcss-original colored',
                'website' => 'https://tailwindcss.com/'
            ]
        ],
        'Backend' => [
            'Laravel' => [
                'icon' => 'devicon-laravel-original colored',
                'website' => 'https://laravel.com/'
            ],
            'Node.js' => [
                'icon' => 'devicon-nodejs-plain-wordmark colored',
                'website' => 'https://nodejs.org/'
            ],
            'MySQL' => [
                'icon' => 'devicon-mysql-original colored',
                'website' => 'https://www.mysql.com/'
            ],
        ],
        'Tools & Services' => [
            'Git' => [
                'icon' => 'devicon-git-plain colored',
                'website' => 'https://git-scm.com/'
            ],
            'Docker' => [
                'icon' => 'devicon-docker-plain colored',
                'website' => 'https://www.docker.com/'
            ],
            'Linux' => [
                'icon' => 'devicon-linux-plain colored',
                'website' => 'https://www.linux.org/'
            ],
            'Bash' => [
                'icon' => 'devicon-bash-plain colored',
                'website' => 'https://www.gnu.org/software/bash/'
            ],
            'Penpot' => [
                'icon' => null,
                'website' => 'https://penpot.app/'
            ],
            'Inertia' => [
                'icon' => null,
                'website' => 'https://inertiajs.com/'
            ],
        ],
        'Videos Games & Others' => [
            'Godot' => [
                'icon' => 'devicon-godot-plain colored',
                'website' => 'https://godotengine.org/'
            ],
            'Blender' => [
                'icon' => 'devicon-blender-original colored',
                'website' => 'https://www.blender.org/'
            ],
            'FL Studio' => [
                'icon' => null,
                'website' => 'https://www.image-line.com/'
            ],
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->technologies as $category => $technologies) {
            foreach ($technologies as $name => $data) {
                Technology::factory()->create([
                    'name' => $name,
                    'icon' => $data['icon'],
                    'website' => $data['website'],
                    'category_id' => Category::where('name', $category)->first()->getKey()
                ]);
            }
        }
    }
}

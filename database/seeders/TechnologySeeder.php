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
            'TypeScript' => [
                'icon' => 'devicon-typescript-plain colored',
                'website' => 'https://www.typescriptlang.org/',
                'is_active' => true,
            ],
            'VueJS' => [
                'icon' => 'devicon-vuejs-plain colored',
                'website' => 'https://vuejs.org/',
                'is_active' => true,
            ],
            'Nuxt' => [
                'icon' => 'devicon-nuxtjs-plain colored',
                'website' => 'https://nuxt.com/',
                'is_active' => true,
            ],
            'Tailwind' => [
                'icon' => 'devicon-tailwindcss-original colored',
                'website' => 'https://tailwindcss.com/',
                'is_active' => true,
            ],
            'Plasmo' => [
                'icon' => null,
                'website' => 'https://www.plasmo.com/',
                'is_active' => false,
            ]
        ],
        'Backend' => [
            'Laravel' => [
                'icon' => 'devicon-laravel-original colored',
                'website' => 'https://laravel.com/',
                'is_active' => true,
            ],
            'Node.js' => [
                'icon' => 'devicon-nodejs-plain-wordmark colored',
                'website' => 'https://nodejs.org/',
                'is_active' => true,
            ],
            'MySQL' => [
                'icon' => 'devicon-mysql-original colored',
                'website' => 'https://www.mysql.com/',
                'is_active' => true,
            ],
        ],
        'Tools & Services' => [
            'Git' => [
                'icon' => 'devicon-git-plain colored',
                'website' => 'https://git-scm.com/',
                'is_active' => true,
            ],
            'Docker' => [
                'icon' => 'devicon-docker-plain colored',
                'website' => 'https://www.docker.com/',
                'is_active' => true,
            ],
            'Linux' => [
                'icon' => 'devicon-linux-plain colored',
                'website' => 'https://www.linux.org/',
                'is_active' => true,
            ],
            'Bash' => [
                'icon' => 'devicon-bash-plain colored',
                'website' => 'https://www.gnu.org/software/bash/',
                'is_active' => true,
            ],
            'Penpot' => [
                'icon' => null,
                'website' => 'https://penpot.app/',
                'is_active' => true,
            ],
            'Inertia' => [
                'icon' => null,
                'website' => 'https://inertiajs.com/',
                'is_active' => true,
            ],
        ],
        'Videos Games & Others' => [
            'Godot' => [
                'icon' => 'devicon-godot-plain colored',
                'website' => 'https://godotengine.org/',
                'is_active' => true,
            ],
            'Blender' => [
                'icon' => 'devicon-blender-original colored',
                'website' => 'https://www.blender.org/',
                'is_active' => true,
            ],
            'FL Studio' => [
                'icon' => null,
                'website' => 'https://www.image-line.com/',
                'is_active' => true,
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
                    'is_active' => $data['is_active'],
                    'category_id' => Category::whereJsonContainsLocale('name', 'en', $category)->first()->getKey()
                ]);
            }
        }
    }
}

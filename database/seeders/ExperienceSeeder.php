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
            'description' => '<p><strong>Stacktim:</strong></p><p>Involved in the design and development of Stacktim, a collaboration platform for the developer community. Responsibilities included merge request management (validation, code review, and merging), and application synchronization with GitLab via API and webhooks for project and branch updates. Additionally, unit and functional tests were implemented to ensure system reliability.</p><p><br></p>',
            'website' => 'https://www.xefi.com/',
            'start_date' => '2024-12-02',
            'end_date' => '2025-06-21',
        ],
        [
            'name' => 'Kaffein / Ideagency',
            'description' => '<p><strong>Professional Apprenticeship Experience:</strong>&nbsp;</p><p>Contributed to the production of full-stack PHP/JS applications. A key aspect involved integrating AI models for innovative solutions such as chatbots and comprehensive image/document analysis. Additionally, gained hands-on experience with HubSpot CRM integration.</p><p><strong>Apprenticeship Academic &amp; Final Project:</strong></p><p>Acquired in-depth knowledge and practical skills in building robust software, covering areas like user interface components, efficient data persistence, multi-tier application design, implementing security measures, conducting thorough testing, and establishing continuous integration pipelines.</p>',
            'website' => 'https://www.ideagency.fr/',
            'start_date' => '2023-09-20',
            'end_date' => '2024-11-08',
        ],
        [
            'name' => 'Kaffein',
            'description' => '<p><strong>CRM Extension Development:</strong>&nbsp;</p><p>Spearheaded the development of a custom extension for HubSpot CRM, enhancing its capabilities by enabling organizations to implement personalized branding elements like custom logos, distinct color schemes, and tailored menu navigation.&nbsp;</p>',
            'website' => 'https://www.ideagency.fr/',
            'start_date' => '2023-05-01',
            'end_date' => '2023-07-31',
        ],
        [
            'name' => 'École 42',
            'description' => '<p><strong>Piscine C:</strong></p><p>Completed an intensive, month-long C programming immersion at 42. This peer-to-peer learning program involved daily challenging projects and rigorous code reviews, rapidly developing my problem-solving skills, autonomy, and resilience in a demanding environment.&nbsp;</p>',
            'website' => 'https://42.fr/',
            'start_date' => '2022-08-27',
            'end_date' => '2022-08-01',
        ],
        [
            'name' => 'OpenClassrooms',
            'description' => '<p><strong>Prep Fullstack</strong>:</p><p>The curriculum was project-based, demanding strict adherence to a detailed brief and participation in weekly progress meetings to track advancements. Learning was primarily autonomous, leveraging OpenClassrooms\' extensive resources, with weekly mentorship sessions supplementing the development of foundational front-end and back-end skills.&nbsp;</p>',
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

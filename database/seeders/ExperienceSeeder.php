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
            'description' => [
                'en' => '<p><strong>Stacktim:</strong></p><p>Involved in the design and development of Stacktim, a collaboration platform for the developer community. Responsibilities included merge request management (validation, code review, and merging), and application synchronization with GitLab via API and webhooks for project and branch updates. Additionally, unit and functional tests were implemented to ensure system reliability.</p><p><br></p>',
                'fr' => '<p><strong>Stacktim :</strong></p><p>Participation à la conception et au développement de Stacktim, une plateforme de collaboration pour la communauté des développeurs. Les responsabilités incluaient la gestion des "merge requests" (validation, revue de code et fusion), et la synchronisation de l\'application avec GitLab via API et webhooks pour les mises à jour de projets et de branches. De plus, des tests unitaires et fonctionnels ont été mis en œuvre pour garantir la fiabilité du système.</p><p><br></p>',
            ],            'website' => 'https://www.xefi.com/',
            'start_date' => '2024-12-02',
            'end_date' => '2025-06-21',
        ],
        [
            'name' => 'Kaffein / Ideagency',
            'description' => [
                'en' => '<p><strong>Professional Apprenticeship Experience:</strong>&nbsp;</p><p>Contributed to the production of full-stack PHP/JS applications. A key aspect involved integrating AI models for innovative solutions such as chatbots and comprehensive image/document analysis. Additionally, gained hands-on experience with HubSpot CRM integration.</p><p><strong>Apprenticeship Academic &amp; Final Project:</strong></p><p>Acquired in-depth knowledge and practical skills in building robust software, covering areas like user interface components, efficient data persistence, multi-tier application design, implementing security measures, conducting thorough testing, and establishing continuous integration pipelines.</p>',
                'fr' => '<p><strong>Expérience d\'Apprentissage Professionnel :</strong>&nbsp;</p><p>Contribution à la production d\'applications full-stack PHP/JS. Un aspect clé a impliqué l\'intégration de modèles d\'IA pour des solutions innovantes telles que des chatbots et l\'analyse complète d\'images/documents. De plus, j\'ai acquis une expérience pratique avec l\'intégration de HubSpot CRM.</p><p><strong>Projet Académique &amp; de Fin d\'Apprentissage :</strong></p><p>Acquisition de connaissances approfondies et de compétences pratiques dans la création de logiciels robustes, couvrant des domaines tels que les composants d\'interface utilisateur, la persistance efficace des données, la conception d\'applications multi-tiers, la mise en œuvre de mesures de sécurité, la réalisation de tests approfondis et l\'établissement de pipelines d\'intégration continue.</p>',
            ],            'website' => 'https://www.ideagency.fr/',
            'start_date' => '2023-09-20',
            'end_date' => '2024-11-08',
        ],
        [
            'name' => 'Kaffein',
            'description' => [
                'en' => '<p><strong>CRM Extension Development:</strong>&nbsp;</p><p>Spearheaded the development of a custom extension for HubSpot CRM, enhancing its capabilities by enabling organizations to implement personalized branding elements like custom logos, distinct color schemes, and tailored menu navigation.&nbsp;</p>',
                'fr' => '<p><strong>Développement d\'Extensions CRM :</strong>&nbsp;</p><p>Direction du développement d\'une extension personnalisée pour HubSpot CRM, améliorant ses capacités en permettant aux organisations d\'implémenter des éléments de marque personnalisés tels que des logos sur mesure, des schémas de couleurs distincts et une navigation de menu adaptée.&nbsp;</p>',
            ],            'website' => 'https://www.ideagency.fr/',
            'start_date' => '2023-05-01',
            'end_date' => '2023-07-31',
        ],
        [
            'name' => 'École 42',
            'description' => [
                'en' => '<p><strong>Piscine C:</strong></p><p>Completed an intensive, month-long C programming immersion at 42. This peer-to-peer learning program involved daily challenging projects and rigorous code reviews, rapidly developing my problem-solving skills, autonomy, and resilience in a demanding environment.&nbsp;</p>',
                'fr' => '<p><strong>Piscine C :</strong></p><p>Achèvement d\'une immersion intensive d\'un mois en programmation C à 42. Ce programme d\'apprentissage entre pairs comprenait des projets quotidiens stimulants et des revues de code rigoureuses, développant rapidement mes compétences en résolution de problèmes, mon autonomie et ma résilience dans un environnement exigeant.&nbsp;</p>',
            ],            'website' => 'https://42.fr/',
            'start_date' => '2022-08-27',
            'end_date' => '2022-08-01',
        ],
        [
            'name' => 'OpenClassrooms',
            'description' => [
                'en' => '<p><strong>Prep Fullstack</strong>:</p><p>The curriculum was project-based, demanding strict adherence to a detailed brief and participation in weekly progress meetings to track advancements. Learning was primarily autonomous, leveraging OpenClassrooms\' extensive resources, with weekly mentorship sessions supplementing the development of foundational front-end and back-end skills.&nbsp;</p>',
                'fr' => '<p><strong>Prépa Fullstack :</strong></p><p>Le cursus était basé sur des projets, exigeant une stricte adhésion à un cahier des charges détaillé et la participation à des réunions de suivi hebdomadaires. L\'apprentissage était principalement autonome, s\'appuyant sur les vastes ressources d\'OpenClassrooms, avec des sessions de mentorat hebdomadaires complétant le développement des compétences fondamentales en front-end et back-end.&nbsp;</p>',
            ],            'website' => 'https://openclassrooms.com/',
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

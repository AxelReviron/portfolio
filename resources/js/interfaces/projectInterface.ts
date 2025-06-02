import TechnologyInterface from '@/interfaces/technologyInterface';
import ExperienceInterface from '@/interfaces/experienceInterface';

export default interface ProjectInterface {
    id: string;
    name: string;
    description: string;
    github_url: string|null;
    website: string|null;
    technologies: TechnologyInterface[];
    experiences: ExperienceInterface[];
    created_at: Date;
    updated_at: Date;
}

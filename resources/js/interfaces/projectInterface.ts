import TechnologyInterface from '@/interfaces/technologyInterface';
import ExperienceInterface from '@/interfaces/experienceInterface';
import MediaInterface from '@/interfaces/mediaInterface';

export default interface ProjectInterface {
    id: string;
    name: string;
    description: string;
    github_url: string|null;
    website: string|null;
    technologies: TechnologyInterface[];
    experiences: ExperienceInterface[];
    media: MediaInterface[]|[];
    created_at: Date;
    updated_at: Date;
}

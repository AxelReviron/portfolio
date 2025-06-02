import TechnologyInterface from '@/interfaces/technologyInterface';

export default interface CategoryInterface {
    id: string;
    name: string;
    technologies: TechnologyInterface[];
    created_at: Date;
    updated_at: Date;
}

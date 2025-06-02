import CategoryInterface from '@/interfaces/categoryInterface';

export default interface TechnologyInterface {
    id: string;
    name: string;
    icon: string|null;
    website: string|null;
    category_id: string;
    category: CategoryInterface;
    created_at: Date;
    updated_at: Date;
}

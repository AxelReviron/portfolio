export default interface ExperienceInterface {
    id: string;
    name: string;
    description: string;
    website: string|null;
    start_date: Date;
    end_date: Date|null;
    created_at: Date;
    updated_at: Date;
}

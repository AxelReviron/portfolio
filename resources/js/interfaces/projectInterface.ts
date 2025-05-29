export default interface ProjectInterface {
    id: number;
    name: string;
    description: string;
    github_url: string|null;
    website: string|null;
    created_at: Date;
    updated_at: Date;
}

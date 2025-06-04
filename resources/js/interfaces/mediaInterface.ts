export default interface MediaInterface {
    id: number;
    uuid: string;
    collection_name: string;
    conversions_disk: string
    disk: string;
    file_name: string;
    mime_type: string;
    model_id: string;
    model_type: string;
    name: string;
    order_column: number;
    original_url: string;
    preview_url: string;
    size: number;
    manipulations: [];
    custom_properties: [];
    responsive_images: [];
    generated_conversions: [];
    updated_at: Date;
    created_at: Date;
}

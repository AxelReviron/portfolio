<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MediaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'uuid' => $this->uuid,
            'collection_name' => $this->collection_name,
            'conversions_disk' => $this->conversions_disk,
            'disk' => $this->disk,
            'file_name' => $this->file_name,
            'mime_type' => $this->mime_type,
            'model_id' => $this->model_id,
            'model_type' => $this->model_type,
            'name' => $this->name,
            'order_column' => $this->order_column,
            'original_url' => $this->original_url,
            'preview_url' => $this->preview_url,
            'size' => $this->size,
            'manipulations' => $this->manipulations,
            'custom_properties' => $this->custom_properties,
            'responsive_images' => $this->responsive_images,
            'generated_conversions' => $this->generated_conversions,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ];
    }
}

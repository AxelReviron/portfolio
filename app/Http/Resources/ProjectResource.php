<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'website' => $this->website,
            'github_url' => $this->github_url,
            'technologies' => TechnologyResource::collection($this->whenLoaded('technologies')),
            'experiences' => ExperienceResource::collection($this->whenLoaded('experiences')),
            'media' => MediaResource::collection($this->whenLoaded('media')),
        ];
    }
}

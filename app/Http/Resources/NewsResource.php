<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'start_date' => $this->start_date->format('Y-m-d'),
            'expiration_date' => $this->expiration_date->format('Y-m-d'),
            'created_at' => $this->created_at->format('Y-m-d h:i'),
            'category' => $this->whenLoaded('category', fn () =>
                $this->category->only('id', 'name')
            ),
        ];
    }
}

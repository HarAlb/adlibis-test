<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'author' => AuthorResource::make($this->whenLoaded('author')),
            'body' => $this->body,
            'created_at' => $this->created_at,
            'replies_count' => $this->whenCounted('replies'),
            'parent' => self::make($this->whenLoaded('parent')),
        ];
    }
}

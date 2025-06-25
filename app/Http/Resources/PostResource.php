<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'title' => isset($this->title[app()->getLocale()]) ? $this->title[app()->getLocale()] : $this->title['en'],
            'content' => isset($this->content[app()->getLocale()]) ? $this->content[app()->getLocale()] : $this->content['en'],
            'created_at' => $this->created_at->format('Y-m-d H:i'),
            'student_name' => $this->student->name,
            'student_id' => $this->student_id,
        ];
    }
}

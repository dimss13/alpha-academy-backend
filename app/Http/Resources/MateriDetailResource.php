<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MateriDetailResource extends JsonResource
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
            'nama' => $this->nama,
            'content' => $this->content,
            'tutor' => $this->whenLoaded('tutors', function () {
                return $this->tutors->nama;
            }),
            'bidang' => $this->whenLoaded('bidangs', function () {
                return $this->bidangs->nama;
            }),
        ];
    }
}
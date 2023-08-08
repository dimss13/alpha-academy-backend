<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubBabDetailResource extends JsonResource
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
            'judul_sub_bab' => $this->judul_sub_bab,
            'bab' => $this->whenLoaded('babs', function () {
                return $this->babs->judul_bab;
            }),
            'materi' => $this->whenLoaded('babs', function () {
                return $this->babs->materis->nama;
            }),
            'tutor' => $this->whenLoaded('babs', function () {
                return $this->babs->materis->tutors->nama;
            })
        ];
    }
}
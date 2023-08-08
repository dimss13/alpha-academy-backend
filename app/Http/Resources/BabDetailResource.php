<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BabDetailResource extends JsonResource
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
            "judul_bab" => $this->judul_bab,
            'materi' => $this->whenLoaded('materis', function () {
                return $this->materis->nama;
            }),
            'judul_sub_bab' => $this->whenLoaded('subBabs', function () {
                return $this->subBabs->map(function ($subBab) {
                    return $subBab->judul_sub_bab;
                })->toArray();
            }),
            'tutor' => $this->whenLoaded('materis', function () {
                return $this->materis->tutors->nama;
            }),
        ];
    }
}
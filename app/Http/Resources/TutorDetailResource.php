<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TutorDetailResource extends JsonResource
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
            'deskripsi' => $this->deskripsi,
            'bidang' => $this->whenLoaded('tutorBidangs', function () {
                return $this->tutorBidangs->map(function ($tutorBidang) {
                    return $tutorBidang->nama;
                });
            }),
            'user' => $this->whenLoaded('tutorUsers', function () {
                return $this->tutorUsers->map(function ($tutorUser) {
                    return $tutorUser->nama;
                });
            }),
        ];
    }
}
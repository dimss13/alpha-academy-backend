<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BidangDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'tutor' => $this->whenLoaded('bidangTutors', function () {
                return $this->bidangTutors->map(function ($bidangTutor) {
                    return $bidangTutor->nama;
                });
            }),
        ];
    }
}
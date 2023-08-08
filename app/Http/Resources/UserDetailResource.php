<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserDetailResource extends JsonResource
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
            'email' => $this->email,
            'no_telepon' => $this->no_telepon,
            'asal_sekolah' => $this->asal_sekolah,
            'asal_provinsi' => $this->asal_provinsi,
            'status' => $this->whenLoaded('statuses', function () {
                return $this->statuses->premium_status;
            }),
            'tutor' => $this->whenLoaded('userTutors', function () {
                return $this->userTutors->map(function ($userTutors) {
                    return $userTutors->nama;
                });
            }),

        ];
    }
}
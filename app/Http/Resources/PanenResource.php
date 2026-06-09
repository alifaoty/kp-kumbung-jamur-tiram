<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PanenResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'siklus_id'     => $this->siklus_id,
            'tanggal_panen' => $this->tanggal_panen?->format('Y-m-d'),
            'jumlah_panen'  => $this->jumlah_panen,
            'siklus'        => new SiklusResource($this->whenLoaded('siklus')),
            'created_at'    => $this->created_at?->format('Y-m-d H:i:s'),
            'updated_at'    => $this->updated_at?->format('Y-m-d H:i:s'),
        ];
    }
}

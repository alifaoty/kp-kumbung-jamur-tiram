<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SiklusResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'              => $this->id,
            'tanggal_mulai'   => $this->tanggal_mulai?->format('Y-m-d'),
            'jumlah_backlog'  => $this->jumlah_backlog,
            'blok_tanam'      => $this->blok_tanam,
            'estimasi_panen'  => $this->estimasi_panen,
            'durasi_tanam'    => $this->durasi_tanam,
            'total_panen'     => $this->total_panen,
            'panen'           => PanenResource::collection($this->whenLoaded('panen')),
            'created_at'      => $this->created_at?->format('Y-m-d H:i:s'),
            'updated_at'      => $this->updated_at?->format('Y-m-d H:i:s'),
        ];
    }
}

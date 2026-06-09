<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MonitoringResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'waktu'      => $this->waktu?->format('Y-m-d H:i:s'),
            'suhu'       => (float) $this->suhu,
            'kelembapan' => (float) $this->kelembapan,
            'created_at' => $this->created_at?->format('Y-m-d H:i:s'),
        ];
    }
}

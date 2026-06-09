<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    use HasFactory;

    protected $table = 'monitorings';

    protected $fillable = [
        'waktu',
        'suhu',
        'kelembapan',
    ];

    protected $casts = [
        'waktu'      => 'datetime',
        'suhu'       => 'decimal:2',
        'kelembapan' => 'decimal:2',
    ];

    /**
     * Scope: data hari ini
     */
    public function scopeToday($query)
    {
        return $query->whereDate('waktu', today());
    }
}

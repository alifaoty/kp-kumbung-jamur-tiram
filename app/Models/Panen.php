<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Panen extends Model
{
    use HasFactory;

    protected $table = 'panens';

    protected $fillable = [
        'siklus_id',
        'tanggal_panen',
        'jumlah_panen',
    ];

    protected $casts = [
        'tanggal_panen' => 'date',
        'jumlah_panen'  => 'integer',
        'siklus_id'     => 'integer',
    ];

    /**
     * Relasi: Panen milik satu Siklus
     */
    public function siklus(): BelongsTo
    {
        return $this->belongsTo(Siklus::class, 'siklus_id');
    }
}

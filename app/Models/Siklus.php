<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Siklus extends Model
{
    use HasFactory;

    protected $table = 'sikluses';

    protected $fillable = [
        'tanggal_mulai',
        'jumlah_backlog',
        'blok_tanam',
    ];

    protected $casts = [
        'tanggal_mulai'  => 'date',
        'jumlah_backlog' => 'integer',
    ];

    protected $appends = [
        'total_panen',
        'estimasi_panen',
        'durasi_tanam',
    ];

    /**
     * Relasi: Siklus memiliki banyak Panen
     */
    public function panen(): HasMany
    {
        return $this->hasMany(Panen::class, 'siklus_id');
    }

    /**
     * Total hasil panen dalam siklus ini
     */
    public function getTotalPanenAttribute(): int
    {
        return $this->panen()->sum('jumlah_panen');
    }

    /**
     * Estimasi panen: 22 hari setelah tanggal tanam
     */
    public function getEstimasiPanenAttribute(): ?string
    {
        if (!$this->tanggal_mulai) {
            return null;
        }

        return $this->tanggal_mulai->copy()->addDays(22)->format('Y-m-d');
    }

    /**
     * Durasi tanam: dari tanggal tanam hingga hari ini (maks 40 hari)
     */
    public function getDurasiTanamAttribute(): int
    {
        if (!$this->tanggal_mulai) {
            return 0;
        }

        $durasi = $this->tanggal_mulai->diffInDays(Carbon::today());

        return min((int) $durasi, 40);
    }
}

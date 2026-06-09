<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusKontrol extends Model
{
    use HasFactory;

    protected $table = 'status_kontrols';

    protected $fillable = [
        'waktu',
        'status',
    ];

    protected $casts = [
        'waktu' => 'datetime',
    ];
}

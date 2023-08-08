<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\SoalPilgan;

class PilihanGanda extends Model
{
    use HasFactory;

    protected $table = 'pilihan_gandas';

    protected $fillable = [
        'pilihan',
        'soal_pilgan_id',
    ];

    /**
     * Get the soalPilgans that owns the PilihanGanda
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function soalPilgans(): BelongsTo
    {
        return $this->belongsTo(SoalPilgan::class, 'soal_pilgan_id', 'id');
    }
}
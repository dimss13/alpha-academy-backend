<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\FreemiumBankSoal;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\PilihanGanda;

class SoalPilgan extends Model
{
    use HasFactory;

    protected $table = 'soal_pilgans';

    protected $fillable = [
        'deskripsi',
        'kunci_jawaban',
        'gambar',
        'freemium_bank_soal_id',
    ];

    /**
     * Get the freemiumBankSoals that owns the SoalPilgan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function freemiumBankSoals(): BelongsTo
    {
        return $this->belongsTo(FreemiumBankSoal::class, 'freemium_bank_soal_id', 'id');
    }

    /**
     * Get all of the pilihanGandas for the SoalPilgan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pilihanGandas(): HasMany
    {
        return $this->hasMany(PilihanGanda::class, 'soal_pilgan_id', 'id');
    }
}
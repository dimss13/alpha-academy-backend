<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\FreemiumBankSoal;

class SoalEssay extends Model
{
    use HasFactory;

    protected $table = 'soal_essays';

    protected $fillable = [
        'deskripsi',
        'kunci_jawaban',
        'gambar',
        'freemium_bank_soal_id',
    ];

    /**
     * Get the freemiumBankSoals that owns the SoalEssay
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function freemiumBankSoals(): BelongsTo
    {
        return $this->belongsTo(FreemiumBankSoal::class, 'freemium_bank_soal_id', 'id');
    }

}
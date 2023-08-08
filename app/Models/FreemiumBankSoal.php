<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Materi;
use App\Models\SoalEssay;

class FreemiumBankSoal extends Model
{
    use HasFactory;

    protected $table = 'freemium_bank_soals';

    protected $fillable = [
        'nama',
        'bidang_id',
        'tutor_id',
    ];

    /**
     * Get all of the soalEssays for the FreemiumBankSoal
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function soalEssays(): HasMany
    {
        return $this->hasMany(SoalEssay::class, 'freemium_bank_soal_id', 'id');
    }

    /**
     * Get all of the soalPilgans for the FreemiumBankSoal
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function soalPilgans(): HasMany
    {
        return $this->hasMany(SoalPilgan::class, 'freemium_bank_soal_id', 'id');
    }

    /**
     * Get the bidangs that owns the FreemiumBankSoal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bidangs(): BelongsTo
    {
        return $this->belongsTo(Bidang::class, 'bidang_id', 'id');
    }

    /**
     * Get the tutors that owns the FreemiumBankSoal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tutors(): BelongsTo
    {
        return $this->belongsTo(Tutor::class, 'tutor_id', 'id');
    }
}
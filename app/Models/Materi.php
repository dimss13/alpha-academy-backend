<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Bidang;
use App\Models\FreemiumBankSoal;
use App\Models\Bab;

class Materi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'content',
        'bidang_id',
        'tutor_id'
    ];

    /**
     * Get the bidangs that owns the Materi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bidangs(): BelongsTo
    {
        return $this->belongsTo(Bidang::class, 'bidang_id', 'id');
    }

    /**
     * Get all of the babs for the Materi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function babs(): HasMany
    {
        return $this->hasMany(Bab::class, 'materi_id', 'id');
    }

    /**
     * Get the tutors that owns the Materi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tutors(): BelongsTo
    {
        return $this->belongsTo(Tutor::class, 'tutor_id', 'id');
    }
}
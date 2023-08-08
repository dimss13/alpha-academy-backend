<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use App\Models\Materi;
use App\Models\SubBab;

class Bab extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul_bab',
        'materi_id',
    ];

    /**
     * Get the materis that owns the Bab
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function materis(): BelongsTo
    {
        return $this->belongsTo(Materi::class, 'materi_id', 'id');
    }

    /**
     * Get all of the subBabs for the Bab
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subBabs(): HasMany
    {
        return $this->hasMany(SubBab::class, 'bab_id', 'id');
    }
}
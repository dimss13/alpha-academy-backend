<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\TutorBidang;
use App\Models\Materi;

class Bidang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama'
    ];

    /**
     * The bidangTutors that belong to the Bidang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function bidangTutors(): BelongsToMany
    {
        return $this->belongsToMany(Tutor::class, 'tutor_bidangs', 'bidang_id', 'tutor_id');
    }
    /**
     * Get all of the materis for the Bidang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materis(): HasMany
    {
        return $this->hasMany(Materi::class, 'bidang_id', 'id');
    }
}
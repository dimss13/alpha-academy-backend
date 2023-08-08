<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Bab;

class SubBab extends Model
{
    use HasFactory;

    protected $table = 'sub_babs';

    protected $fillable = [
        'judul_sub_bab',
        'bab_id',
    ];

    /**
     * Get the babs that owns the SubBab
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function babs(): BelongsTo
    {
        return $this->belongsTo(Bab::class, 'bab_id', 'id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tutor;
use App\Models\Bidang;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class TutorBidang extends Model
{
    use HasFactory;

    protected $table = 'tutor_bidangs';

    protected $fillable = [
        'tutor_id',
        'bidang_id',
    ];

    public function tutors(): BelongsTo
    {
        return $this->belongsTo(Tutor::class, 'tutor_id', 'id');
    }

    public function bidangs(): BelongsTo
    {
        return $this->belongsTo(Bidang::class, 'bidang_id', 'id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Tutor;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class TutorUser extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $table = 'tutor_users';

    protected $fillable = [
        'tutor_id',
        'user_id',
    ];


    /**
     * Get the user that owns the TutorUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the tutor that owns the TutorUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tutors(): BelongsTo
    {
        return $this->belongsTo(Tutor::class, 'tutor_id', 'id');
    }


}
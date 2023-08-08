<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Status;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\TutorUser;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = [
        'nama',
        'email',
        'no_telepon',
        'asal_sekolah',
        'asal_provinsi',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the Status that owns the Status
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statuses(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }

    /**
     * The userTutors that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function userTutors(): BelongsToMany
    {
        return $this->belongsToMany(Tutor::class, 'tutor_users', 'user_id', 'tutor_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\TutorBidang;
use App\Models\TutorUser;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Tutor extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = [
        'nama',
        'deskripsi',
        'email',
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
     * The tutorBidangs that belong to the Tutor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tutorBidangs(): BelongsToMany
    {
        return $this->belongsToMany(Bidang::class, 'tutor_bidangs', 'tutor_id', 'bidang_id');
    }
   
    /**
     * The tutorUsers that belong to the Tutor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tutorUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'tutor_users', 'tutor_id', 'user_id');
    }

    /**
     * Get all of the freemiumBankSoals for the Tutor
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function freemiumBankSoals(): HasMany
    {
        return $this->hasMany(FreemiumBankSoal::class, 'tutor_id', 'id');
    }
}
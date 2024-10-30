<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\GeneratesUuid;

class User extends Authenticatable
{
    use HasFactory, Notifiable, GeneratesUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'nick_name',
        'email',
        'password',
        'role_id',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role()
    {
        return $this->belongsTo(M_role::class, 'role_id', 'id');
    }

    public function companies()
    {
        return $this->hasMany(M_company::class, 'user_id', 'id');
    }

    public function locations()
    {
        return $this->hasMany(M_location::class, 'user_id', 'id');
    }

    public function vacancies()
    {
        return $this->hasMany(M_vacancy::class, 'user_id', 'id');
    }
}

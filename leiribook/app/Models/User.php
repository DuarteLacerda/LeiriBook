<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'foto',
        'role',
    ];

    public function roleToStr()
    {
        switch ($this->role) {
            case 'N':
                return 'Normal';
            case 'A':
                return 'Admin';
        }
    }
    public function isAdmin()
    {
        return $this->role == 'A';
    }

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


    public function user()
    {
        return $this->HasMany(Avaliacao::class, 'user_id', 'id');
    }
    public function interesses()
    {
        return $this->belongsToMany(Livro::class, 'interesses', 'user_id', 'livro_id');
    }
}

<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Contracts\Role;

class User extends Authenticatable
{
    use HasFactory, Notifiable,HasRoles;


    protected $keyType = 'string';
    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($user) {
            if (!$user->id) {
                $user->id = (string) Str::uuid();
            }
        });
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'nom',
        'prenom',
        'identifiant',
        'matricule',
        'profession_id',
        'service_id',
        'isadmin',
        'sexe',
        'profil'
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

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function profession()
    {
        return $this->belongsTo(Profession::class);

    } 
}

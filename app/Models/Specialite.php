<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['nom'];

    public $timestamps = true;
    
    protected static function booted()
    {
        static::creating(function ($specialites) {
            $specialites->id = (string) Str::uuid();
        });
    }

    public function users()
    {
        return $this->hasMany(User::class, 'specialite_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class SpecialiteMedecin extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['nom'];

    public $timestamps = true;
    
    protected static function booted()
    {
        static::creating(function ($specialite_medecins) {
            $specialite_medecins->id = (string) Str::uuid();
        });
    }
}

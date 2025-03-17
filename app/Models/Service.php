<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    protected $keyType = 'string';
    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($service) {
            if (!$service->id) {
                $service->id = (string) Str::uuid();
            }
        });
    }

    public function scopeFilter($query, $search)
    {
        return $query->whereRaw('LOWER(nom) LIKE ?', ["%" . strtolower($search) . "%"]);
    }
}

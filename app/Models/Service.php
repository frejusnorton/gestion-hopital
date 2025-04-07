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
    protected $fillable = ['id', 'name']; 

    public static function filter($search = '', $statut = null)
    {
        $query = self::orderBy('name', 'asc');
    
        if (!empty($search)) {
            $query->where(function ($query) use ($search) {
                $terms = explode(' ', $search);
                foreach ($terms as $term) {
                    if (trim($term)) {
                        $query->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower(trim($term)) . '%'])
                              ;
                    }
                }
            });
        }
    
        return $query;
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
    
}

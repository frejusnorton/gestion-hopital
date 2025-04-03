<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profession extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['id', 'name', 'categorie'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($profession) {
            $profession->id = (string) Str::uuid();
        });
    }

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
    
    
    
}


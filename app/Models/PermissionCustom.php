<?php

namespace App\Models;

use Spatie\Permission\Models\Permission;

class PermissionCustom extends Permission
{
    public function scopeFilter($query, $search)
    {
        return $query->whereRaw('LOWER(name) LIKE ?', ["%" . strtolower($search) . "%"]);
    }
}

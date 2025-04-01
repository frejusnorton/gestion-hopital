<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;

class RoleCustom extends SpatieRole
{

      public function scopeFilter($query, $search)
    {
        return $query->whereRaw('LOWER(name) LIKE ?', ["%" . strtolower($search) . "%"]);
    }
}

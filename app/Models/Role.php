<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Role extends SpatieRole
{
    use HasUuids;

    protected $table = 'roles';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
}

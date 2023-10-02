<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as SpatieRole;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends SpatieRole
{
    use HasFactory;

    private static array $whiteListFilter=["*"];

    public $guard_name = 'web';

    // public function permissions(): BelongsToMany
    // {
    //     return $this->belongsToMany(Permission::class);
    // }

    // public function users(): BelongsToMany
    // {
    //     return $this->belongsToMany(User::class);
    // }
}

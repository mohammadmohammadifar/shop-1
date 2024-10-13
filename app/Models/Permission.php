<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Permission\Traits\HasRoles;

class Permission extends Model
{
    use HasFactory, HasRoles;

    protected $guarded = [];

    // protected $guard_name = 'api';

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}

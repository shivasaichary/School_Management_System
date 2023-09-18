<?php

namespace App\Models;

use App\Models\Cls;
use App\Models\City;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class School extends Model
{
    use HasFactory;

    protected $fillable = ['city_id',  'name', 'address'];

    public function principal(): BelongsTo
    {
        return $this->belongsTo(User::class, 'principal_id');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function cls()
    {
        return $this->hasMany(Cls::class);
    }

    public function classes()
    {
        return $this->hasMany(Cls::class);
    }
}

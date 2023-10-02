<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['gender','phone_number','email','address','student_code', 'student_name', 'age'];

    public function cls(): BelongsTo
    {
        return $this->belongsTo(Cls::class);
    }

    public function parents()
    {
        return $this->hasMany(Parent::class);
    }

}

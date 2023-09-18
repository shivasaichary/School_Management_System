<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['class_id','student_id', 'name', 'age'];

    public function cls(): BelongsTo
    {
        return $this->belongsTo(Cls::class);
    }

}

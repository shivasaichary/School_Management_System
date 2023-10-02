<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    use HasFactory;

    protected $fillable =['parent_name','age','gender','phone_number','email','address'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}

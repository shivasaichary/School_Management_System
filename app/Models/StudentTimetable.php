<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentTimetable extends Model
{
    use HasFactory;

    protected $table = 'student_timetables';

    protected $fillable = [
        'student_code',
        'day_of_week',
        'start_time',
        'end_time',
        'subject_name',
        'instructor',
        'classroom',
    ];

}

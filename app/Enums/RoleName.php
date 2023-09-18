<?php

namespace App\Enums;

enum RoleName: string
{
    case ADMIN    = 'admin';
    case TEACHER  = 'teacher';
    case STUDENT  = 'student';
    case PARENT   = 'parent';
}

<?php

namespace App\Enums;

enum UserRole: string
{
    case Learner = 'Learner';
    case Instructor = 'Instructor';
    case Admin = 'Admin';
}

<?php
namespace App\Mappers;

use App\Models\Classroom;
use App\Models\Instructor;

use App\Repositories\ClassRepository;
use App\Repositories\InstructorRepository;

class ClassMapper {
    public static function ArraysToObjs(array $classes): array {
        return array_map(function($class) {
            $class['students_count']  = ClassRepository::countClassLeaners($class['id']);
            $class['instructors'] = ClassRepository::getClassInstructors($class['id'] );
            return new Classroom($class);
        }, $classes);
    }

    public static function ArrayToObj(array $class): Classroom
    {
        $class['instructors'] = array_map(
            fn($instructor) => new Instructor($instructor),
            $class['instructors']
        );
        return new Classroom($class);
    }


}
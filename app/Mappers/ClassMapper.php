<?php
namespace App\Mappers;

use App\Models\Classroom;
use App\Repositories\ClassRepository;
use App\Repositories\InstructorRepository;

class ClassMapper {
    public static function mapArrayToObj(array $classes): array {
        return array_map(function($class) {
            $class['students_count']  = ClassRepository::countStudentsInClass($class['id']);
            $class['instructors'] = InstructorRepository::getClassInstructors($class['id'] );
            return new Classroom($class);
        }, $classes);
    }

    public static function mapToObj(array $class): Classroom
    {
        $class['instructors'] = array_map(
            fn($instructor) => new Instructor($instructor),
            $class['instructors']
        );
        return new Classroom($class);
    }
}
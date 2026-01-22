<?php
namespace App\Mappers;

use App\Models\Classroom;
use App\Repositories\ClassRepository;
use App\Repositories\UserRepository;

class ClassMapper {
    public static function mapArrayToObj(array $classes): array {
        return array_map(function($class) {
            $class['students_count']  = ClassRepository::countStudentsInClass($class['id']);
            $class['instructors'] = UserRepository::getClassInstractors($class['id'] );
            return new Classroom($class);
        }, $classes);
    }
}
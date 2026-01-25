<?php
namespace App\Mappers;

use App\Models\Instructor;

class InstructorMapper {
    

    public static function ArraysToObjs(array $instructors): array {
        return array_map(function($instructor) {
            return new Instructor($instructor);
        }, $instructors);
    }

    public static function mapToObj(array $instructor): Instructor
    {
        return new Instructor($instructor);
    }

}
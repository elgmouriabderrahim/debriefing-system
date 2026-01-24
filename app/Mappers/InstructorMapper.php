<?php
namespace App\Mappers;

use App\Models\Instructor;

class InstructorMapper {
    
    public static function mapToInstructorsArray(array $instructors): array {
        return array_map(function($instructors) {
            return new Instructor($instructors);
        }, $instructors);
    }

    public static function mapToObj(array $instructor): Instructor
    {
        return new Instructor($instructor);
    }

}
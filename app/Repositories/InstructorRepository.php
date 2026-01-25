<?php
namespace App\Repositories;
use App\Daos\InstructorDao;
use App\Mappers\InstructorMapper;
use App\Mappers\ClassMapper;

use App\Models\Instructor;

class InstructorRepository {

    public static function countAll(): int {
        return InstructorDao::countAllInstructors();
    }


    public static function getById($instructorId): ?Instructor
    {
        $instructor =  InstructorDao::getById($instructorId);

        if(!$instructor)
            return null;
        return InstructorMapper::mapToObj($instructor);
    }

    public static function assignClass(int $classId,int $instructorId)
    {
        InstructorDao::assignClass($classId, $instructorId);
    }

    public static function getInstructorClasses($instructorId): array
    {
        $classes = InstructorDao::getInstructorClasses($instructorId);
        if(empty($classes))
            return [];
        return ClassMapper::arraysToObjs($classes);
    }
}
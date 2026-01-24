<?php
namespace App\Repositories;
use App\Daos\InstructorDao;
use App\Mappers\InstructorMapper;
use App\Models\Instructor;

class InstructorRepository {

    public static function countAll(): int {
        return InstructorDao::countAllInstructors();
    }

    public static function getClassInstructors(int $classId): array {
        $instructors = InstructorDao::getClassInstructors($classId);
        if (empty($instructors))
            return [];
        return InstructorMapper::mapToInstructorsArray($instructors);
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
}
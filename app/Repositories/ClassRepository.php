<?php
namespace App\Repositories;

use App\Daos\ClassDao;
use App\Mappers\ClassMapper;
use App\Models\Classroom;

use App\Mappers\InstructorMapper;
use App\Mappers\LearnerMapper;


class ClassRepository {

    public static function countAll(): int {
        return ClassDao::countAll();
    }

    public static function getAll(): array {
        $classes = ClassDao::getAll();
        if (empty($classes)) {
            return [];
        }
        return ClassMapper::ArraysToObjs($classes);
    }
    
    public static function countClassLeaners(int $classId): int {
        return ClassDao::countStudentsInClass($classId);
    }

    public static function create(array $inputData): void {
        ClassDao::create($inputData);
    }

    public static function getById(int $id): ?Classroom
    {
        $classroom = ClassDao::getById($id);
        if (!$classroom) {
            return null;
        }
        return ClassMapper::ArrayToObj($classroom);
    }

    public static function delete(int $id): void
    {
        ClassDao::delete($id);
    }


    public static function getClassLearners(int $classId): array
    {
        $learners = ClassDao::getClassLearners($classId);
        return LearnerMapper::ArraysToObjs($learners);
    }
    public static function getClassInstructors(int $classId): array
    {
        $instructors = ClassDao::getClassInstructors($classId);
        return InstructorMapper::ArraysToObjs($instructors);
    }
}
<?php
namespace App\Repositories;
use App\Daos\InstractorDao;
use App\Mappers\InstractorMapper;
use App\Models\Instractor;

class InstractorRepository {

    public static function countAll(): int {
        return InstractorDao::countAllInstructors();
    }

    public static function getClassInstractors(int $classId): array {
        $instructors = InstractorDao::getClassInstructors($classId);
        if (empty($instructors))
            return [];
        return InstractorMapper::mapToInstractorsArray($instructors);
    }
}
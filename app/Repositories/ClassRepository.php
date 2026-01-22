<?php
namespace App\Repositories;

use App\Daos\ClassDao;
use App\Mappers\ClassMapper;

class ClassRepository {

    public static function countAll(): int {
        return ClassDao::countAll();
    }
    public static function getAll(): array {
        $classes = ClassDao::getAll();
        if (empty($classes)) {
            return [];
        }
        return ClassMapper::maparrayToObj($classes);
    }
    public static function countStudentsInClass(int $classId): int {
        return ClassDao::countStudentsInClass($classId);
    }
    
}
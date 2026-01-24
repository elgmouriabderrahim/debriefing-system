<?php
namespace App\Services;
use App\Repositories\ClassRepository;
use App\Helpers\Helpers;

class ClassService {
    private static ?ClassService $instance = null;
    private function __construct() {}
    public static function getInstance(): ClassService {
        if (self::$instance === null) {
            self::$instance = new ClassService();
        }
        return self::$instance;
    }

    public function geClassesCount(): int {
        return ClassRepository::countAll();
    }

    public function getAll(): array {
        return ClassRepository::getAll();
    }
    public function create(array $inputData): array
    {
        $errors = [];

        $errors += Helpers::validateClassName($inputData['name']);
        $errors += Helpers::validateClassYear($inputData['promotionYear']);
        if(empty($errors))
            ClassRepository::create($inputData);
        return $errors;
    }

    public function getById(int $id)
    {
        return ClassRepository::findById($id);
    }

    public function delete(int $id): void
    {
        ClassRepository::delete($id);
    }

    public function getClassLearners(int $classId): array
    {
        return ClassRepository::getClassLearners($classId);
    }

    public function getClassInstructors(int $classId): array
    {
        return ClassRepository::getClassInstructors($classId);
    }
}
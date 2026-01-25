<?php
namespace App\Services;
use App\Repositories\SprintRepository;
use App\Helpers\Helpers;

class SprintService {
    private static ?SprintService $instance = null;
    private function __construct() {}
    public static function getInstance(): SprintService {
        if (self::$instance === null) {
            self::$instance = new SprintService();
        }
        return self::$instance;
    }

    public function getSprintsCount(): int {
        return SprintRepository::countAll();
    }
    public function getAll(): array {
        return SprintRepository::findAll();
    }
    public function create(array $data): array
    {
        $errors = [];
        $errors = Helpers::validateSprintInputs($data);
        if(empty($errors))
            Sprintrepository::create($data);
        return $errors;
    }

    public function getById(int $id)
    {
        return SprintRepository::getById($id);
    }
    public function deleteSprint(int $sprintId): void
    {
        SprintRepository::delete($sprintId);
    }

    public function assignToClasses(int $sprintId, array $classIds)
    {
        SprintRepository::removeAllAssignments($sprintId);

        foreach ($classIds as $classId) {
            SprintRepository::assignToClass($sprintId, (int)$classId);
        }
    }

    public function getAssignedClassIds(int $sprintId): array
    {
        return SprintRepository::getAssignedClassIds($sprintId);
    }
}
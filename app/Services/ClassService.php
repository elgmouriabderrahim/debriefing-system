<?php
namespace App\Services;
use App\Repositories\ClassRepository;

class ClassService {

    public function getTotalClasses(): int {
        
        return ClassRepository::countAll();
    }

    public function getRecentClasses(int $limit): array {
        // Logic to retrieve recent classes
        return []; // Placeholder
    }
}
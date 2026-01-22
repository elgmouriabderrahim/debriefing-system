<?php
namespace App\Services;
use App\Repositories\SprintRepository;

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
}
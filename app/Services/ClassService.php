<?php
namespace App\Services;
use App\Repositories\ClassRepository;

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
}
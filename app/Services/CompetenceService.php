<?php
namespace App\Services;

use App\Repositories\CompetenceRepository;

class CompetenceService {
    private static ?CompetenceService $instance = null;

    private function __construct() {}

    public static function getInstance(): CompetenceService {
        if (self::$instance === null) {
            self::$instance = new CompetenceService();
        }
        return self::$instance;
    }

    public function getall(): array {
        return CompetenceRepository::findAll();
    }
}   
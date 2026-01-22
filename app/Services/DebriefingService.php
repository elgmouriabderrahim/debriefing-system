<?php
namespace App\Services;
use App\Repositories\DebriefingRepository;

class DebriefingService {
    private static ?DebriefingService $instance = null;
    private function __construct() {}
    public static function getInstance(): DebriefingService {
        if (self::$instance === null) {
            self::$instance = new DebriefingService();
        }
        return self::$instance;
    }

    public function getAllDebriefings(): array {
        return DebriefingRepository::getAllDebriefings();
    }
}
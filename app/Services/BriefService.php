<?php
namespace App\Services;
use App\Repositories\BriefRepository;

class BriefService {
    private static ?BriefService $instance = null;
    private function __construct() {}
    public static function getInstance(): BriefService {
        if (self::$instance === null) {
            self::$instance = new BriefService();
        }
        return self::$instance;
    }

    public function getTotalBriefs(): int {
        return BriefRepository::countAll();
    }

    public function getRecentBriefs(int $limit = 5): array {
        return BriefRepository::getRecentBriefs($limit);
    }
}
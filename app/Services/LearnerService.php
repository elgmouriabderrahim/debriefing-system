<?php
namespace App\Services;
use App\Repositories\LearnerRepository;

class LearnerService {
    private static ?LearnerService $instance = null;
    private function __construct() {}
    public static function getInstance(): LearnerService {
        if (self::$instance === null) {
            self::$instance = new LearnerService();
        }
        return self::$instance;
    }

    public function getLearnersCount(): int {
        return LearnerRepository::countAllLearners();
    }

}
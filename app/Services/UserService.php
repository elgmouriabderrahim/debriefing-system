<?php
namespace App\Services;
use App\Repositories\UserRepository;

class UserService {
    private static ?UserService $instance = null;
    private function __construct() {}
    public static function getInstance(): UserService {
        if (self::$instance === null) {
            self::$instance = new UserService();
        }
        return self::$instance;
    }

    public function getUsersCount(): int {
        return UserRepository::countAll();
    }
    public function getLearnersCount(): int {
        return UserRepository::countAllLearners();
    }

    public function getInstructorsCount(): int {
        return UserRepository::countAllInstructors();
    }

    public function getRecentUserActivity(int $limit): array {
        return UserRepository::getRecentUserActivity($limit);
    }

    public function getAll(): array {
        return UserRepository::getAll();
    }
    
}
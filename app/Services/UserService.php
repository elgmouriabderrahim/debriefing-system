<?php
namespace App\Services;
use App\Repositories\UserRepository;

class UserService {

    public function getTotalUsers(): int {
        return UserRepository::countAll();
    }
    public function getTotalLearners(): int {
        return UserRepository::countAllLearners();
    }

    public function getTotalInstructors(): int {
        return UserRepository::countAllInstructors();
    }

    public function getRecentUserActivity(int $limit): array {
        return UserRepository::getRecentUserActivity($limit);
    }
    
}
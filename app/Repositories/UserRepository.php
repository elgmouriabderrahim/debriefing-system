<?php
namespace App\Repositories;
use App\Daos\UserDao;
use App\Mappers\UserMapper;
use App\Models\User;

class UserRepository {

    public static function countAll(): int {
        return UserDao::countAll();
    }
    public static function countAllLearners(): int {
        return UserDao::countAllLearners();
    }
    public static function countAllInstructors(): int {
        return UserDao::countAllInstructors();
    }
    public static function getById(int $id): ?User {
        $user =  UserDao::getById($id);
        return UserMapper::mapArrayToObj($user);
    }
    public static function getRecentUserActivity(int $limit): array {
        return UserDao::getRecentUserActivity($limit);
    }
    
}
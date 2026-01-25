<?php
namespace App\Repositories;
use App\Daos\UserDao;
use App\Mappers\UserMapper;
use App\Models\User;

class UserRepository {

    public static function countAll(): int {
        return UserDao::countAll();
    }

    public static function getById(int $id): ?User {
        $user =  UserDao::getById($id);
        if(!user)
            return null;
        return UserMapper::mapArrayToObj($user);
    }

    public static function getRecentUserActivity(int $limit): array {
        return UserDao::getRecentUserActivity($limit);
    }


    public static function getAll(): array {
        $users = UserDao::getAll();
        if (empty($users))
            return [];
        return UserMapper::arraysToObjs($users);
    }
    
    public static function addUser($inputData){
        return UserDao::addUser($inputData);
    }

    public static function isEmailExists(string $email): bool {
        return UserDao::isEmailExists($email);
    }

    public static function deleteUser(int $id): void {
        UserDao::deleteUser($id);
    }
}
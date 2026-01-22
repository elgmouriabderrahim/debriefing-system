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

    public static function getClassInstractors(int $classId): array {
        $instructors = UserDao::getClassInstructors($classId);
        if (empty($instructors))
            return [];
        return UserMapper::mapToInstractorsArray($instructors);
    }
    public static function getAll(): array {
        $users = UserDao::getAll();
        if (empty($users))
            return [];
        return UserMapper::mapToUsersArray($users);
    }
    public static function addUser($inputData){
        return UserDao::addUser($inputData);
    }
    public static function isEmailExists(string $email): bool {
        return UserDao::isEmailExists($email);
    }
}
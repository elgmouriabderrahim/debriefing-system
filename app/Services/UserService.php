<?php
namespace App\Services;
use App\Repositories\UserRepository;
use App\Helpers\Helpers;

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
    public function addUser($inputData){
        $errors = [];
        
        $errors = [
            ...Helpers::ValidateName($inputData['firstName'], 'firstName'),
            ...Helpers::ValidateName($inputData['lastName'], 'lastName'),
            ...Helpers::ValidateEmail($inputData['email']),
            ...Helpers::ValidatePassword($inputData['password'], $inputData['cpassword']),
            ...Helpers::ValidateRole($inputData['role'])
        ];
        if(UserRepository::isEmailExists($inputData['email']))
            $errors = array_merge($errors, ['email' => 'email already exist choose another email']);

        if(empty($errors))
            UserRepository::addUser($inputData);
        return $errors;
    }

    public function deleteUser(int $id): void {
        UserRepository::deleteUser($id);
    }
}
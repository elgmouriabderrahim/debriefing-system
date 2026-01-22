<?php
namespace App\Mappers;

class UserMapper {
    public static function mapArrayToObj(array $user): User {
        if (!$user) {
            return null;
        }
        return new User($user);
    }
}
<?php
namespace App\Mappers;

use App\Models\Instructor;
use App\Models\Learner;
use App\Models\Admin;

class UserMapper {
    public static function mapArrayToObj(array $user): User {
        if (!$user)
            return null;

        if($user['role'] === 'Instructor') {
            return new Instructor($user);
        }elseif($user['role'] === 'Learner') {
            return new Learner($user);
        }else{
            return new Admin($user);
        }
    }

    public static function mapToUsersArray(array $users): array {
        return array_map(function($user) {
            return self::mapArrayToObj($user);
        }, $users);
    }
}
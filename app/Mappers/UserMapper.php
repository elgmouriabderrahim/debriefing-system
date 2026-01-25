<?php
namespace App\Mappers;

use App\Models\Instructor;
use App\Models\Learner;
use App\Models\Admin;
use App\Models\User;

use App\Repositories\ClassRepository;
use App\Repositories\InstructorRepository;

class UserMapper {
    public static function arrayToObj(array $user): User {

        if($user['role'] === 'Instructor') {
            $user['classrooms'] = InstructorRepository::getInstructorClasses((int) $user['id']);
            return new Instructor($user);
        }elseif($user['role'] === 'Learner') {
            $user['classroom'] = ClassRepository::getById((int) $user['class_id']);
            return new Learner($user);
        }else{
            return new Admin($user);
        }
    }

    public static function arraysToObjs(array $users): array {
        return array_map(function($user) {
            return self::arrayToObj($user);
        }, $users);
    }
}
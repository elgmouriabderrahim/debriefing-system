<?php
namespace App\Services;
use App\Repositories\AuthRepository;
use App\Repositories\UserRepository;

use App\Helpers\Helpers;

class AuthService {

    public function logIn(string $email, string $password): array
    {
        $errors = Helpers::ValidateEmail($email);
        if($password === '')
            $errors['password'] = 'Please enter your password';
        if(empty($errors))
        {
            $user = UserRepository::getByEmail($email);
            if(!$user)
                $errors['info'] = 'Email or password is not correct';
            elseif($user->verifyPassword($password))
            {
                $_SESSION['userId'] = $user->getId();
                $_SESSION['fullName'] = $user->getFullName();
                $_SESSION['userRole'] = $user->getRole()->value;
            }else
                $errors['info'] = 'Email or password is not correct';
        }
        return $errors;
    }

    public function logOut(): void
    {
        session_unset();
        session_destroy();
    }
}
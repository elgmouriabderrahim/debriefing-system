<?php
namespace App\Controllers;

use App\Middlewears\Auth;

use App\Core\BaseController;
use App\Services\AuthService;

class AuthController extends BaseController{

    public function showLogIn() {
        Auth::guestOnly();
        echo $this->render('pages.login');
    }
    public function logIn() {
        Auth::guestOnly();
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $old['email'] = $email;
        $old['password'] = $password;

        $authService = new AuthService();
        $errors = $authService->logIn($email, $password);
        if(empty($errors))
        {
            header("location: /");
            exit;
        }
        echo $this->render(
                'pages.login',
                compact('errors', 'old')
        );
    }

    public function logOut() {
        $authService = new AuthService();
        $authService->logOut();
        header('location: /login');
        exit;
    }
}
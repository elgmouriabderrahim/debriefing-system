<?php
namespace App\Controllers;
use App\Core\BaseController;
use App\Services\UserService;

class AdminUsersController extends BaseController{

    public function index() {
        $userService = UserService::getInstance();
        $users = $userService->getAll();
        echo $this->render(
                'admin.users.index',
                compact('users')
            );
    }
    public function addUser() {
        echo $this->render(
                'admin.users.add',
                []
            );
    }
}
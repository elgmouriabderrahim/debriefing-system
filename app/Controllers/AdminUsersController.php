<?php
namespace App\Controllers;
use App\Core\BaseController;
class AdminUsersController extends BaseController{

    public function index() {
        $users = [];

        echo $this->render(
                'admin.users.index',
                compact('users')
            );
    }
}
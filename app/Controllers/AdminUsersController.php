<?php
namespace App\Controllers;

use App\Middlewears\Auth;
Auth::AdminOnly();

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
    public function showAddForm() {
        echo $this->render(
                'admin.users.add',
                []
            );
    }
    public function addUser(){
        $inputData['firstName'] = $_POST['firstName'] ?? '';
        $inputData['lastName'] = $_POST['lastName'] ?? '';
        $inputData['email'] = $_POST['email'] ?? '';
        $inputData['password'] = $_POST['password'] ?? '';
        $inputData['cpassword'] = $_POST['cpassword'] ?? '';
        $inputData['role'] = $_POST['role'] ?? '';
        
        $userService = UserService::getInstance();
        $success = null;
        $errors = $userService->addUser($inputData);
        if(empty($errors)){
            $success = 'the user is regestered succesfully';
            $inputData = [];
        }
        echo $this->render(
                'admin.users.add',
                compact('errors', 'inputData', 'success')
            );
    }
    public function deleteUser(){
        $userId = $_GET['user_id'];
        if(!$userId){
            die('user id missing');
            exit;
        }
        $userService = UserService::getInstance();
        $userService->deleteUser($userId);
        header("location: /admin/users");
    }
    
}
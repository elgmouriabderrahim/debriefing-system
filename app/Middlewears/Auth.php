<?php
namespace App\Middlewears;
class Auth {
    public static function usersOnly(){
        if(!isset($_SESSION['user_id'])){
            header("location: /");
            exit;
        }
    }
    public static function AdminOnly(){
        if(!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== "Admin"){
            header("location: /");
            exit;
        }
    }
    public static function instructorOnly(){
        if(!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== "Instructor"){
            header("location: /");
            exit;
        }
    }
    public static function learnerOnly(){
        if(!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== "Learner"){
            header("location: /");
            exit;
        }
    }
}
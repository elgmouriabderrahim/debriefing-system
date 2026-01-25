<?php
namespace App\Middlewears;
class Auth {
    public static function guestOnly(){
        if(isset($_SESSION['userId'])){
            header("location: /");
            exit;
        }
    }
    public static function adminOnly(){
        if(!isset($_SESSION['userId']) || $_SESSION['userRole'] !== "Admin"){
            header("location: /login");
            exit;
        }
    }
    public static function instructorOnly(){
        if(!isset($_SESSION['userId']) || $_SESSION['userRole'] !== "Instructor"){
            header("location: /");
            exit;
        }
    }
    public static function learnerOnly(){
        if(!isset($_SESSION['userId']) || $_SESSION['userRole'] !== "Learner"){
            header("location: /");
            exit;
        }
    }
}
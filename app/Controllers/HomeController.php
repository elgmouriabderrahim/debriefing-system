<?php
namespace App\Controllers;
use App\Core\BaseController;
class HomeController extends BaseController{

    public function index() {
        echo $this->render('home', ['title' => 'Welcome', 'name' => 'abderrahim' , 'content' => 'this is the content']);
    }
}
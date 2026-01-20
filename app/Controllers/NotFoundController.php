<?php
namespace App\Controllers;
use App\Core\BaseController;
class NotFoundController extends BaseController{

    public function index() {
        echo $this->render('NotFound', ['title' => '404 Not Found']);
    }
}
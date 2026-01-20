<?php
namespace App\Controllers;
use App\Core\BaseController;
class AdminClassesController extends BaseController{

    public function index() {
        $classes = [];

        echo $this->render(
                'admin.classes.index',
                compact('classes')
            );
    }
}
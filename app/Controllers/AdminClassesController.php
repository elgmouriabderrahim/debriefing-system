<?php
namespace App\Controllers;

use App\Core\BaseController;

use App\Services\ClassService;

class AdminClassesController extends BaseController{

    public function index() {
        $classService = ClassService::getInstance();
        $classes = $classService->getAll();

        echo $this->render(
                'admin.classes.index',
                compact('classes')
            );
    }
}
<?php
namespace App\Controllers;
use App\Core\BaseController;
class AdminSprintsController extends BaseController{

    public function index() {
        $sprints = [];

        echo $this->render(
                'admin.sprints.index',
                compact('sprints')
            );
    }
}
<?php
namespace App\Controllers;
use App\Core\BaseController;
use App\Services\SprintService;

class AdminSprintsController extends BaseController{

    public function index() {
        $sprintService = SprintService::getInstance();
        $sprints = $sprintService->getAll();

        echo $this->render(
                'admin.sprints.index',
                compact('sprints')
            );
    }
}
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
    public function create()
    {
        echo $this->render('admin.sprints.create');
    }

    public function store()
    {
        $inputData = [
            'name' => $_POST['name'] ?? '',
            'duration_days' => (int) ($_POST['duration_days'] ?? 0),
            'sprint_order' => (int) ($_POST['sprint_order'] ?? 0),
        ];

        $sprintService = SprintService::getInstance();
        $errors = $sprintService->create($inputData);

        if(!empty($errors))
            echo $this->render('admin.sprints.create', compact('errors', 'inputData'));

        header('Location: /admin/sprints');
        exit;
    }

    public function delete()
    {
        $sprintId = (int) $_POST['sprint_id'];

        $sprintService = SprintService::getInstance();
        $sprintService->deleteSprint($sprintId);

        header('Location: /admin/sprints');
        exit;
    }
}
<?php
namespace App\Controllers;
use App\Core\BaseController;
use App\Services\CompetenceService;

class AdminCompetencesController extends BaseController{

    public function index() {
        $competenceService = CompetenceService::getInstance();

        $competences = $competenceService->getall();

        echo $this->render(
                'admin.competences.index',
                compact('competences')
            );
    }

    public function create()
    {
        echo $this->render('admin.competences.create');
    }

    public function store()
    {
        $inputData = $_POST;

        $errors = CompetenceService::create($inputData);
        if (empty($errors)) {
            header('Location: /admin/competences');
            exit;
        }

        echo $this->render('admin.competences.create', [
            'errors' => $errors,
            'inputData' => $inputData
        ]);
    }

    public function delete()
    {
        $competenceId = (int) ($_POST['competenceId'] ?? 0);

        CompetenceService::delete($competenceId);
        
        header('Location: /admin/competences');
        exit;
    }
}
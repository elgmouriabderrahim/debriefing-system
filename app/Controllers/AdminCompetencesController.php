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
}
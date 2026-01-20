<?php
namespace App\Controllers;
use App\Core\BaseController;
class AdminCompetencesController extends BaseController{

    public function index() {
        $competences = [];

        echo $this->render(
                'admin.competences.index',
                compact('competences')
            );
    }
}
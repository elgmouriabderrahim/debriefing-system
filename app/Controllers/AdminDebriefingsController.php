<?php
namespace App\Controllers;
use App\Core\BaseController;
class AdminDebriefingsController extends BaseController{

    public function index() {
        $debriefings = [];

        echo $this->render(
                'admin.debriefings',
                compact('debriefings')
            );
    }
}
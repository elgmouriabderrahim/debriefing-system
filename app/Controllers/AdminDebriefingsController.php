<?php
namespace App\Controllers;
use App\Core\BaseController;

use App\Middlewears\Auth;
Auth::AdminOnly();

use App\Services\DebriefingService;

class AdminDebriefingsController extends BaseController{

    public function index() {
        $debriefingService = DebriefingService::getInstance();
        $debriefings = $debriefingService->getAllDebriefings();

        echo $this->render(
                'admin.debriefings',
                compact('debriefings')
            );
    }
}
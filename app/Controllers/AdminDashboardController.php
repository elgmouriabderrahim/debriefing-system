<?php
namespace App\Controllers;
use App\Core\BaseController;
class AdminDashboardController extends BaseController{

    public function index() {
        $sprintsCount  = 4;
        $classesCount  = 4;
        $usersCount    = 4;
        $recentBriefs = [];
        $recentActivity = [];
        echo $this->render(
            'admin.dashboard',
            ['title' => 'debriefing-system - dashboard',
            'totalSprints' => $sprintsCount,
            'totalClasses' => $classesCount,
            'recentBriefs' => $recentBriefs,
            'recentActivity' => $recentActivity,
            'totalUsers' => $usersCount]);
    }
}
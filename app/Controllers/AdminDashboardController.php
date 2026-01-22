<?php
namespace App\Controllers;

use App\Core\BaseController;

use App\Services\ClassService;
use App\Services\UserService;
use App\Services\SprintService;
use App\Services\BriefService;


class AdminDashboardController extends BaseController{

    public function index() {
        $userService = new UserService();
        $classService = new ClassService();
        $sprintService = new SprintService();
        $briefService = new BriefService();

        $totalUsers = $userService->getTotalUsers();
        $totalLearners = $userService->getTotalLearners();
        $totalInstructors = $userService->getTotalInstructors();
        $totalClasses = $classService->getTotalClasses();
        $totalSprints = $sprintService->getTotalSprints();
        $totalBriefs = $briefService->getTotalBriefs();

        $recentBriefs = $briefService->getRecentBriefs(5);
        $recentActivity = $userService->getRecentUserActivity(5);

        echo $this->render(
                'admin.dashboard',
                compact(
                    'totalUsers',
                    'totalLearners',
                    'totalInstructors',
                    'totalClasses',
                    'totalSprints',
                    'totalBriefs',
                    'recentBriefs',
                    'recentActivity'
                )
            );
    }
}
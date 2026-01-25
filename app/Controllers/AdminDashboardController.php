<?php
namespace App\Controllers;

use App\Middlewears\Auth;
Auth::AdminOnly();

use App\Core\BaseController;

use App\Services\ClassService;
use App\Services\UserService;
use App\Services\InstructorService;
use App\Services\LearnerService;
use App\Services\SprintService;
use App\Services\BriefService;


class AdminDashboardController extends BaseController{

    public function index() {
        $userService = UserService::getInstance();
        $instructorService = InstructorService::getInstance();
        $learnerService = LearnerService::getInstance();
        $classService = ClassService::getInstance();
        $sprintService = SprintService::getInstance();
        $briefService = BriefService::getInstance();

        $totalUsers = $userService->getUsersCount();
        $totalLearners = $learnerService->getLearnersCount();
        $totalInstructors = $instructorService->getInstructorsCount();
        $totalClasses = $classService->geClassesCount();
        $totalSprints = $sprintService->getSprintsCount();
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
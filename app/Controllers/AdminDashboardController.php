<?php
namespace App\Controllers;
use App\Core\BaseController;
class AdminDashboardController extends BaseController{

    public function index() {
        $totalUsers = 0;
        $totalStudents = 0;
        $totalInstructors = 0;
        $totalClasses = 0;
        $totalSprints = 0;
        $totalBriefs = 0;

        $recentBriefs = [];
        $recentActivity = [];

        echo $this->render(
                'admin.dashboard',
                compact(
                    'totalUsers',
                    'totalStudents',
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
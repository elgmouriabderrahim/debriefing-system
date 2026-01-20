<?php
namespace App\Controllers;
use App\Core\BaseController;
class AdminDashboardController extends BaseController{

    public function index() {
        $totalUsers  = 0;
        $totalStudents  = 4;
        $totalInstructors = 4;
        $totalClasses   = 4;
        $totalSprints   = 4;
        $totalBriefs    = 4;
        $recentBriefs = [];
        $recentActivity = [];
        echo $this->render(
                'admin.dashboard',
                [
                'totalUsers' => $totalUsers,
                'totalStudents' => $totalStudents,
                'totalInstructors' => $totalInstructors,
                'totalClasses' => $totalClasses,
                'totalSprints' => $totalSprints,
                'totalBriefs' => $totalBriefs,
                'recentBriefs' => $recentBriefs,
                'recentActivity' => $recentActivity,
                ]
            );
    }
}
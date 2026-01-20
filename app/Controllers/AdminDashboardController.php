<?php
namespace App\Controllers;
use App\Core\BaseController;
class AdminDashboardController extends BaseController{

    public function index() {
        $totalUsers = 42;
        $totalStudents = 30;
        $totalInstructors = 10;
        $totalClasses = 6;
        $totalSprints = 18;
        $totalBriefs = 25;

        $recentBriefs = [
            [
                'title' => 'Build REST API',
                'class' => 'Web Dev A',
                'instructor' => 'Y. Benali',
                'date_assigned' => '2026-01-10',
                'status' => 'assigned',
            ],
            [
                'title' => 'UI Dashboard Design',
                'class' => 'Frontend B',
                'instructor' => 'S. Amrani',
                'date_assigned' => '2026-01-08',
                'status' => 'assigned',
            ],
        ];

        $recentActivity = [
            [
                'user' => 'Admin',
                'action' => 'created a new sprint',
                'date' => '2 hours ago',
            ],
            [
                'user' => 'S. Amrani',
                'action' => 'assigned a brief to Frontend B',
                'date' => 'Yesterday',
            ],
        ];

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
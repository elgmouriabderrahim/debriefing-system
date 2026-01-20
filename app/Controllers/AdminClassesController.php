<?php
namespace App\Controllers;
use App\Core\BaseController;
class AdminClassesController extends BaseController{

    public function index() {
        $classes = [
            (object)[
                'id' => 1,
                'name' => 'Web Dev A',
                'students_count' => 12,
                'instructor' => 'Y. Benali',
                'created_at' => '2025-10-01',
            ],
            (object)[
                'id' => 2,
                'name' => 'Frontend B',
                'students_count' => 15,
                'instructor' => 'S. Amrani',
                'created_at' => '2025-10-05',
            ],
            (object)[
                'id' => 3,
                'name' => 'Backend C',
                'students_count' => 10,
                'instructor' => 'H. El Idrissi',
                'created_at' => '2025-11-01',
            ],
        ];

        echo $this->render(
                'admin.classes.index',
                [
                'classes' => $classes,
                ]
            );
    }
}
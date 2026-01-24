<?php
namespace App\Controllers;
use App\Core\BaseController;
use App\Services\InstructorService;
use App\Services\ClassService;

class AdminInstructorsController extends BaseController
{
    public function  showAssignForm()
    {
        $instructorService = InstructorService::getInstance();
        $classService = ClassService::getInstance();

        $instructorId = $_GET['instructor_id'];
        $instructor = $instructorService->getById($instructorId);
        $classes = $classService->getAll();

        echo $this->render(
                'admin.users.assign', compact('instructor', 'classes')
            );
    }

    public function  assignClass()
    {
        $instructorId  = $_POST['instructorId'];
        $classroomId  = $_POST['classroomId'];

        $instructorService = InstructorService::getInstance();
        $error = $instructorService->assignClass($classroomId, $instructorId);

        if(!$error){
            header("location: /admin/users");
            exit;
        }
        $instructor = $instructorService->getById($instructorId);
        $classes = $classService->getAll();
        echo $this->render(
                'admin.users.assign', compact('error', 'instructor', 'classes')
            );
    }
}
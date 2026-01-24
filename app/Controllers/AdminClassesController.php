<?php
namespace App\Controllers;

use App\Core\BaseController;

use App\Services\ClassService;
use App\Services\InstructorService;

class AdminClassesController extends BaseController{

    public function index() {
        $classService = ClassService::getInstance();
        $classes = $classService->getAll();

        echo $this->render(
                'admin.classes.index',
                compact('classes')
            );
    }
    public function showCreateForm(){
        echo $this->render('admin.classes.create');
    }

    public function create()
    {
        $errors = [];
        $success = null;
        $inputData = $_POST;

        $classService = ClassService::getInstance();

        $errors = $classService->create($inputData);

        if(empty($errors)){
            $inputData = [];
            $success = 'class added succesfully.';
        }

        echo $this->render(
            'admin.classes.create',
            compact('errors', 'inputData', 'success')
        );
    }
     public function view()
    {
        $id = (int) ($_GET['id'] ?? 0);

        $classService = ClassService::getInstance();
        $class = $classService->getById($id);

        $classLearners = $classService->getClassLearners($id);
        $classInstructors = $classService->getClassInstructors($id);

        echo $this->render(
            'admin.classes.view',
            compact('class', 'classLearners', 'classInstructors')
        );
    }

    public function delete()
    {
        $classId = (int) ($_POST['classId'] ?? 0);

        if ($classId > 0) {
            $classService = ClassService::getInstance();
            $classService->delete($classId);
        }

        header('Location: /admin/classes');
        exit;
    }
}
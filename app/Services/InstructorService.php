<?php
namespace App\Services;
use App\Repositories\InstructorRepository;

use App\Models\Instructor;

class InstructorService {
    private static ?InstructorService $instance = null;
    private function __construct() {}
    public static function getInstance(): InstructorService {
        if (self::$instance === null) {
            self::$instance = new InstructorService();
        }
        return self::$instance;
    }


    public function getInstructorsCount(): int {
        return InstructorRepository::countAll();
    }

    public function getById($instructorId): Instructor
    {
        return InstructorRepository::getById($instructorId);
    }

    public function assignClass($classroomId, $instructorId): ?string
    {
        $error = null;
        $classroomId = (int)($classroomId ?? 0);
        $instructorId = (int)($instructorId ?? 0);

        if($instructorId <= 0 ||  $classroomId <= 0)
            $error = 'wrong id';
        elseif($classroomId == '')
            $error = "please select a classroom";
        else
            InstructorRepository::assignClass($classroomId, $instructorId);

        return $error;
    }

}
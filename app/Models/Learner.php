<?php

namespace App\Models;
use App\Models\Classroom;

class Learner extends User
{
    private ?Classroom $classroom;

    public function __construct($data) {
        parent::__construct([...$data, 'role' => 'Learner']);
        $this->classroom = $data['classroom'] ?? null;
    }

    public function getClassroom(): Classroom {return $this->classroom;}
    public function setClassroom($classroom): void { $this->classroom = $classroom;}
}

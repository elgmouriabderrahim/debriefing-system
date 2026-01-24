<?php

namespace App\Models;

class Instructor extends User
{
    private array $classrooms;

    public function __construct($data) {
        parent::__construct([...$data, 'role' => 'Instructor']);
        $this->classrooms = $data['classrooms'] ?? [];
    }

    public function getClassrooms(): array {return $this->classrooms;}
    public function setClassroom($classroom): void { $this->classrooms[] = $classroom;}
}

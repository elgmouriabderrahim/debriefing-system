<?php
namespace App\Models;

class Sprint
{
    private int $id;
    private string $name;
    private int $duration;
    private int $order;
    private Classroom $classroom;

    public function __construct($data) {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->duration = $data['duration'];
        $this->order = $data['order'];
        $this->classroom = $data['classroom'];
    }

    public function getId(): int {return $this->id;}
    public function getName(): string {return $this->name;}
    public function getDuration(): int {return $this->duration;}
    public function getOrder(): int {return $this->order;}
    public function getClassroom(): Classroom { return $this->classroom; }
}
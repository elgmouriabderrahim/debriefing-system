<?php
namespace App\Models;

use App\Models\Classroom;

class Sprint
{
    private int $id;
    private string $name;
    private int $durationDays;
    private int $sprintOrder;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->durationDays = $data['duration_days'];
        $this->sprintOrder = $data['sprint_order'];
    }

    public function getId(): int { return $this->id; }
    public function getName(): string { return $this->name; }
    public function getDurationDays(): int { return $this->durationDays; }
    public function getSprintOrder(): int { return $this->sprintOrder; }
}

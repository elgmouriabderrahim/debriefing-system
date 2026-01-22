<?php

namespace App\Models;
use DateTime;

class Classroom
{
    private int $id;
    private string $name;
    private int $promotionYear;
    private DateTime $createdAt;
    private int $studentsCount;
    private array $instructors;

    public function __construct(array $data) {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->promotionYear = $data['promotion_year'];
        $this->createdAt = new DateTime($data['created_at']);
        $this->studentsCount = $data['students_count'];
        $this->instructors = $data['instructors'];
    }

    public function getId(): int {return $this->id;}
    public function getName(): string {return $this->name;}
    public function getPromotionYear(): string { return $this->promotionYear; }
    public function getCreatedAt(): DateTime { return $this->createdAt; }
    public function getStudentsCount(): int { return $this->studentsCount; }
    public function getInstructors(): array { return $this->instructors; }
}
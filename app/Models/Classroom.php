<?php

namespace App\Models;
use DateTime;

class Classroom
{
    private int $id;
    private string $name;
    private int $promotionYear;
    private DateTime $createdAt;

    public function __construct(array $data) {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->promotionYear = $data['promotionYear'];
        $this->createdAt = new DateTime($data['createdAt']);
    }

    public function getId(): int {return $this->id;}
    public function getName(): string {return $this->name;}
    public function getPromotionYear(): string { return $this->promotionYear; }
    public function getCreatedAt(): DateTime { return $this->createdAt; }
}
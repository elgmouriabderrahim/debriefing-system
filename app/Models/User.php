<?php

namespace App\Models;
use DateTime;
use App\Enums\UserRole;
use App\Models\Classroom;

abstract class User
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $email;
    private UserRole $role;
    private string $password;
    private DateTime $createdAt;

    public function __construct($data) {
        $this->id = $data['id'];
        $this->firstName = $data['first_name'];
        $this->lastName = $data['last_name'];
        $this->email = $data['email'];
        $this->password = $data['password'];
        $this->createdAt = new DateTime ($data['created_at']);
        $this->role = UserRole::from($data['role']);
    }

    public function getId(): int {return $this->id;}
    public function getFullName(): string {return $this->firstName . ' ' . $this->lastName;}
    public function getRole(): UserRole { return $this->role; }
    public function getEmail(): string { return $this->email; }
    public function getCreatedAt(): DateTime { return $this->createdAt; }

    public function verifyPassword(string $password): bool {
        return password_verify($password, $this->password);
    }
}

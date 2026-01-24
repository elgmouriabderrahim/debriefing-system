<?php
namespace App\Helpers;

class Helpers {
    public static function sanitize(?string $data): string
    {
        return trim($data ?? '');
    }

    public static function validateClassName(string $name): array
    {
        $errors = [];
        $name = self::sanitize($name);

        if ($name === '') {
            $errors['name'] = 'Classroom name is required.';
        }

        return $errors;
    }

    public static function validateClassYear($promotionYear): array
    {
        $errors = [];

        $promotionYear = self::sanitize((string) $promotionYear);

        if ($promotionYear === '') {
            $errors['promotionYear'] = 'Promotion year is required.';
        } elseif (!ctype_digit($promotionYear)) {
            $errors['promotionYear'] = 'Promotion year must be a number.';
        }

        return $errors;
    }
    
    public static function ValidateName(string $name,string $field): array {
        $errors = [];
        if (empty($name)) {
            $errors[$field] = ucfirst($field) . ' is required';
        } elseif (strlen($name) < 2) {
            $errors[$field] = ucfirst($field) . ' is too short';
        } elseif (strlen($name) > 100) {
            $errors[$field] = ucfirst($field) . ' is too long';
        }
        return $errors;
    }

    public static function ValidateEmail(?string $email): array {
        $errors = [];
        if (empty($email)) {
            $errors['email'] = 'Email is required';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email';
        }
        return $errors;
    }

    public static function ValidatePassword(string $password, string $cPassword): array {
        $errors = [];
        if (empty($password)) {
            $errors['password'] = 'Password is required';
        } elseif (strlen($password) < 6) {
            $errors['password'] = 'Password must be at least 6 characters long';
        } elseif ($password !== $cPassword) {
            $errors['cpassword'] = 'Passwords do not match';
        }
        return $errors;
    }

    public static function ValidateRole(?string $role): array {
        $errors = [];
        $roles = ['Learner', 'Instructor', 'Admin'];
        if (empty($role)) {
            $errors['role'] = 'Role is required';
        } elseif (!in_array($role, $roles)) {
            $errors['role'] = 'Invalid role';
        }
        return $errors;
    }

    public static function validateSprintInputs(array $data): array
    {
        $errors = [];

        $name = self::sanitize($data['name']);
        $duration_days = self::sanitize($data['duration_days']);
        $sprint_order = self::sanitize($data['sprint_order']);

        if ($name === '') {
            $errors['name'] = 'Sprint name is required.';
        } elseif (strlen($name) < 3) {
            $errors['name'] = 'Sprint name must be at least 3 characters.';
        } elseif (strlen($name) > 100) {
            $errors['name'] = 'Sprint name must not exceed 100 characters.';
        }

        if ($duration_days === '') {
            $errors['duration_days'] = 'Duration is required.';
        } elseif (!ctype_digit((string) $duration_days)) {
            $errors['duration_days'] = 'Duration Days must be a valid number.';
        } elseif ((int) $duration_days <= 0) {
            $errors['duration_days'] = 'Duration must be greater than 0.';
        }

        if ($sprint_order === '') {
            $errors['sprint_order'] = 'Sprint order is required.';
        } elseif (!ctype_digit((string) $sprint_order)) {
            $errors['sprint_order'] = 'Sprint order must be a valid number.';
        } elseif ((int) $sprint_order <= 0) {
            $errors['sprint_order'] = 'Sprint order must be greater than 0.';
        }

        return $errors;
    }
}

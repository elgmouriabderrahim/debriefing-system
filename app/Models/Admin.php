<?php

namespace App\Models;

class Instructor extends User
{
    public function __construct($data) {
        parent::__construct([...$data, 'role' => 'Admin']);
    }
}

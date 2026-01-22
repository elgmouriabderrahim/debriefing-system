<?php

namespace App\Models;

class Admin extends User
{
    public function __construct($data) {
        parent::__construct([...$data, 'role' => 'Admin']);
    }
}
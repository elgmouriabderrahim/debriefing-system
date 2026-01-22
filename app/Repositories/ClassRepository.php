<?php
namespace App\Repositories;
use App\Daos\ClassDao;

class ClassRepository {

    public static function countAll(): int {
        return ClassDao::countAll();
    }
    
}
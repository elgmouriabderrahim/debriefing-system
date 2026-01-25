<?php
namespace App\Mappers;

use App\Models\Learner;

class LearnerMapper {
    public static function  ArraysToObjs($learners): array {
        return array_map(function($learner){
            return new Learner($learner);
        }, $learners);
    }

    public static function arrayToObj(array $learner): ?Learner
    {
        return new Learner($learner) ?? null;
    }
}
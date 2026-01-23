<?php
namespace App\Mappers;

use App\Models\Learner;
class LearnerMapper {
    public static function  mapArraysToLearners($learners): array {
        return array_map(function($learner){
            return new Learner($learner);
        }, $learners);
    }
}
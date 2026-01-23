<?php
namespace App\Repositories;
use App\Daos\LearnerDao;
use App\Mappers\LearnerMapper;
use App\Models\Learner;

class LearnerRepository {

    public static function countAllLearners(): int {
        return LearnerDao::countAllLearners();
    }
   
}
<?php
namespace App\Repositories;
use App\Daos\LearnerDao;
use App\Mappers\LearnerMapper;
use App\Models\Learner;

class LearnerRepository {

    public static function countAllLearners(): int {
        return LearnerDao::countAllLearners();
    }

    public static function getById($learnerId): ?Learner
    {
        $learner =  LearnerDao::getById($learnerId);

        if(!$learner)
            return null;
        return LearnerMapper::arrayToObj($learner);
    }
}
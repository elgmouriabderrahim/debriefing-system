<?php
namespace App\Mappers;
use App\Models\Competence;
use App\Models\Debriefing;

use App\Repositories\BriefRepository;
use App\Repositories\LearnerRepository;
use App\Repositories\InstructorRepository;

class DebriefingMapper {
    public static function replaceIdsWithObj($debriefings): array {
        return array_map(function($debriefing) {
            $debriefings['brief'] = BriefRepository::getById($debriefings['brief_id']);
            $debriefings['learner'] = LearnerRepository::getById($debriefings['learner_id']);
            $debriefings['instructor'] = InstructorRepository::getById($debriefings['instructor_id']);
            unset($debriefings['brief_id'], $debriefings['learner_id'], $debriefings['instructor_id']);
        }, $debriefings);
    }

    public static function mapToObjects(array $debriefings): array {
        return array_map(function($debriefing) {
            return new Debriefing($debriefing);
        }, $debriefings);
    }
}
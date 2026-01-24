<?php
namespace App\Mappers;
use App\Models\Competence;
use App\Models\Debriefing;

class DebriefingMapper {
    public static function replaceIdsWithObj($debriefings): array {
        return array_map(function($debriefing) {
            $debriefings['brief'] = BriefRepository::getBriefById($debriefings['brief_id']);
            $debriefings['learner'] = LearnerRepository::getLearnerById($debriefings['learner_id']);
            $debriefings['instructor'] = InstructorRepository::getInstructorById($debriefings['instructor_id']);
            unset($debriefings['brief_id'], $debriefings['learner_id'], $debriefings['instructor_id']);
        }, $debriefings);
    }

    public static function mapToObjects(array $debriefings): array {
        return array_map(function($debriefing) {
            return new Debriefing($debriefing);
        }, $debriefings);
    }
}
<?php
namespace App\Repositories;

use App\Daos\DebriefingDao;
use App\Mappers\DebriefingMapper;

class DebriefingRepository {

    public static function getAllDebriefings(): array {
        $debriefings = DebriefingDao::getAllDebriefings();
        if(empty($debriefings))
            return [];
        $debriefings = DebriefingMapper::replaceIdsWithObj($debriefings);
        return DebriefingMapper::mapToObjects($debriefings);
    }
}
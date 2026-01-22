<?php
namespace App\Repositories;
use \App\Daos\BriefDao;
use \App\Mappers\BriefMapper;

class BriefRepository {

    public static function countAll(): int {
        return BriefDao::countAll();
    }
    public static function getRecentBriefs(int $limit): array {
        $briefs =  BriefDao::getRecentBriefs($limit);
        $briefs = BriefMapper::replaceIdsWithObj($briefs);
        return BriefMapper::mapArrayToObj($briefs);
    }
}
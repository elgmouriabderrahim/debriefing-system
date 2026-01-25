<?php
namespace App\Mappers;

class BriefMapper {
    public static function replaceIdsWithObj(array $briefs): array {
        return array_map(function($brief) {
            $brief['sprint'] = SprintRepository::getById($brief['sprint_id']);
            $brief['instructor'] = UserRepository::getById($brief['instructor_id']);
            unset($brief['sprint_id'], $brief['instructor_id']);
            return $brief;
        }, $briefs);
    }

    public static function arraysToObjs(array $briefs): array {
        return array_map(function($brief) {
            return new Brief($brief);
        }, $briefs);
    }

    public static function arrayToObj(array $brief): ?Brief
    {
        return new Brief($brief) ?? null;
    }
}
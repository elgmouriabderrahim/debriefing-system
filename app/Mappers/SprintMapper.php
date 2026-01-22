<?php
namespace App\Mappers;
use App\Models\Sprint;

class SprintMapper {
    public static function mapToObj(array $sprint): ?Sprint {
        if (!$sprint)
            return null;

        return new Sprint($sprint);
    }
}   
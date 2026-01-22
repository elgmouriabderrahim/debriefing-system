<?php
namespace App\Repositories;
use App\Daos\SprintDao;
use App\Mappers\SprintMapper;
use App\Models\Sprint;

class SprintRepository {

    public static function countAll(): int {
        return SprintDao::countAll();
    }
    public static function getById(int $id): ?Sprint {
        $sprint = SprintDao::getById($id);
        return SprintMapper::mapToObj($sprint);
    }
}


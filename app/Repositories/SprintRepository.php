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
    public static function findAll(): array {
        $sprints = SprintDao::findAll();
        if(empty($sprints)){
            return [];
        }
        return SprintMapper::mapToObjArray($sprints);
    }

    public static function create(array $data): void
    {
        Sprintdao::create($data);
    }

    public static function delete(int $id): void
    {
        Sprintdao::delete($id);
    }
}


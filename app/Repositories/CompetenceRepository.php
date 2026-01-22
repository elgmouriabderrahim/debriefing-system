<?php
namespace App\Repositories;

use App\Daos\CompetenceDao;
use App\Mappers\CompetenceMapper;

class CompetenceRepository {
    public static function findAll(): array {
        $competences = CompetenceDao::getAll();
        return CompetenceMapper::mapArrayToObjects($competences);
    }
}
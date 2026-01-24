<?php
namespace App\Repositories;

use App\Daos\CompetenceDao;
use App\Mappers\CompetenceMapper;

class CompetenceRepository {
    public static function findAll(): array {
        $competences = CompetenceDao::getAll();
        return CompetenceMapper::mapArrayToObjects($competences);
    }

    public static function create($inputData): void
    {
        CompetenceDao::create($inputData);
    }

    public static function delete($competenceId): void
    {
        CompetenceDao::delete($competenceId);
    }

    public static function isCompetenceExists($code): bool
    {
        return CompetenceDao::isCompetenceExists($code);
    }
}
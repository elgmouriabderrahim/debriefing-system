<?php
namespace App\Mappers;
use App\Models\Competence;

class CompetenceMapper {
    public static function mapArrayToObjects(array $competences): array {
        return array_map(function($competence) {
            return new Competence($competence);
        }, $competences);
    }
}
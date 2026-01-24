<?php
namespace App\Services;

use App\Repositories\CompetenceRepository;
use App\Helpers\Helpers;

class CompetenceService {
    private static ?CompetenceService $instance = null;

    private function __construct() {}

    public static function getInstance(): CompetenceService {
        if (self::$instance === null) {
            self::$instance = new CompetenceService();
        }
        return self::$instance;
    }

    public function getall(): array {
        return CompetenceRepository::findAll();
    }

    public static function create($inputData): array
    {
        $errors = [];
        $errors = Helpers::validateCompetenceInputs($inputData);
        if(CompetenceRepository::isCompetenceExists($inputData['code']))
            $errors['code'] = 'this competence already exists';
        if(empty($errors))
            CompetenceRepository::create($inputData);
        return $errors;
    }

    public static function delete($competenceId): void
    {
        CompetenceRepository::delete($competenceId);
    } 
}   
<?php
namespace App\Services;
use App\Repositories\SprintRepository;

class SprintService {

    public function getTotalSprints(): int {
        return SprintRepository::countAll();
    }
}
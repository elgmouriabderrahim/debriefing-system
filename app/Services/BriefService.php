<?php
namespace App\Services;
use App\Repositories\BriefRepository;

class BriefService {

    public function getTotalBriefs(): int {
        return BriefRepository::countAll();
    }

    public function getRecentBriefs(int $limit = 5): array {
        return BriefRepository::getRecentBriefs($limit);
    }
}
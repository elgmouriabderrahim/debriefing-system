<?php
namespace App\Services;
use App\Repositories\InstractorRepository;

class InstractorService {
    private static ?InstractorService $instance = null;
    private function __construct() {}
    public static function getInstance(): InstractorService {
        if (self::$instance === null) {
            self::$instance = new InstractorService();
        }
        return self::$instance;
    }


    public function getInstructorsCount(): int {
        return InstractorRepository::countAll();
    }


}
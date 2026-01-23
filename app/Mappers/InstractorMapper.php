<?php
namespace App\Mappers;

use App\Models\Instructor;

class InstractorMapper {
    
    public static function mapToInstractorsArray(array $instractors): array {
        return array_map(function($instractors) {
            return new Instructor($instractors);
        }, $instractors);
    }
}
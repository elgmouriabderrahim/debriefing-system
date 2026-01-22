<?php

namespace App\Models;
use App\Models\masteryLevel;

class Competence
{
    private int $id;
    private string $code;
    private string $label;
    private ?MasteryLevel $level;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->code = $data['code'];
        $this->label = $data['label'];
        $this->level = masteryLevel::from($data['level']) ?? null;
    }

    public function getCode(): string {return $this->code;}
    public function getLabel(): string {return $this->label;}
    public function getMasteryLevel(): ?MasteryLevel {return $this->level;}
}

<?php
namespace App\Models;

use DateTime;
use App\Enums\BriefType;
use App\Models\Sprint;
class Brief
{
    private int $id;
    private string $title;
    private string $content;
    private Sprint $sprint;
    private Instructor $instructor;
    private DateTime $startDate;
    private DateTime $endDate;
    private BriefType $type;

    public function __construct(array $data) {
        $this->id = (int) $data['id'];
        $this->title = $data['title'];
        $this->content = $data['content'];
        $this->sprint = $data['sprint'];
        $this->instructor = $data['instructor'];
        $this->startDate = new DateTime($data['start_date']);
        $this->endDate = new DateTime($data['end_date']);
        $this->type = BriefType::from($data['type']);
    }

    public function getId(): int {return $this->id;}
    public function getTitle(): string {return $this->title;}
    public function getContent(): string {return $this->content;}
    public function getSprint(): Sprint { return $this->sprint;}
    public function getStartDate(): DateTime { return $this->startDate;}
    public function getEndDate(): DateTime { return $this->endDate;}
    public function getType(): BriefType { return $this->type;}
}
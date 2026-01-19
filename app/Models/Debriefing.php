<?php

namespace App\Models;
use DateTime;
use App\Models\Learner;
use App\Models\Instructor;
use App\Models\Brief;

class Debriefing
{
    private int $id;
    private Learner $learner;
    private Instructor $instructor;
    private Brief $brief;
    private string $comment;
    private DateTime $createdAt;
    private array $competences;

    public function __construct(array $data) {
        $this->id = $data['id'];
        $this->learner = $data['learner'];
        $this->instructor = $data['instructor'];
        $this->brief = $data['brief'];
        $this->comment = $data['comment'];
        $this->createdAt = new DateTime($data['created_at']);

        $this->competences = $data['competences'];
    }
    public function getId(): int {return $this->id;}
    public function getLearner(): Learner {return $this->learner;}
    public function getInstructor(): Instructor {return $this->instructor;}
    public function getBrief(): Brief {return $this->brief;}
    public function getComment(): string {return $this->comment;}
    public function getCreatedAt(): DateTime {return $this->createdAt;}

    public function getCompetences(): array {return $this->competences;}
}

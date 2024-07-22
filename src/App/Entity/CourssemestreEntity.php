<?php

namespace App\Entity;

use Core\Entity\AbstractEntity;

class CourssemestreEntity extends AbstractEntity
{

    public int $id;
    public string $semestresId;
    public string $coursId;

    public function getId(): int
    {
        return $this->id;
    }

    public function getSemestreId(): string
    {
        return $this->semestresId;
    }

    public function getCoursId(): string
    {
        return $this->coursId;
    }

    public function setSemestreId(string $semestreId): CourssemestreEntity
    {
        $this->semestreId = $semestreId;
        return $this;
    }

    public function setCoursId(string $coursId): CourssemestreEntity
    {
        $this->coursId = $coursId;
        return $this;
    }

    public function setId(int $id): CourssemestreEntity
    {
        $this->id = $id;
        return $this;
    }

}
<?php

namespace App\Entity;

use Core\Entity\AbstractEntity;

class CoursprofesseurEntity extends AbstractEntity
{
    public int $id;

    public string $coursId;
    public string $utilisateursId;


    public function getId(): int
    {
        return $this->id;
    }

    public function getCours(): string
    {
        return $this->coursId;
    }

    public function getUtilisateursId(): string
    {
        return $this->utilisateursId;
    }

    public function setUtilisateursId(string $utilisateursId): CoursprofesseurEntity
    {
        $this->utilisateursId = $utilisateursId;
        return $this;
    }

    public function setCours(string $cours): CoursprofesseurEntity
    {
        $this->cours = $cours;
        return $this;
    }

    public function setId(int $id): CoursprofesseurEntity
    {
        $this->id = $id;
        return $this;
    }

}
<?php
namespace App\Entity;

use Core\Entity\AbstractEntity;

class SessiondecourEntity extends AbstractEntity{
    public int $id;
    public string $date;
    public string $heuredebut;
    public string $heurefin;
    public int $nbreheure;
    public string $statut;
    public string $cours;
    public string $salles;
    public string $classes;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;
        return $this;
    }

    public function getHeuredebut(): string
    {
        return $this->heuredebut;
    }

    public function setHeuredebut(string $heuredebut): self
    {
        $this->heuredebut = $heuredebut;
        return $this;
    }

    public function getHeurefin(): string
    {
        return $this->heurefin;
    }

    public function setHeurefin(string $heurefin): self
    {
        $this->heurefin = $heurefin;
        return $this;
    }

    public function getNbreheure(): int
    {
        return $this->nbreheure;
    }

    public function setNbreheure(int $nbreheure): self
    {
        $this->nbreheure = $nbreheure;
        return $this;
    }

    public function getCours(): string
    {
        return $this->cours;
    }

    public function setCours(string $cours): self
    {
        $this->cours = $cours;
        return $this;
    }

    public function getSalles(): string
    {
        return $this->salles;
    }

    public function setSalles(string $salles): self
    {
        $this->salles = $salles;
        return $this;
    }

    public function getClasses(): string
    {
        return $this->classes;
    }

    public function setClasses(string $classes): self
    {
        $this->classes = $classes;
        return $this;
    }

    public function getStatut(): string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;
        return $this;
    }





}
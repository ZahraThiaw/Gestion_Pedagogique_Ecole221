<?php
namespace App\Entity;

use Core\Entity\AbstractEntity;

class CourEntity extends AbstractEntity{
    public int $id;
    public string $libelle;
    public string $nbrHeureGlobal;
    public string $modulesId;

    public function getId(): int
    {
        return $this->id;
    }

    public function getLibelle(): string
    {
        return $this->libelle;
    }

    public function getNbrHeureGlobal(): string
    {
        return $this->nbrHeureGlobal;
    }

    public function getSemestre(): string
    {
        return $this->semestre;
    }

    public function getUtilisateursId(): string
    {
        return $this->utilisateursId;
    }

    public function getModulesId(): string
    {
        return $this->modulesId;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function setNbrHeureGlobal(string $nbrHeureGlobal): self
    {
        $this->nbrHeureGlobal = $nbrHeureGlobal;   

        return $this;
    }

    public function setSemestre(string $semestre): self
    {
        $this->semestre = $semestre;

        return $this;
    }

    public function setUtilisateursId(string $utilisateursId): self
    {
        $this->utilisateursId = $utilisateursId;

        return $this;
    }

    public function setModulesId(string $modulesId): self
    {
        $this->modulesId = $modulesId;

        return $this;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }


}
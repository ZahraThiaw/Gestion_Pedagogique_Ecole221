<?php
namespace App\Entity;

use Core\Entity\AbstractEntity;

class ClasseEntity extends AbstractEntity{
    public int $id;
    public string $libelle;
    public string $filiere;
    public string $niveau;

    /**
     * Get the value of libelle
     *
     * @return string
     */
    public function getLibelle(): string
    {
        return $this->libelle;
    }

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    public function getFiliere(): string
    {
        return $this->filiere;
    }

    public function getNiveau(): string
    {
        return $this->niveau;
    }


    /**
     * Set the value of libelle
     *
     * @param string $libelle
     *
     * @return self
     */
    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }


    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }


    public function setFiliere(string $filiere): self
    {
        $this->filiere = $filiere;

        return $this;
    }


    public function setNiveau(string $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }
}
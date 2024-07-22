<?php
namespace App\Entity;

use Core\Entity\AbstractEntity;

class SalleEntity extends AbstractEntity{
    public int $id;
    public string $nom;
    public int $numero;
    public int $nbrPlace;

    /**
     * Get the value of libelle
     *
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
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

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function getNbrPlace(): int
    {
        return $this->nbrPlace;
    }


    /**
     * Set the value of libelle
     *
     * @param string $nom
     *
     * @return self
     */
    public function setNom(string $nom): self
    {
        $this->nom = $nom;

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


    public function setNumero(int $numero): self
    {
        $this->numero = $numero;
        return $this;
    }   

    public function setNbrPlace(int $nbrPlace): self
    {
        $this->nbrPlace = $nbrPlace;
        return $this;
    }
}
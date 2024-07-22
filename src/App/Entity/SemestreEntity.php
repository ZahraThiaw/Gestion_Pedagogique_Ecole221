<?php
namespace App\Entity;

use Core\Entity\AbstractEntity;

class SemestreEntity extends AbstractEntity{
    public int $id;
    public string $libelle;

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
}
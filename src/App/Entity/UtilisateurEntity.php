<?php
namespace App\Entity;

use Core\Entity\AbstractEntity;

class UtilisateurEntity extends AbstractEntity{

    protected int $id;
    public string $nom = '';
    public string $prenom = '';
    public string $adresse = '';
    public string $telephone = '';
    public string $email = '';
    public string $motDePasse = '';
    protected int $rolesId;



    public function getId(): int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function getAdresse(): string
    {
        return $this->adresse;
    }

    public function getTelephone(): string
    {
        return $this->telephone;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getMotDePasse(): string
    {
        return $this->motDePasse;
    }

    public function getRolesId(): int
    {
        return $this->rolesId;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;
        return $this;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;
        return $this;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function setMotDePasse(string $motDePasse): self
    {
        $this->motDePasse = $motDePasse;
        return $this;
    }

    public function setRolesId(int $rolesId): self
    {
        $this->rolesId = $rolesId;
        return $this;
    }

    



}
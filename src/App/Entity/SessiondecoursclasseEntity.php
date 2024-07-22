<?php
 namespace App\Entity;

use Core\Entity\AbstractEntity;

 class SessiondecoursclasseEntity extends AbstractEntity
 {
    public int $id;
    public int $sessiondecoursId;
    public int $classesId;

    public function getId(): int
    {
        return $this->id;
    }

    public function getSessiondecoursId(): int
    {
        return $this->sessiondecoursId;
    }

    public function getClassesId(): int
    {
        return $this->classesId;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function setSessiondecoursId(int $sessiondecoursId): self
    {
        $this->sessiondecoursId = $sessiondecoursId;
        return $this;
    }

    public function setClassesId(int $classesId): self
    {
        $this->classesId = $classesId;
        return $this;
    }
 }
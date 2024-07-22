<?php
namespace App\Model;

use App\Entity\ClasseEntity;
use Core\Model\AbstractModel;

class ClasseModel extends AbstractModel
{
    protected $table = 'classes';

    public function getEntityClass()
    {
        return ClasseEntity::class; // Nom de la classe des entités
    }
}

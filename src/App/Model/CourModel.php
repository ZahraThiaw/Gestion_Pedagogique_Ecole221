<?php
namespace App\Model;

use App\Entity\CourEntity;
use Core\Model\AbstractModel;

class CourModel extends AbstractModel
{
    protected $table = 'cours';

    public function getEntityClass()
    {
        return CourEntity::class; // Nom de la classe des entités
    }
}

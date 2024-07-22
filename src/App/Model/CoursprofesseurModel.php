<?php
namespace App\Model;

use App\Entity\CoursprofesseurEntity;
use Core\Model\AbstractModel;

class CoursprofesseurModel extends AbstractModel
{
    protected $table = 'coursprofesseurs';

    public function getEntityClass()
    {
        return CoursprofesseurEntity::class; // Nom de la classe des entités
    }

    
}

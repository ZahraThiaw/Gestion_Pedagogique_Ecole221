<?php
namespace App\Model;

use App\Entity\CourssemestreEntity;
use Core\Model\AbstractModel;

class CourssemestreModel extends AbstractModel
{
    protected $table = 'courssemestres';

    public function getEntityClass()
    {
        return CourssemestreEntity::class; // Nom de la classe des entités
    }
}

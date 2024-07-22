<?php
namespace App\Model;

use App\Entity\SemestreEntity;
use Core\Model\AbstractModel;

class SEmestreModel extends AbstractModel
{
    protected $table = 'semestres';

    public function getEntityClass()
    {
        return SemestreEntity::class; // Nom de la classe des entités
    }
}

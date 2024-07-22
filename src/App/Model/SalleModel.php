<?php
namespace App\Model;

use App\Entity\SalleEntity;
use Core\Model\AbstractModel;

class SalleModel extends AbstractModel
{
    protected $table = 'salles';

    public function getEntityClass()
    {
        return SalleEntity::class; // Nom de la classe des entités
    }
}

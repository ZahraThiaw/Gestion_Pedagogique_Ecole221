<?php
namespace App\Model;

use App\Entity\ModuleEntity;
use Core\Model\AbstractModel;

class ModuleModel extends AbstractModel
{
    protected $table = 'modules';

    public function getEntityClass()
    {
        return ModuleEntity::class; // Nom de la classe des entités
    }
}

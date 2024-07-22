<?php
namespace App\Model;

use App\Entity\CourEntity;
use App\Entity\UtilisateurEntity;
use Core\Model\AbstractModel;

class UtilisateurModel extends AbstractModel
{
    protected $table = 'utilisateurs';

    public function getEntityClass()
    {
        return UtilisateurEntity::class; // Nom de la classe des entités
    }
}

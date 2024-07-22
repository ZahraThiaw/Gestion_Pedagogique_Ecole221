<?php
namespace App\Model;

use App\Entity\SessiondecoursclasseEntity;
use Core\Model\AbstractModel;

class SessiondecoursclasseModel extends AbstractModel
{
    protected $table = 'sessiondecoursclasses';

    public function getEntityClass()
    {
        return SessiondecoursclasseEntity::class; // Nom de la classe des entités
    }
}

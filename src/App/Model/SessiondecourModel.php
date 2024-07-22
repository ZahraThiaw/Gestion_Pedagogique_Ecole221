<?php
namespace App\Model;

use App\Entity\SessiondecourEntity;
use Core\Model\AbstractModel;

class SessiondecourModel extends AbstractModel
{
    protected $table = 'sessiondecours';

    public function getEntityClass()
    {
        return SessiondecourEntity::class; // Nom de la classe des entités
    }

    public function getSessionsByProfessor($professorId)
    {
        $sql = "
            SELECT 
                sessiondecours.id AS 'id',
                sessiondecours.heuredebut AS 'heuredebut',
                sessiondecours.heurefin AS 'heurefin',
                sessiondecours.date AS 'date',
                sessiondecours.statut AS 'statut',
                cours.libelle AS 'cours',
                classes.libelle AS 'classes',
                salles.nom AS 'salles'
            FROM 
                sessiondecours
            JOIN 
                coursprofesseurs ON sessiondecours.coursId = coursprofesseurs.coursId
            JOIN 
                utilisateurs ON coursprofesseurs.utilisateursId = utilisateurs.id
            JOIN 
                cours ON sessiondecours.coursId = cours.id
            JOIN 
                sessiondecoursclasses ON sessiondecours.id = sessiondecoursclasses.sessiondecoursId
            JOIN 
                classes ON sessiondecoursclasses.classesId = classes.id
            JOIN 
                salles ON sessiondecours.sallesId = salles.id
            WHERE 
                utilisateurs.id = :utilisateurId
        ";
        return $this->database->prepare($sql, ['utilisateurId' => $professorId], $this->getEntityClass(), false);
    }


    public function cancelSession($sessionId)
    {
        $sql = "UPDATE sessiondecours SET statut = 'Annulée' WHERE id = :id";
        $this->database->prepare($sql, ['id' => $sessionId], $this->getEntityClass(), true);
    }
}

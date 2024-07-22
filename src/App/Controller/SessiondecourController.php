<?php
// namespace App\Controller;

// use App\Model\SessiondecourModel;
// use Core\Controller\Controller;
// use Core\Session\SessionInterface;
// use Core\Validator\ValidatorInterface;

// class SessiondecourController extends Controller
// {
//     private $sessiondecourModel;

//     public function __construct(SessiondecourModel $sessiondecourModel, SessionInterface $session, ValidatorInterface $validator)
//     {
//         parent::__construct($session, $validator);
//         $this->sessiondecourModel = $sessiondecourModel;
//     }

//     public function show()
//     {
//         // Vérifiez si l'utilisateur est connecté
//         $user = $this->session->get('user');

//         if ($user === null) {
//             // Redirigez vers la page de connexion ou affichez un message d'erreur
//             $this->redirect('/login');
//             return;
//         }

//         // Récupérer l'ID du professeur connecté
//         $professeurId = $user['id'];

//         // Récupérer les sessions de cours
//         $sessiondecours = $this->sessiondecourModel->getSessionsByProfessor($professeurId);
//         //var_dump($sessiondecours);

//         // Passer les sessions à la vue
//         $this->renderView('listersessiondecours', ['sessiondecours' => $sessiondecours]);

//         // Convertir les sessions en format JSON pour le calendrier
        
//     }


//     public function index(){


//         if (!$this->session->get('user')) {
//             $this->redirect('/login');
//             return;
//         }
//         $user = $this->session->get('user');

//         $professeurId = $user['id'];

//         $sessions = $this->sessiondecourModel->getSessionsByProfessor($professeurId);;
//         //var_dump($sessions); 
          
//        $formattedSessions = array_map(function($session) {
//         $color = '';
//         $textColor = '';
//         switch ($session->getStatut()) {
//             case 'Prévue':
//                 $color = 'yellow';
//                 $textColor = 'black';
//                 break;
//             case 'Complète':
//                 $color = 'green';
//                 $textColor = 'white';
//                 break;
//             case 'Annulée':
//                 $color = 'red';
//                 $textColor = 'white';
//                 break;
//         }
       
        
//         return [
//             'title' => $session->getCours(), // Assuming there is a getLibelle method
//             'start' => $session->getDate() . 'T' . $session->getHeuredebut(), // Assuming there are getDate and getHeureDebut methods
//             'end' => $session->getDate() . 'T' . $session->getHeurefin(), // Assuming there is a getHeureFin method
//             'description' => $session->getSalles().'<br>'.$session->getClasses().'<br>'.$session->getStatut(), // Assuming there is a getEtat method,
//             'color' => $color,
//             'textColor' => $textColor,
//             'id' => $session->getId(),
//         ];
//     }, $sessions);

//         $this->renderView('listersessiondecours', ['sessions' => $formattedSessions]);
//     }


    
// }







namespace App\Controller;

use App\Model\SessiondecourModel;
use Core\Controller\Controller;
use Core\Session\SessionInterface;
use Core\Validator\ValidatorInterface;

class SessiondecourController extends Controller
{
    private $sessiondecourModel;

    public function __construct(SessiondecourModel $sessiondecourModel, SessionInterface $session, ValidatorInterface $validator)
    {
        parent::__construct($session, $validator);
        $this->sessiondecourModel = $sessiondecourModel;
    }

    public function show()
    {
        // Vérifiez si l'utilisateur est connecté
        $user = $this->session->get('user');

        if ($user === null) {
            // Redirigez vers la page de connexion ou affichez un message d'erreur
            $this->redirect('/login');
            return;
        }

        // Récupérer l'ID du professeur connecté
        $professeurId = $user['id'];

        // Récupérer les sessions de cours
        $sessiondecours = $this->sessiondecourModel->getSessionsByProfessor($professeurId);
        //var_dump($sessiondecours);

        // Passer les sessions à la vue
        $this->renderView('listersessiondecours', ['sessiondecours' => $sessiondecours]);
    }

    public function index()
    {
        if (!$this->session->get('user')) {
            $this->redirect('/login');
            return;
        }
        $user = $this->session->get('user');
        $professeurId = $user['id'];

        $sessions = $this->sessiondecourModel->getSessionsByProfessor($professeurId);;
        //var_dump($sessions); 
          
        $formattedSessions = array_map(function($session) {
            $color = '';
            $textColor = '';
            switch ($session->getStatut()) {
                case 'Prévue':
                    $color = 'yellow';
                    $textColor = 'black';
                    break;
                case 'Complète':
                    $color = 'green';
                    $textColor = 'white';
                    break;
                case 'Annulée':
                    $color = 'red';
                    $textColor = 'white';
                    break;
            }
           
            return [
                'title' => $session->getCours(), // Assuming there is a getLibelle method
                'start' => $session->getDate() . 'T' . $session->getHeuredebut(), // Assuming there are getDate and getHeureDebut methods
                'end' => $session->getDate() . 'T' . $session->getHeurefin(), // Assuming there is a getHeureFin method
                'description' => $session->getSalles().'<br>'.$session->getClasses().'<br>'.$session->getStatut(), // Assuming there is a getEtat method,
                'color' => $color,
                'textColor' => $textColor,
                'id' => $session->getId(),
                'extendedProps' => [
                'statut' => $session->getStatut(), // Ajout de statut dans extendedProps
                ]
            ];
        }, $sessions);

        $this->renderView('listersessiondecours', ['sessions' => $formattedSessions]);
    }

    public function cancel()
    {
        if (!$this->session->get('user')) {
            $this->redirect('/login');
            return;
        }

        $sessionId = $_POST['session_id'];
        $session = $this->sessiondecourModel->find($sessionId);

        // Debugging statements
        if (!$session) {
            echo json_encode(['status' => 'error', 'message' => 'Session non trouvée.']);
            return;
        }

        if ($session->getStatut() !== 'Prévue') {
            echo json_encode(['status' => 'error', 'message' => 'Seules les sessions prévues peuvent être annulées.']);
            return;
        }

        $this->sessiondecourModel->cancelSession($sessionId);
        echo json_encode(['status' => 'success', 'message' => 'La session a été annulée avec succès.']);
    }
}

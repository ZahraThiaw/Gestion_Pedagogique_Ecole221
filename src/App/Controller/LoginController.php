<?php
// namespace App\Controller;

// use App\Controller\SecurityDatabase;
// use Core\Controller\Controller;
// use Core\Session\SessionInterface;
// use Core\Validator\ValidatorInterface;

// class LoginController extends Controller
// {
//     private SecurityDatabase $security;

//     public function __construct(SessionInterface $session, ValidatorInterface $validator, SecurityDatabase $securityDatabase)
//     {
//         parent::__construct($session, $validator);
//         $this->security = $securityDatabase;
//     }

//     public function showLogin()
//     {
//         $this->renderView('login');
//     }

//     public function login()
//     {
//         // 1. Validation des entrées
//         $this->validator->addRule('username', 'required', 'Le champ {field} est requis.');
//         $this->validator->addRule('password', 'required', 'Le champ {field} est requis.');

//         if (!$this->validator->validate($_POST)) {
//             $this->renderView('login', ['errors' => $this->validator->getErrors()]);
//             return;
//         }

//         $username = $_POST['username'];
//         $password = $_POST['password'];

//         // 2. Vérification des informations de connexion
//         $user = $this->security->login($username, $password);

        

//         if (!$user) {
//             $this->renderView('login', ['errors' => ['Identifiant ou mot de passe incorrect']]);
//             return;
//         }

//         // Stocker les informations de l'utilisateur dans la session
//         $this->session->set('user', $user->toArray());


//         $role = $this->security->getRole($user->rolesId);

//         if ($role && $role->getLibelle() == 'Professeur') {
//             $this->redirect('/listercoursprof');
//             return;
//         } else {
//             $this->renderView('login', ['errors' => ['Accès refusé']]);
//         }
//     }

//     public function logout()
//     {
//         $this->security->logout();
//     }
// }



namespace App\Controller;

use App\Controller\SecurityDatabase;
use Core\Controller\Controller;
use Core\Session\SessionInterface;
use Core\Validator\ValidatorInterface;

class LoginController extends Controller
{
    private SecurityDatabase $security;

    public function __construct(SessionInterface $session, ValidatorInterface $validator, SecurityDatabase $securityDatabase)
    {
        parent::__construct($session, $validator);
        $this->security = $securityDatabase;
    }

    public function showLogin()
    {
        $this->renderView('login');
    }

    public function login()
    {
        // Validation des entrées
        $this->validator->addRule('username', 'required', 'Le champ {field} est requis.');
        $this->validator->addRule('password', 'required', 'Le champ {field} est requis.');

        if (!$this->validator->validate($_POST)) {
            $this->renderView('login', ['errors' => $this->validator->getErrors()]);
            return;
        }

        $username = $_POST['username'];
        $password = $_POST['password'];

        // Vérification des informations de connexion
        $user = $this->security->login($username, $password);

        if (!$user) {
            $this->renderView('login', ['errors' => ['Identifiant ou mot de passe incorrect']]);
            return;
        }

        // Stocker les informations de l'utilisateur dans la session
        $this->session->set('user', $user->toArray());

        // Vérifier le rôle de l'utilisateur
        $role = $this->security->getRole($user->rolesId);

        if ($role && $role->getLibelle() == 'Professeur') {
            $this->redirect('/listercoursprof');
        } else {
            $this->renderView('login', ['errors' => ['Accès refusé']]);
        }
    }

    public function logout()
    {
        $this->session->destroy();
        $this->redirect('/login');
    }
}

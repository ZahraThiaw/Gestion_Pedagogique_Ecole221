<?php
// namespace App\Controller;

// use App\App;
// use App\Entity\ClientEntity;
// use App\Entity\RoleEntity;
// use Core\Controller\AbstractController;
// use Core\Controller\Controller;
// use Core\Database\DatabaseInterface;
// use Core\Database\MysqlDatabase;
// use Core\Session;
// use Core\Validator;

// class SecurityDatabase extends Controller
// {
//     private DatabaseInterface $database;
//     public function __construct(DatabaseInterface $database)
//     {
//         $this->database = $database;
//     }


//     public function login($username, $password)
//     {
       
//         $user = $this->database->prepare("SELECT * FROM utilisateurs WHERE email = :email",["email"=>$username],ClientEntity::class,true);
//         if ($user && password_verify($password, $user->getPassword())) {
//             return $user;
//         }

//         return null;
//     }

//     public function getRole(int $id){
//         return $this->database->prepare("SELECT * FROM roles WHERE id = :id",["id"=>$id],RoleEntity::class,true);
//     }
//     public function logout()
//     {
//         $this->session->close();
//         header('Location: /login');
//     }


//     public function isLogged(){
//        if($this->session->get('user')){
//            return true;
//        }
//        return false;
//     }




// }


namespace App\Controller;

use App\Entity\ClientEntity;
use App\Entity\RoleEntity;
use App\Entity\UtilisateurEntity;
use Core\Controller\Controller;
use Core\Database\DatabaseInterface;
use Core\Session\SessionInterface;

class SecurityDatabase extends Controller
{
    private DatabaseInterface $database;

    public function __construct(DatabaseInterface $database, SessionInterface $session)
    {
        $this->session = $session;
        $this->database = $database;
    }

    public function login($username, $password)
    {
        $data = $this->database->prepare("SELECT * FROM utilisateurs ", [], UtilisateurEntity::class, false);
        $user = $this->database->prepare("SELECT * FROM utilisateurs WHERE email = :login", ["login" => $username], UtilisateurEntity::class, true);
        
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        if ($user && password_verify($password, $user->getMotDePasse())) {
            return $user;
        }

        return null;
    }

    public function getRole(int $id)
    {
        return $this->database->prepare("SELECT * FROM roles WHERE id = :id", ["id" => $id], RoleEntity::class, true);
    }

    public function logout()
    {
        $this->session->close();
        header('Location: /login');
    }

    public function isLogged()
    {
        return $this->session->get('user') !== null;
    }
}

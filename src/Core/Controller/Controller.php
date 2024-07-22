<?php
namespace Core\Controller;


use Core\Controller\AbstractController;
use Core\Session;
use Core\Session\SessionInterface;
use Core\Validator\ValidatorInterface;

class Controller extends AbstractController{
    
    protected SessionInterface $session;
    protected ValidatorInterface $validator;
    public function __construct(SessionInterface $session, ValidatorInterface $validator)
    {
        $this->session = $session;
        $this->validator = $validator;
    }

    public function renderView($view, $data = []){
        extract($data);
        
        if (!$this->session->get('user')) {
            //include "../Views/layout/header.php";
        }
        
        include  "../Views/$view.php";
    }

    public function redirect($url, $data = []){
        extract($data);
        header('Location: ' . $url);
    }

    public function toJson($data = []){
        return json_encode($data);
    }

    public function fromJson($file){
        return json_decode(file_get_contents($file), true);
    }

    public function uploadImage($file, $name) {
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = $name . '.' . $extension;
        move_uploaded_file($file['tmp_name'], '../public/img/upload/' . $filename);
        var_dump($filename);
        return $filename;
    
    
    }
   public  function uploadImages($newFileName) {

    if (!isset($_FILES['photo'])) {
        echo "Erreur : aucun fichier téléchargé.";
        return false;
    }
        $uploadDir =  '../public/img/upload/';
        $uploadFile = $uploadDir . basename($_FILES['photo']['name']);
        $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
        $newFilePath = $uploadDir . $newFileName . '.' . $imageFileType;
        
        // Vérifier si le fichier est une image
        $check = getimagesize($_FILES['photo']['tmp_name']);
        if ($check === false) {
            echo "Le fichier n'est pas une image.";
            return false;
        }
    
        // Vérifier si le fichier existe déjà
        if (file_exists($newFilePath)) {
            echo "Désolé, le fichier existe déjà.";
            return false;
        }
    
       
       
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($imageFileType, $allowedTypes)) {
            echo "Désolé, seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.";
            return false;
        }
    
        // Déplacer le fichier téléchargé
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $newFilePath)) {
            return  $newFileName . '.' . $imageFileType;
        } else {
            echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
            return false;
        }
    }
    

   


    
}
<?php
// namespace Core\Validator;

// use App\App;
// use Core\Session\Session;

// class Validator implements ValidatorInterface
// {
//     private $errors = [];
//     private $clientModel ;

   
//  public function __construct(){
//      $this->clientModel = App::getInstance()->getModel('Client');
//  }

//  public function addRule(string $field, callable $rule, $message)
//  {
//      $this->rules[$field][] = $rule;
//      $this->messages[$field] = $message;    
//  }
   
  

//     public function failed()
//     {
//         return !empty($this->errors);
//     }

//     public function errors()
//     {
//         return $this->errors;
//     }

//     public function validateImage($file){
//         $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
//         $validExtensions = ['jpg', 'jpeg', 'png', 'gif'];
//         if (!in_array($extension, $validExtensions)) {
//             $this->errors[] = "Extension invalide";
//         }

//         if ($file['size'] > 500000) {
//             $this->errors[] = "Le fichier est trop volumineux";
//         }

//     }

//     public function getErrors()
//     {
//         return $this->errors;
//     }
   



//     public function validate($data, $rules)
//     {
//         foreach ($rules as $champ => $rule) {
//             $value = isset($data[$champ]) ? $data[$champ] : null;
//             $reflection = new \ReflectionClass($this);
//             $methodName = 'validate' . ucfirst($champ);
//             if ($reflection->hasMethod($methodName)) {
//                 $this->$methodName($champ, $value);
//             } 
        
//         }
//     }

//     public function validatetext($champ, $value){
        
//         if (empty($value)) {
//             $this->errors[$champ] = "  $champ est obligatoire.";
//            return;
//         }
//         if(!preg_match('/^[a-zA-Z]+$/', $value)){
//             $this->errors[$champ] = "  $champ n'est pas valide.";
//             return;
//         }
//      //   Session::set($champ, $value);
        
//     }

//     public function validatePrenom($champ, $value){
//         return $this->validatetext($champ, $value);
//     }

//     public function validateNom($champ, $value){
//         return $this->validatetext($champ, $value);
//     }

//     public function validateEmail($champ, $value){
//         $clients = $this->clientModel->all();
//         foreach($clients as $client){
//             if($client->getLogin() == $value){
//                 $this->errors[$champ] = "  $champ existe déjà.";
//                 return;
//             }
//         }
       
        
//         if(empty($value)){
//             $this->errors[$champ] = "  $champ est obligatoire.";
//             return;
//         }
//         if(!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $value)){
//             $this->errors[$champ] = "  $champ n'est pas valide.";
//             return;
//         }
//        // Session::set($champ, $value);

//     }

//     public function validateTelephone($champ, $value){
//         $clients = $this->clientModel->all();
//         foreach($clients as $client){
//             if($client->getPhone() == $value){
//                 $this->errors[$champ] = "  $champ existe déjà.";
//                 return;
//             }
//         }
//         if(empty($value)){
//             $this->errors[$champ] = "  $champ est obligatoire.";
//             return;
//         }
//         if(!preg_match('/^[0-9]{9}$/', $value)){
//             $this->errors[$champ] = "  $champ n'est pas valide.";
//             return;
//         }
//       //  Session::set($champ, $value);
//     }
//     public function validatePhoto($champ, $value){
//         $check = getimagesize($_FILES['photo']['tmp_name']);
//         if(!$check){
//             $this->errors[$champ] = "  $champ n'est pas une image.";
//             return;
//         }

//     }

// }



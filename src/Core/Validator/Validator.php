<?php
// namespace Core\Validator;

// use Core\Session\Session;
// use Symfony\Component\Yaml\Yaml;

// class Validator implements ValidatorInterface
// {
//     private $rules = [];
//     private $messages = [];
//     private $errors = [];
//     private $validators = [];
//     private $session;

   

//     public function __construct()
//     {
//         $config = Yaml::parseFile('../src/Config/Config.yaml');
//         $version = $config['validator_version'];
//         if (!isset($config['validation'][$version])) {
//             throw new \Exception("Validation version $version not found.");
//         }

//         $this->rules = $config['validation'][$version]['rules'];
//         $this->messages = $config['validation'][$version]['messages'];
//         $this->session = new Session();

//         $this->validators = [
            
//             'required' => function ($value) {
//                 return !empty($value);
//             },
//             'minLength' => function ($value, $ruleValue) {
//                 return strlen($value) >= $ruleValue;
//             },
//             'format' => function ($value, $ruleValue) {
//                 if ($ruleValue === 'email') {
//                     return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
//                 }
//                 if ($ruleValue === 'phone') {
//                     return preg_match('/^(77|76|75|70)[0-9]{7}$/', $value);
//                 }
//                 return false;
//             },
           


//         ];
//     }

//     public function addRule(string $field, callable $rule, $message)
//     {
//         $this->rules[$field][] = $rule;
//         $this->messages[$rule] = $message;
//     }

    
    

//         public function validate(array $data): bool
//     {
//         $this->errors = [];

//         foreach ($this->rules as $field => $rules) {
//             foreach ($rules as $rule => $ruleValue) {
//                 if (is_int($rule)) {
//                     $rule = $ruleValue;
//                     $ruleValue = null; 
//                 }

//                 if (!isset($this->validators[$rule])) {
//                     throw new \Exception("Validation rule $rule does not exist.");
//                 }

//                 $isValid = $this->validators[$rule]($data[$field] ?? null, $ruleValue);

//                 if (!$isValid) {
//                     $this->errors[$field][] = $this->getMessage($field, $rule, $ruleValue);
//                 }else {
//                   //  $this->session->set($field,$field);
//                 }
//             }
//         }

//         return empty($this->errors);
//     }
//     private function getMessage($field, $rule, $value)
//     {
//         $message = str_replace(['{field}', '{value}'], [$field, $value], $this->messages[$rule]);
//         return $message;
//     }

    
//     public function getErrors(): array
//     {
//         return $this->errors;
//     }


  

// }




// namespace Core\Validator;

// use Core\Session\Session;
// use Symfony\Component\Yaml\Yaml;

// class Validator implements ValidatorInterface
// {
//     private $rules = [];
//     private $messages = [];
//     private $errors = [];
//     private $validators = [];
//     private $session;

//     public function __construct()
//     {
//         $config = Yaml::parseFile('../src/Config/Config.yaml');
//         $version = $config['validator_version'];
//         if (!isset($config['validation'][$version])) {
//             throw new \Exception("Validation version $version not found.");
//         }

//         $this->rules = $config['validation'][$version]['rules'];
//         $this->messages = $config['validation'][$version]['messages'];
//         $this->session = new Session();

//         $this->validators = [
//             'required' => function ($value) {
//                 return !empty($value);
//             },
//             'minLength' => function ($value, $ruleValue) {
//                 return strlen($value) >= $ruleValue;
//             },
//             'format' => function ($value, $ruleValue) {
//                 if ($ruleValue === 'email') {
//                     return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
//                 }
//                 if ($ruleValue === 'phone') {
//                     return preg_match('/^(77|76|75|70)[0-9]{7}$/', $value);
//                 }
//                 return false;
//             },
//         ];
//     }

//     public function addRule(string $field, callable $rule, $message)
//     {
//         $this->rules[$field][] = $rule;
//         $this->messages[$rule] = $message;
//     }

//     public function validate(array $data): bool
//     {
//         $this->errors = [];

//         foreach ($this->rules as $field => $rules) {
//             foreach ($rules as $rule => $ruleValue) {
//                 if (is_int($rule)) {
//                     $rule = $ruleValue;
//                     $ruleValue = null; 
//                 }

//                 if (!isset($this->validators[$rule])) {
//                     throw new \Exception("Validation rule $rule does not exist.");
//                 }

//                 $isValid = $this->validators[$rule]($data[$field] ?? null, $ruleValue);

//                 if (!$isValid) {
//                     $this->errors[$field][] = $this->getMessage($field, $rule, $ruleValue);
//                 }
//             }
//         }

//         return empty($this->errors);
//     }

//     private function getMessage($field, $rule, $value)
//     {
//         $message = str_replace(['{field}', '{value}'], [$field, $value], $this->messages[$rule]);
//         return $message;
//     }

//     public function getErrors(): array
//     {
//         return $this->errors;
//     }
// }

namespace Core\Validator;

use Core\Session\Session;
use Symfony\Component\Yaml\Yaml;

class Validator implements ValidatorInterface
{
    private $rules = [];
    private $messages = [];
    private $errors = [];
    private $validators = [];
    private $session;

    public function __construct()
    {
        $config = Yaml::parseFile('../src/Config/Config.yaml');
        $version = $config['validator_version'];
        if (!isset($config['validation'][$version])) {
            throw new \Exception("Version de validation $version non trouvée.");
        }

        $this->rules = $config['validation'][$version]['rules'];
        $this->messages = $config['validation'][$version]['messages'];
        $this->session = new Session();

        $this->validators = [
            'required' => function ($value) {
                return !empty($value);
            },
            'minLength' => function ($value, $ruleValue) {
                return strlen($value) >= $ruleValue;
            },
            'format' => function ($value, $ruleValue) {
                if ($ruleValue === 'email') {
                    return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
                }
                if ($ruleValue === 'phone') {
                    return preg_match('/^(77|76|75|70)[0-9]{7}$/', $value);
                }
                return false;
            },
        ];
    }

    public function addRule(string $field, string $rule, string $message, $ruleValue = null)
    {
        if (!isset($this->validators[$rule])) {
            throw new \Exception("La règle de validation $rule n'existe pas.");
        }

        $this->rules[$field][] = ['rule' => $rule, 'value' => $ruleValue];
        $this->messages[$rule] = $message;
    }

    public function validate(array $data): bool
    {
        $this->errors = [];

        foreach ($this->rules as $field => $rules) {
            foreach ($rules as $ruleData) {
                if (!is_array($ruleData) || !isset($ruleData['rule'])) {
                    continue;  // Ignorer les données de règle invalides
                }

                $rule = $ruleData['rule'];
                $ruleValue = $ruleData['value'];

                if (!isset($data[$field])) {
                    $data[$field] = null;
                }

                if (!isset($this->validators[$rule])) {
                    throw new \Exception("La règle de validation $rule n'existe pas.");
                }

                $isValid = $this->validators[$rule]($data[$field], $ruleValue);

                if (!$isValid) {
                    $this->errors[$field][] = $this->getMessage($field, $rule, $ruleValue);
                }
            }
        }

        return empty($this->errors);
    }

    private function getMessage($field, $rule, $value)
    {
        $message = str_replace(['{field}', '{value}'], [$field, $value], $this->messages[$rule]);
        return $message;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}

<?php

namespace App;


use Core\Container\Container;
use Core\Database\DatabaseInterface;
use Core\Validator\Validator;
use Core\Session\Session;
use Symfony\Component\Yaml\Yaml;

class App {
    private static $instance;
    private $database;
    private $container;
    private $session;
    private $validator;

    private function __construct() {
        
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

   

    public  function getContainer()
    {
        if ($this->container === null) {
            $this->container = new Container();
        }
        return $this->container;
    }

    public function getDatabase() {
        if ($this->database === null) {
            $this->database = $this->container->get('database');
        }
        return $this->database;
    }

    public function getValidator()
    {
        if ($this->validator === null) {
            $this->validator = $this->container->get(Validator::class);
        }
        return $this->validator;
    
    //    $reflection = new \ReflectionClass(Validator::class);
      
    //    return $reflection->newInstanceArgs();
    }

    public function getSession(){
        // if ($this->session === null) {
        //     $this->session = $this->container->get(Session::class);

        // }

        // return $this->session;
        $reflection = new \ReflectionClass(Session::class);
        return $reflection->newInstanceArgs();
    }

    public function getModel($model) {
        $db = $this->getDatabase();
        $modelClass = "App\\Model\\" . ucfirst($model) . "Model";
        $reflction = new \ReflectionClass($modelClass);
        return $reflction->newInstanceArgs([$db]);
    }
}
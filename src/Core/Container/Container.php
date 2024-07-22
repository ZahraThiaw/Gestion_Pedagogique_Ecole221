<?php
namespace Core\Container;

use Core\Database\DatabaseInterface;
use Core\Database\MysqlDatabase;
use Core\Session\Session;
use Core\Session\SessionInterface;
use Core\Validator\Validator;
use ReflectionClass;
use Symfony\Component\Yaml\Yaml;

class Container {
    protected $instances = [];
    protected $models = [];

    public function __construct()
    {
        $config = Yaml::parseFile('../src/Config/Service.yaml');

       $this->instances = $config['services'];
       foreach ($this->instances as $key => $value) {
        $this->instances[$key] = $this->createInstance($key);

       }
       
    }

    public function get($class)
    {
       
        // if (key_exists($class, $this->instances) && $this->instances[$class] instanceof $class) {
        //     return $this->instances[$class];
        // }
        $this->instances[$class] = $this->createInstance($class);
        return $this->instances[$class];
    }

    public function getAll(array $data): array
    {
        $result = [];
        // var_dump($data);
        foreach ($data as  $value) {
            if (key_exists($value->name, $this->instances)) {
                $result[] = $this->get($value->name);
            }
        }
        
        return $result;
    }

    // public function createInstance($class){
    //     $reflection = new ReflectionClass($this->instances[$class]);
    //     $constructor = $reflection->getConstructor();
    //     $dependencies = $constructor ? $constructor->getParameters() : [];
    //     $instances = [];

    //     foreach ($dependencies as $dependency) {
    //         $type = $dependency->getType();
    //         if ($type && !$type->isBuiltin()) {
    //             $instances[] = $this->get($type->getName());
    //         }
    //     }

    //     return $reflection->newInstanceArgs($instances);
    // }


    public function createInstance($class)
    {
        if (!isset($this->instances[$class])) {
            throw new \Exception("Service not defined for class: $class");
        }

        $reflection = new ReflectionClass($this->instances[$class]);
        $constructor = $reflection->getConstructor();
        
        if (is_null($constructor)) {
            return new $this->instances[$class];
        }

        $dependencies = $constructor->getParameters();
        $instances = [];

        foreach ($dependencies as $dependency) {
            $type = $dependency->getType();
            if ($type && !$type->isBuiltin()) {
                $typeName = $type->getName();
                $instances[] = $this->get($typeName);
            }
        }

        return $reflection->newInstanceArgs($instances);
    }

}

<?php

namespace Core\Entity;

use Core\Entity\EntiyInterface;
use \stdClass;

abstract class AbstractEntity implements EntityInterface
{
    public function __get( $property ){
        if( isset($this->$property) ){
            $method = 'get'.ucfirst($property);
            return $this->$method();
        }
        return null;
       }

    public function __set( $property, $value ){
        $method = 'set'.ucfirst($property);
        if( method_exists($this, $method) ){
            $this->$method($value);
        }
    }
    //toArray avec reflection
    public function toArray(){
        $reflection = new \ReflectionClass($this);
        $properties = $reflection->getProperties();
        $result = [];
        foreach ($properties as $property) {
            $property->setAccessible(true);
            $result[$property->getName()] = $property->getValue($this);
        }
        return $result;
    }
    //toObject avec reflection
    public function toObject( $obj){
        $reflection = new \ReflectionClass($this);
        $properties = $reflection->getProperties();
        // var_dump($properties[0]->name);
        foreach ($properties as $property) {
            $name = $property->getName();
            $property->setAccessible(true);
            $property->setValue($this, $obj->$name);
        }

        return $this;

    }

      public function __serialize(): array{
          $reflection = new \ReflectionClass($this);
          $properties = $reflection->getProperties();
          $result = [];
          foreach ($properties as $property) {
              $property->setAccessible(true);
              $result[$property->getName()] = $property->getValue($this);
          }
          return $result;
      }
    //   public function __unserialize($data){
    //        $this->toObject($data);
          
    //   }

    public function __unserialize( $data): void {
        // Convertir le tableau en objet avant d'utiliser toObject
        $obj = new \stdClass();
        foreach ($data as $key => $value) {
            $obj->$key = $value;
        }
        $this->toObject($obj);
    }
    
}
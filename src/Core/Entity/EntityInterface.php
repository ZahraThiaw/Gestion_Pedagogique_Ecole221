<?php

namespace Core\Entity;

interface EntityInterface
{
    public function __set($name, $value);
    public function __get($name);
    public function __serialize();
    public function __unserialize($data);

}
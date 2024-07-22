<?php
namespace Core\Controller;

use Core\Session\SessionInterface;
use Core\Validator\ValidatorInterface;

abstract class AbstractController
{
    protected SessionInterface $session;
    protected ValidatorInterface $validator;
    protected $file;
    protected $autorize;

    

    abstract public function renderView($view, $data = []);
    abstract public function redirect($url, $data = []);
    abstract public function toJson($data = []);
    abstract public function fromJson($file);



   
}
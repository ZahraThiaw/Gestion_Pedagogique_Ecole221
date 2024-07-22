<?php
require '../vendor/autoload.php';

use Core\Config\Config;
use Core\Route\Route;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


include_once '../src/Config/Config.php';
require '../routes/web.php';




 Route::dispatch();





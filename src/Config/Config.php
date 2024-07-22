<?php
namespace Config;

use Dotenv\Dotenv;


$dotenv = Dotenv::createImmutable('../');
$dotenv->load();


define('dsn', $_ENV['dsn']);
define('DB_USER', $_ENV['DB_USER']);
define('DB_PASSWORD', $_ENV['DB_PASSWORD']);
define('WEBROOT', $_ENV['WEBROOT']);
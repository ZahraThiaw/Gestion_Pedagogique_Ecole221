<?php
namespace Core\Route;

use App\App;
use Core\Errors\ErrorController;

class Route
{
    public static $routes = [];

    public static function post($uri, $controller, $action)
    {
        self::$routes['POST'][$uri] = [$controller, $action];
    }

    public static function get($uri, $controller, $action)
    {
        self::$routes['GET'][$uri] = [$controller, $action];
    }

    public static function dispatch(){
    $uri = $_SERVER['REQUEST_URI'];
    $method = $_SERVER['REQUEST_METHOD'];
    
    // Nettoyage de l'URI
   // $uri = preg_replace('/\/+/', '/', $uri);
   // $uri = preg_replace('/\?.*/', '', $uri);
    $uriParts = explode('/', trim($uri, '/'));
    $uri = trim($uri, '/');

    $matchedRoute = false;
    
    foreach (self::$routes[$method] as $routeUri => $routeConfig) {
        // Convertir la route en une expression régulière
        $routeUriPattern = preg_replace('/\/+/', '/', $routeUri);
        $routeUriPattern = str_replace('/', '\/', $routeUriPattern);
      //  var_dump($routeUriPattern);
    //   $routePattern = preg_replace('#\#\w+#', '(\w+)', $this->normalizeUri($routeUri));
    //             $routePattern = "#^$routePattern$#";

         $routeUriPattern = "/^{$routeUriPattern}$/";

        if (preg_match($routeUriPattern, $uri, $matches)) {
            array_shift($matches); // Enlever la correspondance complète

            list($controllerName, $actionName) = $routeConfig;
            $controllerClass = "App\\Controller\\{$controllerName}";

            $reflection = new \ReflectionClass($controllerClass);
            

            if ($reflection->isInstantiable()) {
                //recuperer les parametre du constructeur
                $constructor = $reflection->getConstructor();
                $dependencies = $constructor ? $constructor->getParameters() : [];
                $instances = App::getInstance()->getContainer()->getAll($dependencies);
                $controllerObject = $reflection->newInstanceArgs($instances);
               
                if ($reflection->hasMethod($actionName)) {
                    $method = $reflection->getMethod($actionName);
                    $method->invoke($controllerObject, ...$matches); 
                    $matchedRoute = true;
                    break;
                }
            } else {
                (new ErrorController())->loadView('404');
            }
        }
    }

    if (!$matchedRoute) {
        (new ErrorController())->loadView('404');
    }
}



}

<?php
namespace Router;

use Exception;

class Router 
{
    private array $routes;

    public function register(string $path, array $action): void {
        $this->routes[$path] = $action;
    }


    public function resolve(string $uri) {
        $path1 = explode('?', $uri)[0];
        //le nom du dossier du projet est apparente dans 
        //l'url donc je le retire pour prendre l'url la 
        //route uniquement
        $path = str_replace('/projet-2', '', $path1);
        $action = $this->routes[$path];
      
        if(is_array($action)) {
            [$className, $method] = $action;

            if(class_exists(($className)) && method_exists($className, $method)) {
                $classInstance = new $className();
                return $classInstance->$method();
            }

        }

        
        throw new Exception("Route not found exeption");
    }
}
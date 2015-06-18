<?php

namespace Core;

/**
 * Router du l'App
 *
 * @author Amar OUALI <contact@amarouali.fr>
 */
class Router {

    private $app;
    public function __construct($app) {
        $this->app = $app;
    }
    /**
     * @author Amar OUALI <contact@amarouali.fr>
     * Permet de faire le router  
     * @param type $name nom de la méthode request 
     * @param type $arguments Controller@methode
     * @return void
     */
    public function __call($name, $arguments) {
        
        $url = $arguments[0];
        $action = $arguments[1];
        
        return $this->app->$name($url, function() use ($action) {
                    $action = explode('@', $action);
                    $controller_name = '\App\Controllers\\' . $action[0] . 'Controller';
                    $method = $action[1];
                    $controller = new $controller_name($this->app);
                    call_user_func_array([$controller, $method], func_get_args());
                });
    }

}

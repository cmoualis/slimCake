<?php
namespace Core;

/**
 * Description of Router
 *
 * @author Amar OUALI <amar@webcd.fr>
 */
class Router
{
    private $app;
    
    public function __construct($app){
        $this->app = $app;
    }
    
    private function call($request,$url,$action){
        return $this->app->$request($url,function() use ($action){
           $action = explode('@',$action) ;
           $controller_name = '\App\Controllers\\'.$action[0] . 'Controller';
           $method = $action[1];
           $controller = new $controller_name($this->app);
           call_user_func_array([$controller, $method], []);
        });
    }
    
    public function get($url,$action){
        $this->call('get',$url,$action);    
    }
    
    
    public function post($url,$action){
        $this->call('post',$url,$action);    
    }
    
    
}

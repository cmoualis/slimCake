<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Core;

/**
 * Description of Controller
 *
 * @author Amar OUALI <amar@webcd.fr>
 */
class Controller
{
    public $app;
    
    public function __construct($app){
        $this->app = $app;
    }
    
}

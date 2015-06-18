<?php
namespace App\Controllers;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PostsController
 *
 * @author Amar OUALI <amar@webcd.fr>
 */
class PostsController extends \Core\Controller
{
    public function index(){
       $this->app->render('posts/index.php');
    }
}

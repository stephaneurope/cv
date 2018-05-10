<?php
namespace Controller;

require "vendor/autoload.php";
 
class InstagramController{
  
public function instagramView()
  {

    $view = new \Cv\View('instagram');
    $view->generer([]);
    
}
  }
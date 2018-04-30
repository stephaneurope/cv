<?php
namespace Controller;

require "vendor/autoload.php";
 
class CalendarController{
  
public function instagramView()
  {

    $view = new \Cv\View('instagram');
    $view->generer([]);
    
}
  }
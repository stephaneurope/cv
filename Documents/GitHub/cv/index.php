<?php

require('controller/FrontendController.php'); 


require('routeur.php');
$ctrlfrontend = new \Serri\Cv\FrontendController;
$router = new \Serri\Cv\Routeur;

if (isset($_GET['action'])){
$router->checkUrl($_GET['action']);}
else {
    
    $ctrlfrontend->accueil();

}
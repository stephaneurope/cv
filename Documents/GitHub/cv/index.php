<?php
require "vendor/autoload.php";

$ctrlfrontend = new \Controller\FrontendController;
$routeur = new \Stephan\Routeur;

if (isset($_GET['action'])){
$routeur->checkUrl($_GET['action']);}
else {
    
    $ctrlfrontend->accueil();

}
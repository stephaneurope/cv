<?php
require "vendor/autoload.php";

$ctrlfrontend = new \Controller\FrontendController;
$routeur = new \Serri\Routeur;

if (isset($_GET['action'])){
$routeur->checkUrl($_GET['action']);}
else {
    
    $ctrlfrontend->accueil();

}
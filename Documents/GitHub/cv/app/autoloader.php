<?php
namespace Forteroche\Blog\Model;
class Autoloader{

    /**
     * Enregistre notre autoloader
     */
    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * Inclue le fichier correspondant à notre classe
     * @param $class string Le nom de la classe à charger
     */
    static function autoload($Manager){
        require 'class/' . $Manager . '.php';
       
    }
   static function autoload($FrontendController){
       
        require 'class/controller/' . $FrontendController . '.php';
    }
}
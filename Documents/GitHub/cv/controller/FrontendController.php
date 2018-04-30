<?php
namespace Controller;

require_once('app/MessageFlash.php');

require "vendor/autoload.php"; 


class FrontendController{

  
  public function accueil()
  {
    $adminManager = new \Model\AdminManager();
    $result = $adminManager->identity();  
    $folioManager = new \Model\FolioManager();
    $portfolio = $folioManager->getFolio2(); 
    $view = new \Cv\View('accueilView');
    $view->generer(['portfolio' => $portfolio,'result'=> $result]);
    
}
public function portfolio()
  {
    $folioManager = new \Model\FolioManager();
    $portfolio = $folioManager->getFolio($_GET['id']); 
    $portfol = $folioManager->getFolio2(); 
  
    $view = new \Cv\View('portfolioView');
    $view->generer(['portfolio'=>$portfolio,'portfol'=>$portfol]);
    
}


  

public function cv()
  {
   
    $adminManager = new \Model\AdminManager();
    $cvManager = new \Model\CvManager();
    $result = $adminManager->identity();  
    $proCv = $cvManager->getProCv();
    $expCv = $cvManager->getExpCv();
    $avCv = $cvManager->getAvCv();
    $edCv = $cvManager->getEdCv();
    $view = new \Cv\View('cvView');

    $view->generer(['proCv' => $proCv,'expCv' => $expCv,'avCv' => $avCv,'edCv' => $edCv, 'result' => $result]);
    
}


public function error()
{
     
    $view = new \Cv\View('errorView');
    $view->generer([]);
    
}
 







}
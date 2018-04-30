<?php
namespace Serri\Cv;

    // Chargement des classes
//require_once('model/AdminManager.php');
//require_once('model/FolioManager.php');
//require_once('model/CvManager.php');
//require_once('view/frontend/view.php');
//require_once('app/MessageFlash.php');

require "/vendor/autoload.php"; 


class FrontendController{

  
  public function accueil()
  {
    $adminManager = new \Serri\Cv\AdminManager();
    $result = $adminManager->identity();  
    $folioManager = new \Serri\Cv\FolioManager();
    $portfolio = $folioManager->getFolio2(); 
    $view = new \Serri\Cv\View('accueilView');
    $view->generer(['portfolio' => $portfolio,'result'=> $result]);
    
}
public function portfolio()
  {
    $folioManager = new \Serri\Cv\FolioManager();
    $portfolio = $folioManager->getFolio($_GET['id']); 
    $portfol = $folioManager->getFolio2(); 
  
    $view = new \Serri\Cv\View('portfolioView');
    $view->generer(['portfolio'=>$portfolio,'portfol'=>$portfol]);
    
}


  

public function cv()
  {
   
    $adminManager = new \Serri\Cv\AdminManager();
    $cvManager = new \Serri\Cv\CvManager();
    $result = $adminManager->identity();  
    $proCv = $cvManager->getProCv();
    $expCv = $cvManager->getExpCv();
    $avCv = $cvManager->getAvCv();
    $edCv = $cvManager->getEdCv();
    $view = new \Serri\Cv\View('cvView');

    $view->generer(['proCv' => $proCv,'expCv' => $expCv,'avCv' => $avCv,'edCv' => $edCv, 'result' => $result]);
    
}


public function error()
{
     
    $view = new View('errorView');
    $view->generer([]);
    
}
 







}
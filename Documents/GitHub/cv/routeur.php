<?php
namespace  Serri\Cv;
require_once('controller/FrontendController.php'); 
//require_once 'app/autoloader.php'; 
//Autoloader::register(); 
require_once('controller/BackendController.php');
require_once('controller/AdminController.php');
require_once('controller/ContactController.php');
require_once('app/MessageFlash.php'); 
//require "/app/vendor/autoload.php";
use Exception;
class Routeur {


  public function checkUrl(){
    $ctrlfrontend = new \Serri\Cv\FrontendController;
    $ctrlBackend = new \Serri\Cv\BackendController();
    $ctrlAdmin = new \Serri\Cv\AdminController();
    $ctrlContact = new \Serri\Cv\ContactController();

    $tab_action = array("accueil","contact","portfolio","contactForm","cv",'profilPersonnel','experienceProfessionnel','competences','education','boardCv',"portfolioInsert","portfolioInsertAction","connect",'boardFolio','boardPrincipal','projectView','cleanProject','eraseProject','connexion','deconnexion','portfolioModifAction','portfolioModif','updateProfilPersonnel','updateExperienceProfessionnel','updateCompetence','updateEducation','ajoutExPro','cvInsertExpro','InsertComp','ajoutComp','ajoutEduc','cvInsertEduc','deleteExPro','deleteExp','deleteComp','deleteCompet','deleteEduc','deleteEduca','profil','updateProfil');
   
 

    /*********page de vue utilisateur**********/  

    try{
      if (isset($_GET['action']) && in_array($_GET['action'], $tab_action)){
     /*********Affichage de la page d'accueil**********/ 
        if ($_GET['action'] == 'accueil') {
          $ctrlfrontend->accueil();
          
        }
        /*********page portfolio**********/ 
        elseif ($_GET['action'] == 'portfolio') {  
        session_start();  
            $ctrlfrontend->portfolio();       
      }
      
       /*********connexion**********/ 
       elseif ($_GET['action'] == 'connect'){
        $ctrlBackend->connect(); 
            
      }
      /*********Affiche la vue du contact**********/ 
       elseif ($_GET['action'] == 'contact'){
        session_start();
        $ctrlContact->contact(); 
       
      }
      /*********envoie le message**********/ 
      elseif ($_GET['action'] == 'contactForm'){
        session_start(); 
         $ctrlContact->contactForm();
         header('location:index.php?action=contact');
      }
      /*********Affichage de la page CV**********/ 
     elseif ($_GET['action'] == 'cv'){
      session_start();
         $ctrlfrontend->cv();
      }
      
       /*********Update du profil professionnel**********/ 
     elseif ($_GET['action'] == 'updateProfilPersonnel'){
         $ctrlBackend->updateProfilPersonnel($_POST['profil']);
      }
      
      /*********Update de l'experience professionnelle**********/ 
     elseif ($_GET['action'] == 'updateExperienceProfessionnel'){
      if (isset($_GET['id']) && $_GET['id'] > 0) {
         $ctrlBackend->updateExperienceProfessionnel($_GET['id'],$_POST['title'],$_POST['period'],$_POST['description']);}
         else{
      throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir');
    }

      }
      /*********Update des competences**********/ 
     elseif ($_GET['action'] == 'updateCompetence'){
      if (isset($_GET['id']) && $_GET['id'] > 0) {
         $ctrlBackend->updateCompetence($_GET['id'],$_POST['avantage']);
         var_dump($_POST);}
         else{
      throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir');
    }
      }
      /*********Update education**********/ 
     elseif ($_GET['action'] == 'updateEducation'){
      if (isset($_GET['id']) && $_GET['id'] > 0) {
         $ctrlBackend->updateEducation($_GET['id'],$_POST['title_education'],$_POST['title_secondary'],$_POST['description_education']);}
         else{
      throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir');
    }
      }

    
      /*********insertion d'un nouveau projet**********/ 
elseif ($_GET['action'] == 'portfolioInsertAction'){
  if (isset($_GET['id']) && $_GET['id'] > 0) {
         $ctrlBackend->portfolioInsertAction(($_FILES['image']['name']),$_POST['description'],$_POST['techno'],$_POST['comment'],$_POST['titre'], $_POST['liens']);}
         else{
      throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir');
    }
      }
     
      /*********insertion d'une nouvelle experience professionnelle**********/ 
elseif ($_GET['action'] == 'cvInsertExpro'){

         $ctrlBackend->insertExPro($_POST['title'],$_POST['period'],$_POST['description']);
         
      }
      /*********insertion d'une nouvelle competence**********/ 
elseif ($_GET['action'] == 'InsertComp'){
 
         $ctrlBackend->insertCompetence($_POST['avantage']);
         
      }

      /*********insertion d'une nouvelle ecole**********/ 
elseif ($_GET['action'] == 'cvInsertEduc'){
 
         $ctrlBackend->insertEducation($_POST['title_education'],$_POST['title_secondary'],$_POST['description_education']);

      }
      
       /*********Supression de l'experience**********/ 
      elseif ($_GET['action'] == 'deleteExPro'){
        if (isset($_GET['id']) && $_GET['id'] > 0) {
         $ctrlBackend->deleteExPro($_GET['id']);}
         else{
      throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir');
    }

      }
      
       /*********Supression des competences**********/ 
      elseif ($_GET['action'] == 'deleteCompet'){
        if (isset($_GET['id']) && $_GET['id'] > 0) {
         $ctrlBackend->deleteCompet($_GET['id']);}
         else{
      throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir');
    }

      }
      
        /*********Supression de l'education**********/ 
      elseif ($_GET['action'] == 'deleteEduca'){
        if (isset($_GET['id']) && $_GET['id'] > 0) {
         $ctrlBackend->deleteEduca($_GET['id']);}
         else{
      throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir');
    }

      }

      /*****************************************************/
      /**************Pages à droit restreint***************/
      /***************************************************/
/*********page vue des projets**********/ 
        elseif ($_GET['action'] == 'projectView') { 
           session_start();
        if($_SESSION['id'] && $_SESSION['pseudo']){
            $ctrlBackend->projectView(); }else{
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');
         
         
    }      
      }

/*********Affichage de la page de modif du profil professionnel**********/ 
     elseif ($_GET['action'] == 'profilPersonnel'){
      session_start();
        if($_SESSION['id'] && $_SESSION['pseudo']){
         $ctrlBackend->profilPersonnel();
       }else{
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');
         
         
    }
      }

/*********Affichage de la page de modif de l'experience professionnel**********/ 
     elseif ($_GET['action'] == 'experienceProfessionnel'){
       session_start();
        if($_SESSION['id'] && $_SESSION['pseudo']){
         $ctrlBackend->experienceProfessionnel();}else{
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');
         
         
    }
      }
       /*********Affichage de la page de modif des compétences**********/ 
     elseif ($_GET['action'] == 'competences'){
      session_start();
        if($_SESSION['id'] && $_SESSION['pseudo']){
         $ctrlBackend->competences();}else{
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');
         
         
    }
      }
      /********Page de validation de supression d'un projet***************/
    elseif ($_GET['action'] == 'cleanProject'){
     if (isset($_GET['id']) && $_GET['id'] > 0) {
      session_start();
     if($_SESSION['id'] && $_SESSION['pseudo']){
        $ctrlBackend->cleanProject($_GET['id']);
      } else{
        throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');
      }
    }else{
      throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir');
    }
  }

/*********Affichage de la page de modif d'education**********/ 
     elseif ($_GET['action'] == 'education'){
     session_start();
        if($_SESSION['id'] && $_SESSION['pseudo']){  
         $ctrlBackend->education();}else{
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');
         
         
    }
      }
      /*********affiche la page d'insertion de nouveau projet**********/  
elseif ($_GET['action'] == 'portfolioInsert'){
  session_start();
        if($_SESSION['id'] && $_SESSION['pseudo']){
         $ctrlBackend->portfolioInsert(); }else{
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');
         
         
    } 
      }

 /*********affichage du boarFolio**********/ 
elseif ($_GET['action'] == 'boardFolio'){
 session_start();
        if($_SESSION['id'] && $_SESSION['pseudo']){  
         $ctrlBackend->boardFolio();}else{
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');      
    } 
         
      }
      /*********affichage du boarCv**********/ 
elseif ($_GET['action'] == 'boardCv'){
   session_start();
        if($_SESSION['id'] && $_SESSION['pseudo']){  
         $ctrlBackend->boardCv();}else{
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');      
    } 
         
      }
      /*********affichage de l'interface**********/ 
elseif ($_GET['action'] == 'boardPrincipal'){
   session_start();
        if($_SESSION['id'] && $_SESSION['pseudo']){  
         $ctrlBackend->boardPrincipal();}else{
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');      
    } 
         
      }
      /*********affichage de l'ajout de l'experience professionnelle**********/ 
elseif ($_GET['action'] == 'ajoutExPro'){
   session_start();
        if($_SESSION['id'] && $_SESSION['pseudo']){  
         $ctrlBackend->ajoutExPro();}else{
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');      
    } 
         
      }

/*********affichage de l'ajout de competence**********/ 
elseif ($_GET['action'] == 'ajoutComp'){
   session_start();
        if($_SESSION['id'] && $_SESSION['pseudo']){  
         $ctrlBackend->ajoutComp();}else{
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');      
    } 
         
      }
      /*********affichage de l'ajout d'ecole'**********/ 
elseif ($_GET['action'] == 'ajoutEduc'){
   session_start();
        if($_SESSION['id'] && $_SESSION['pseudo']){  
         $ctrlBackend->ajoutEduc();}else{
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');      
    } 
         
      }

/*********affichage de la supression de l'experience**********/ 
elseif ($_GET['action'] == 'deleteExp'){
    session_start();
        if($_SESSION['id'] && $_SESSION['pseudo']){  
         $ctrlBackend->deleteExp();}else{
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');      
    } 
         
      }

/*********affichage de la supression des competences**********/ 
elseif ($_GET['action'] == 'deleteComp'){
   session_start();
        if($_SESSION['id'] && $_SESSION['pseudo']){  
         $ctrlBackend->deleteCompetences();
         }else{
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');      
    } 
      }

/*********affichage de la supression de l'education**********/ 
elseif ($_GET['action'] == 'deleteEduc'){
   session_start();
        if($_SESSION['id'] && $_SESSION['pseudo']){  
         $ctrlBackend->deleteEducation();}else{
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');      
    } 
         
      }
elseif ($_GET['action'] == 'portfolioModif'){
   session_start();
        if($_SESSION['id'] && $_SESSION['pseudo']){ 
         $ctrlBackend->portfolioModif($_GET['id']);
         header('location:index.php?action=boardPrincipal');
      }else{
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');      
    }    
      } 

   elseif ($_GET['action'] == 'profil'){
   session_start();
        if($_SESSION['id'] && $_SESSION['pseudo']){ 
         $ctrlAdmin->profil();
    
      }else{
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');      
    }    
      }     
elseif ($_GET['action'] == 'updateProfil'){
 
   session_start();
        if($_SESSION['id'] && $_SESSION['pseudo']){ 
         $ctrlAdmin->updateProfil($_POST['pseudo'],$_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['web'],$_POST['mobile']);
   
     } 
    }     


/************** connexion et déconnexion *****************/
elseif ($_GET['action'] == 'connexion'){
 if (!empty($_POST['pseudo']) && !empty($_POST['pass'])){
  $ctrlAdmin->connexion($_POST['pseudo'],$_POST['pass']);} 
  else {
   $Session = new \Serri\Cv\MessageFlash();
   $Session->setFlash('Tous les champs ne sont pas remplis','');
   header('Location: index.php?action=connect');

 }
}
elseif ($_GET['action'] == 'deconnexion'){

  $ctrlAdmin->deleteSession();    
}


/************** modification d'un projet *****************/   
 
  
elseif ($_GET['action'] == 'portfolioModifAction') {
  if (isset($_GET['id']) && $_GET['id'] > 0) {
   
     $ctrlBackend->portfolioModifAction($_GET['id'],($_FILES['image']['name']),$_POST['description'],$_POST['techno'],$_POST['comment'],$_POST['titre'], $_POST['liens']);
}else{
     throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir');
    }

}


}else{throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir');}

   } catch(Exception $e){ // S'il y a eu une erreur, alors...
  session_start();
   $ctrlfrontend->error();?>
 <div class="exception"> <?php echo( $e->getMessage() ."\n"); ?> </div> <?php
   
   
  }

} 
} ?>
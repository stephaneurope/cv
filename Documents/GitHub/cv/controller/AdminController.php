<?php
namespace Serri\Cv;
  // Chargement des classes
//require_once('model/FolioManager.php');
//require_once('model/AdminManager.php');
//require_once('view/frontend/view.php');
//require_once('app/MessageFlash.php');
 require "/vendor/autoload.php"; 
class AdminController{
  
 public function connexion($pseudo,$pass) {
  $adminManager = new \Serri\Cv\AdminManager();
  $resultat = $adminManager->connected($pseudo,$pass);
  
  
  $isPasswordCorrect = password_verify($_POST['pass'],$resultat['pass']);
  
  if (!$resultat)
  {
   $Session = new \Serri\Cv\MessageFlash();
   $Session->setFlash('Mauvais identifiant ou mot de Passe','');
   header('Location: index.php?action=connect');
   exit;
 }
 else
 {
  if ($isPasswordCorrect) {
    
   if (!empty($_POST['pseudo']) && !empty($_POST['pass'])){
    
    $Session = new \Serri\Cv\MessageFlash();
    $_SESSION['id'] = $resultat['id'];
    $_SESSION['pseudo'] = $pseudo;
    
    $Session->setFlash('Vous etes connecté','');
    
    header('Location: index.php?action=boardPrincipal'); 
    exit;
  }   
  
}
else {
  $Session = new \Serri\Cv\MessageFlash();
  $Session->setFlash('Mauvais identifiant ou mot de Passe','');
  header('Location: index.php?action=connect');
  exit;
}
}
}

public function deleteSession() {
 session_start();

  // Suppression des variables de session et de la session
 $_SESSION = array();
 session_destroy();

  // Suppression des cookies de connexion automatique
 setcookie('login', '');
 setcookie('pass', '');
 header('Location: index.php');
 exit;
}
public function profil(){
$adminManager = new \Serri\Cv\AdminManager();
    $result = $adminManager->identity();  
$view = new View('profil');
$session = new \Serri\Cv\MessageFlash();
   $view->generer(['result' => $result,'session' => $session]);
}

public function updateProfil($pseudo, $nom, $prenom,$mail, $web, $mobile) {
  if (!empty(htmlspecialchars(ltrim($_POST['pseudo']))) && !empty(htmlspecialchars(ltrim($_POST['nom']))) && !empty(htmlspecialchars(ltrim($_POST['prenom']))) && !empty(htmlspecialchars(ltrim($_POST['mail']))) && !empty(htmlspecialchars(ltrim($_POST['web']))) && !empty(htmlspecialchars(ltrim($_POST['mobile'])))){
$adminManager = new \Serri\Cv\AdminManager();
$reaffected = $adminManager->updateIdentity($pseudo, $nom, $prenom,$mail, $web, $mobile); 
$session = new \Serri\Cv\MessageFlash();
   $session->setFlash('Votre profil a été modifié','');
   header('location:index.php?action=profil');}else{
          $Session = new \Serri\Cv\MessageFlash();
          $Session->setFlash('Vous n\'avez pas rempli tous les champs',''); 
          header('location:index.php?action=profil');
          exit;
      }
}

}
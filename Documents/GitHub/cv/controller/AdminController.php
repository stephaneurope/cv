<?php
namespace Controller;

require "vendor/autoload.php";
 
class AdminController{
  
 public function connexion($pseudo,$pass) {
  $adminManager = new \Model\AdminManager();
  $resultat = $adminManager->connected($pseudo,$pass);
  
  
  $isPasswordCorrect = password_verify($_POST['pass'],$resultat['pass']);
  
  if (!$resultat)
  {
   $Session = new \App\MessageFlash();
   $Session->setFlash('Mauvais identifiant ou mot de Passe','');
   header('Location: index.php?action=connect');
   exit;
 }
 else
 {
  if ($isPasswordCorrect) {
    
   if (!empty($_POST['pseudo']) && !empty($_POST['pass'])){
    
    $Session = new \App\MessageFlash();
    $_SESSION['id'] = $resultat['id'];
    $_SESSION['pseudo'] = $pseudo;
    
    $Session->setFlash('Vous etes connecté','');
    
    header('Location: index.php?action=boardPrincipal'); 
    exit;
  }   
  
}
else {
  $Session = new \App\MessageFlash();
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
$adminManager = new \Model\AdminManager();
    $result = $adminManager->identity();  
$view = new \Cv\View('profil');
$session = new \App\MessageFlash();
   $view->generer(['result' => $result,'session' => $session]);
}

public function updateProfil($pseudo, $nom, $prenom,$mail, $web, $mobile) {
  if (!empty(htmlspecialchars(ltrim($_POST['pseudo']))) && !empty(htmlspecialchars(ltrim($_POST['nom']))) && !empty(htmlspecialchars(ltrim($_POST['prenom']))) && !empty(htmlspecialchars(ltrim($_POST['mail']))) && !empty(htmlspecialchars(ltrim($_POST['web']))) && !empty(htmlspecialchars(ltrim($_POST['mobile'])))){
$adminManager = new \Model\AdminManager();
$reaffected = $adminManager->updateIdentity($pseudo, $nom, $prenom,$mail, $web, $mobile); 
$session = new \App\MessageFlash();
   $session->setFlash('Votre profil a été modifié','');
   header('location:index.php?action=profil');}else{
          $Session = new \App\MessageFlash();
          $Session->setFlash('Vous n\'avez pas rempli tous les champs',''); 
          header('location:index.php?action=profil');
          exit;
      }
}
public function updateProImg($profil_img){
$image           = ($_FILES['profil_image']['name']);
    $imagePath       = '../cv/public/images/' . basename($image);
    $imageExtension  = pathinfo($imagePath, PATHINFO_EXTENSION);
    $isSuccess       = true;
    $isUploadSuccess = true;
    $isImageUpdated = true;

       if(empty($image)){
        $this->isImageUpdated = false;
    
      }
      else
    {
       $isImageUpdated = true;
       $isUploadSucces = true;
        if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif")
        {
            $imageError = "Les fichiers autorisés sont: .jpg, .jpeg, .png, .gif";
            $isUploadSuccess = false;
        }
        if($_FILES["profil_image"]["size"] > 500000)
        {
            $imageError = "Le fichier ne doit pas dépasser les 500KB";
            $isUploadSuccess = false;
        }
        if($isUploadSuccess)
        {
            if(!move_uploaded_file($_FILES["profil_image"]["tmp_name"], $imagePath))
            {
            $imageError = "Il y a eu une erreur lors de l'upload";
            $isUploadSuccess = false;
            }

      }  
    } 
if(($isSuccess && $isImageUpdated && $isUploadSuccess)||($isSuccess && !$isImageUpdated)) {
$adminManager = new \Model\AdminManager();
 $result = $adminManager->updateProfilImg($profil_img);
 header('location:index.php?action=profil');
}

}

}
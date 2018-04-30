<?php
namespace Serri\Cv;
    // Chargement des classes

//require_once('model/FolioManager.php');
//require_once('view/frontend/view.php');
//require_once('app/MessageFlash.php');
 require "/vendor/autoload.php"; 



class BackendController{
  public $titreError = "" ;
  public $descriptionError = "";
  public $technoError = "";
  public $commentError = "";
  public $imageError = "";
  public $liensError = "";
  public $titre = "";
  public $description = "";
  public $techno = "";
  public $comment = "";
  public $image = "";
  public $liens = "";
  public $isSuccess = true;
  public $imagePath      = '';
  public $imageExtension = '';
  public $isUploadSuccess = false;
  public $isImageUpdated = false;


   public function portfolioInsert()
{
    $view = new View('portfolioInsert');
    $view->generer(['titreError'=>$this->titreError, 'descriptionError'=>$this->descriptionError, 'technoError'=>$this->technoError, 'commentError'=>$this->commentError,'imageError'=>$this->imageError,'liensError'=>$this->liensError,'titre'=>$this->titre,'description'=>$this->description,'techno'=>$this->techno,'comment'=>$this->comment,'image'=>$this->image,'liens'=>$this->liens,'isSuccess'=>$this->isSuccess]);
  }
public function portfolioInsertAction($image, $description, $techno, $comment, $titre,$liens)
{

    

  if(!empty($_POST))
{
    $this->titre           = ($_POST['titre']);
    $this->description     = ($_POST['description']);
    $this->techno          = ($_POST['techno']);
    $this->comment         = ($_POST['comment']);
    $this->liens           = ($_POST['liens']);
    $this->image           = ($_FILES['image']['name']);
    $this->imagePath       = '../cv/public/images/' . basename($this->image);
    $this->imageExtension  = pathinfo($this->imagePath, PATHINFO_EXTENSION);
    $this->isSuccess       = true;
    $this->isUploadSuccess = true;


if(empty($this->titre)){
        $this->titreError = 'Ce champ ne peut pas etre vide';
        $this->isSuccess     = false;
        
      }

 if(empty($this->description)){
        $this->descriptionError = 'Ce champ ne peut pas etre vide';
        $this->isSuccess     = false;
         
      }
  if(empty($this->techno)){
        $this->technoError = 'Ce champ ne peut pas etre vide';
       $this->isSuccess    = false;
       
      }
   if(empty($this->comment)){
        $this->commentError = 'Ce champ ne peut pas etre vide';
       $this->isSuccess    = false;
       
      }    
      if(empty($this->liens)){
        $this->liensError = 'Ce champ ne peut pas etre vide';
        $this->isSuccess     = false;
       
      }   
      if(empty($this->image)){
        $this->imageError = 'Ce champ ne peut pas etre vide';
       $this->isSuccess     = false;
    
      }
      else
    {
        $this->isUploadSucces = true;

        if($this->imageExtension != "jpg" && $this->imageExtension != "png" && $this->imageExtension != "jpeg" && $this->imageExtension != "gif")
        {
            $this->imageError = "Les fichiers autorisés sont: .jpg, .jpeg, .png, .gif";
            $this->isUploadSuccess = false;
        }
        if(file_exists($this->imagePath))
        {
            $this->imageError = "Le fichier existe déja";
            $this->isUploadSuccess = false; 
        }
        if($_FILES["image"]["size"] > 500000)
        {
            $this->imageError = "Le fichier ne doit pas dépasser les 500KB";
            $this->isUploadSuccess = false;
        }
        if($this->isUploadSuccess)
        {
            if(!move_uploaded_file($_FILES["image"]["tmp_name"], $this->imagePath))
            {
            $this->imageError = "Il y a eu une erreur lors de l'upload";
            $this->isUploadSuccess = false;
            }

      }  
    }    
       if($this->isSuccess && $this->isUploadSuccess) {
    $folioManager = new Serri\Cv\FolioManager();
    $portfolio = $folioManager->insertfolio($image, $description, $techno, $comment, $titre, $liens);
    header('location:index.php?action=portfolioInsert');
    exit();
} else {
    $view = new View('portfolioInsert');
    $view->generer(
        [
            'titreError'=>$this->titreError,
            'descriptionError'=>$this->descriptionError,
            'technoError'=>$this->technoError,
            'commentError'=>$this->commentError,
            'imageError'=>$this->imageError,
            'liensError'=>$this->liensError,
            'titre'=>$this->titre,
            'description'=>$this->description,
            'techno'=>$this->techno,
            'comment'=>$this->comment,
            'image'=>$this->image,
            'liens'=>$this->liens,
            'isSuccess'=>$this->isSuccess
        ]
    );
}
    
 }  


}

public function boardFolio()
{
    $folioManager = new \Serri\Cv\FolioManager();
    $portfolio = $folioManager->getFolio2(); 
    $view = new View('boardFolio');
    $view->generer(['portfolio' => $portfolio]);
}


public function projectView()
  {
    $folioManager = new \Serri\Cv\FolioManager();
    $portfolio = $folioManager->getFolio($_GET['id']); 
 
  
    $view = new View('projectView');
    $view->generer(['portfolio'=>$portfolio]);
    
}

public function cleanProject($folioId){
       $folioManager = new \Serri\Cv\FolioManager();
    $portfolio = $folioManager->getFolio($_GET['id']); 
       $view = new View('deleteProjectView'); 
       $view->generer(['portfolio'=>$portfolio]);
   }


 public function eraseProject($folioId){
       $folioManager = new \Serri\Cv\FolioManager();
       $deleteLines = $folioManager ->deleteProject($_GET['id']);
       header('Location: index.php?action=boardFolio');
       exit;
   }

public function portfolioModif($folioId)
{
    $folioManager = new \Serri\Cv\FolioManager();
    $portfolio = $folioManager->getFolio($_GET['id']); 
    $view = new View('portfolioModif');
    $view->generer(['titreError'=>$this->titreError, 'descriptionError'=>$this->descriptionError, 'technoError'=>$this->technoError, 'commentError'=>$this->commentError,'imageError'=>$this->imageError,'liensError'=>$this->liensError,'titre'=>$this->titre,'description'=>$this->description,'techno'=>$this->techno,'comment'=>$this->comment,'image'=>$this->image,'liens'=>$this->liens,'isSuccess'=>$this->isSuccess,'portfolio'=>$portfolio]);
      var_dump($_GET['id'] );
  }

     public function portfolioModifAction($folioId, $image, $description, $techno, $comment, $titre,$liens)
    {

    
session_start();
  if(!empty($_POST))
{
    $this->titre           = ($_POST['titre']);
    $this->description     = ($_POST['description']);
    $this->techno          = ($_POST['techno']);
    $this->comment         = ($_POST['comment']);
    $this->liens           = ($_POST['liens']);
    $this->image           = ($_FILES['image']['name']);
    $this->imagePath       = '../cv/public/images/' . basename($this->image);
    $this->imageExtension  = pathinfo($this->imagePath, PATHINFO_EXTENSION);
    $this->isSuccess       = true;
    $this->isUploadSuccess = true;
    $this->isImageUpdated = true;


if(empty($this->titre)){
        $this->titreError = 'Ce champ ne peut pas etre vide';
        $this->isSuccess     = false;
        
      }

 if(empty($this->description)){
        $this->descriptionError = 'Ce champ ne peut pas etre vide';
        $this->isSuccess     = false;
         
      }
  if(empty($this->techno)){
        $this->technoError = 'Ce champ ne peut pas etre vide';
       $this->isSuccess    = false;
       
      }
     
      if(empty($this->liens)){
        $this->liensError = 'Ce champ ne peut pas etre vide';
        $this->isSuccess     = false;
       
      }   
      if(empty($this->image)){
        $this->isImageUpdated = false;
    
      }
      else
    {
       $this->isImageUpdated = true;
       $this->isUploadSucces = true;
        if($this->imageExtension != "jpg" && $this->imageExtension != "png" && $this->imageExtension != "jpeg" && $this->imageExtension != "gif")
        {
            $this->imageError = "Les fichiers autorisés sont: .jpg, .jpeg, .png, .gif";
            $this->isUploadSuccess = false;
        }
        if(file_exists($this->imagePath))
        {
            $this->imageError = "Le fichier existe déja";
            $this->isUploadSuccess = false; 
        }
        if($_FILES["image"]["size"] > 500000)
        {
            $this->imageError = "Le fichier ne doit pas dépasser les 500KB";
            $this->isUploadSuccess = false;
        }
        if($this->isUploadSuccess)
        {
            if(!move_uploaded_file($_FILES["image"]["tmp_name"], $this->imagePath))
            {
            $this->imageError = "Il y a eu une erreur lors de l'upload";
            $this->isUploadSuccess = false;
            }

      }  
    }    
       if(($this->isSuccess && $this->isImageUpdated && $this->isUploadSuccess)||($this->isSuccess && !$this->isImageUpdated)) {
       
    $folioManager = new \Serri\Cv\FolioManager();
      $portfolio = $folioManager->getFolio($_GET['id']); 
    $reaffected = $folioManager->updateProject($folioId, $image, $description, $techno, $comment, $titre, $liens);
    $view = new View('portfolioModif');
        $view->generer(
        [
            'titreError'=>$this->titreError,
            'descriptionError'=>$this->descriptionError,
            'technoError'=>$this->technoError,
            'commentError'=>$this->commentError,
            'imageError'=>$this->imageError,
            'liensError'=>$this->liensError,
            'titre'=>$this->titre,
            'description'=>$this->description,
            'techno'=>$this->techno,
            'comment'=>$this->comment,
            'image'=>$this->image,
            'liens'=>$this->liens,
            'isSuccess'=>$this->isSuccess,
            'portfolio'=>$portfolio
        ]
    );  
header('location:index.php?action=boardPrincipal');
}else{
  $folioManager = new \Serri\Cv\FolioManager(); 
$portfolio = $folioManager->getFolio($_GET['id']); 
    $reaffectedIm = $folioManager->updateProjectNoImage($folioId,$description, $techno, $comment, $titre, $liens);
      $view = new View('portfolioModif');
        $view->generer(
        [
            'titreError'=>$this->titreError,
            'descriptionError'=>$this->descriptionError,
            'technoError'=>$this->technoError,
            'commentError'=>$this->commentError,
            'imageError'=>$this->imageError,
            'liensError'=>$this->liensError,
            'titre'=>$this->titre,
            'description'=>$this->description,
            'techno'=>$this->techno,
            'comment'=>$this->comment,
            'image'=>$this->image,
            'liens'=>$this->liens,
            'isSuccess'=>$this->isSuccess,
            'portfolio'=>$portfolio

        ]
    );
} 
   
 }  

}

public function profilPersonnel()
  {
    $adminManager = new \Serri\Cv\AdminManager();
   $cvManager = new \Serri\Cv\CvManager();
$session = new \Serri\Cv\MessageFlash();
 $result = $adminManager->identity();

   $proCv = $cvManager->getProCv();
   
   $view = new View('profilPersonnel');
   $view->generer(['proCv' => $proCv,'result' => $result,'session' => $session]);
    
}
public function updateProfilPersonnel($profil)
  {
    if (!empty($_POST['profil'])) {
   $cvManager = new \Serri\Cv\CvManager();
   $affected = $cvManager->updateProCv($profil);
      $session = new \Serri\Cv\MessageFlash();
        $session->setFlash('Le profil Personnel à été modifié','');
        header('location:index.php?action=profilPersonnel');
        exit;
    }else{
        $session = new \Serri\Cv\MessageFlash();
        $session->setFlash('Tous les champs ne sont pas remplis','');
        header('location:index.php?action=profilPersonnel');
        exit;
    }

    
}
public function experienceProfessionnel()
  {
    $adminManager = new \Serri\Cv\AdminManager();
   $cvManager = new \Serri\Cv\Model\CvManager();
   $expCv = $cvManager->getExpCv();
 $result = $adminManager->identity();
 $session = new \Serri\Cv\MessageFlash();
   $view = new View('experienceProfessionnel');
   $view->generer(['expCv' => $expCv,'result' => $result,'session' => $session]);
    
}
public function ajoutExPro()
  {
   $adminManager = new \Serri\Cv\AdminManager();
   $result = $adminManager->identity();
   $session = new \Serri\Cv\MessageFlash();
   $view = new View('ajoutExProView');
   $view->generer(['result' => $result,'session' => $session]);
    
}
public function updateExperienceProfessionnel($expId,$title,$period,$description)
  {
    if (!empty($_POST['title'] && !empty($_POST['period'])&& !empty($_POST['description']))) {
    $adminManager = new \Serri\Cv\AdminManager();
   $cvManager = new \Serri\Cv\CvManager();
   $req = $cvManager->updateExpCv($expId,$title,$period,$description);
   $session = new \Serri\Cv\MessageFlash();
        $session->setFlash('Votre expérience professionnelle à été modifiée','');
       header('location:index.php?action=experienceProfessionnel');
        exit;
    }else{
      $session = new \Serri\Cv\MessageFlash();
        $session->setFlash('Tous les champs ne sont pas remplis','');
        header('location:index.php?action=experienceProfessionnel');
        exit;
    }
    
}
public function insertExPro($title,$period,$description)
  {
     if (!empty(htmlspecialchars(ltrim($_POST['title']))) && !empty(htmlspecialchars(ltrim($_POST['period']))) && !empty(htmlspecialchars(ltrim($_POST['description'])))){
   $cvManager = new \Serri\Cv\CvManager();
   $affected = $cvManager->insertExpCv($title,$period,$description);
   $session = new \Serri\Cv\MessageFlash();
   $session->setFlash('Votre commentaire a bien été ajouté','');
   header('location:index.php?action=experienceProfessionnel');}else{
          $Session = new \Serri\Cv\MessageFlash();
          $Session->setFlash('Vous n\'avez pas rempli tous les champs',''); 
          header('location:index.php?action=experienceProfessionnel');
          exit;
      }
    
}
public function deleteExp()
  {
    $adminManager = new \Serri\Cv\AdminManager();
  $cvManager = new \Serri\Cv\CvManager();
   $expCv = $cvManager->getExpCv();
   $result = $adminManager->identity();
   $view = new View('deleteExpView');
   $view->generer(['expCv' => $expCv,'result' => $result]);
    
}
public function deleteExPro($id)
  {
   $cvManager = new \Serri\Cv\CvManager();
   $affected = $cvManager->deleteExpCv($_GET['id']);
 
   header('location:index.php?action=experienceProfessionnel');
    
}

public function competences()
  {
    $adminManager = new \Serri\Cv\AdminManager();
   $cvManager = new \Serri\Cv\CvManager();
   $avCv = $cvManager->getAvCv();
   $view = new View('competences');
   $result = $adminManager->identity();
   $session = new \Serri\Cv\MessageFlash();
   $view->generer(['avCv' => $avCv,'result' => $result, 'session' => $session]);
   
}
public function ajoutComp()
  {

  $adminManager = new \Serri\Cv\AdminManager();
 $result = $adminManager->identity();
   $view = new View('ajoutCompView');
    $session = new \Serri\Cv\MessageFlash();
   $view->generer(['result' => $result,'session' => $session]);
    
}
public function updateCompetence($avId,$avantage)
  {
    if (!empty($_POST['avantage'])) {
   $cvManager = new \Serri\Cv\CvManager();
   $affected = $cvManager->updateAvCv($avId,$avantage);
   
$session = new \Serri\Cv\MessageFlash();
        $session->setFlash('Vos compétences ont été modifiées','');
      header('location:index.php?action=competences');
        exit;
    }else{
      $session = new \Serri\Cv\MessageFlash();
        $session->setFlash('Tous les champs ne sont pas remplis','');
        header('location:index.php?action=competences');
        exit;
    }
}
public function insertCompetence($avantage)
  {
     if (!empty(htmlspecialchars(ltrim($_POST['avantage'])))){
   $cvManager = new \Serri\Cv\CvManager();
   $affected = $cvManager->insertAvCv($avantage);
   $session = new \Serri\Cv\MessageFlash();
   $session->setFlash('Votre competence a bien été ajouté','');
   header('location:index.php?action=competences');}else{
          $Session = new \Serri\Cv\MessageFlash();
          $Session->setFlash('Vous n\'avez pas rempli tous les champs',''); 
          header('location:index.php?action=ajoutComp');
          exit;
      }

}
public function deleteCompetences()
  {
    $adminManager = new \Serri\Cv\AdminManager();
   $cvManager = new \Serri\Cv\Model\CvManager();
   $avCv = $cvManager->getAvCv();
   $result = $adminManager->identity();
   $view = new View('deleteCompView');
   $view->generer(['avCv' => $avCv,'result'=> $result]);
   
}
public function deleteCompet($id)
  {
   $cvManager = new \Serri\Cv\CvManager();
   $affected = $cvManager->deleteAvCv($_GET['id']);
 
   header('location:index.php?action=competences');
    
}

public function education()
  {
   $adminManager = new \Serri\Cv\AdminManager();
   $cvManager = new \Serri\Cv\CvManager();
   $edCv = $cvManager->getEdCv();
   $result = $adminManager->identity();
   $view = new View('education');
   $session = new \Serri\Cv\MessageFlash();
   $view->generer(['edCv' => $edCv,'result' => $result,'session' => $session]);
    
}
public function ajoutEduc()
  {
  $adminManager = new \Serri\Cv\AdminManager();
 $result = $adminManager->identity();
   $view = new View('ajoutEducView');
   $session = new \Serri\Cv\MessageFlash();
   $view->generer(['result' => $result,'session' =>$session]);
    
}
public function updateEducation($edId,$title_education,$title_secondary,$description_education)
  {
    if (!empty($_POST['title_education'] && !empty($_POST['title_secondary'])&& !empty($_POST['description_education']))) {
   $cvManager = new \Serri\Cv\CvManager();
   $update = $cvManager->updateEdCv($edId,$title_education,$title_secondary,$description_education);
  
  $session = new \Serri\Cv\MessageFlash();
        $session->setFlash('Votre parcours scolaire à été modifiée','');
        header('location:index.php?action=education');
        exit;
    }else{
      $session = new \Serri\Cv\MessageFlash();
        $session->setFlash('Tous les champs ne sont pas remplis','');
         header('location:index.php?action=education');
        exit;
    }  
}
public function insertEducation($title_education,$title_secondary,$description_education)
  {
    if (!empty(htmlspecialchars(ltrim($_POST['title_education']))) && !empty(htmlspecialchars(ltrim($_POST['title_secondary']))) && !empty(htmlspecialchars(ltrim($_POST['description_education'])))){
   $cvManager = new \Serri\Cv\CvManager();
   $affected = $cvManager->insertEdCv($title_education,$title_secondary,$description_education);
   $session = new \Serri\Cv\MessageFlash();
   $session->setFlash('Votre parcours scolaire a bien été ajouté','');
   header('location:index.php?action=education');}else{
          $Session = new \Serri\Cv\MessageFlash();
          $Session->setFlash('Vous n\'avez pas rempli tous les champs',''); 
          header('location:index.php?action=ajoutEduc');
          exit;
      }

}
public function deleteEducation()
  {
    $adminManager = new \Serri\Cv\AdminManager();
   $cvManager = new \Serri\Cv\CvManager();
   $edCv = $cvManager->getEdCv();
   $view = new View('deleteEducView');
   $result = $adminManager->identity();
 $view->generer(['edCv' => $edCv,'result' => $result]);
    
}

public function deleteEduca($id)
  {
   $cvManager = new \Serri\Cv\CvManager();
   $affected = $cvManager->deleteEdCv($_GET['id']);
 
   header('location:index.php?action=education');
    
}


public function boardCv()
  {
 $view = new View('boardCv');
 $view->generer([]);    
}

public function boardPrincipal()
  {
    $session = new \Serri\Cv\MessageFlash();
 $view = new View('interface');
 $view->generer(['session' => $session]);    
}


public function connect(){ 
 $session = new \Serri\Cv\MessageFlash();
 $view = new View('connectView'); 
 $view->generer(['session' => $session]);
}

}
<?php
namespace Forteroche\Blog;
    // Chargement des classes
require_once('model/PostManager.php');
require_once('model/FolioManager.php');
require_once('view/frontend/view.php');
require_once('app/MessageFlash.php');

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
    $folioManager = new \Forteroche\Blog\Model\FolioManager();
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
    $folioManager = new \Forteroche\Blog\Model\FolioManager();
    $portfolio = $folioManager->getFolio2(); 
    $view = new View('boardFolio');
    $view->generer(['portfolio' => $portfolio]);
}


public function projectView()
  {
    $folioManager = new \Forteroche\Blog\Model\FolioManager();
    $portfolio = $folioManager->getFolio($_GET['id']); 
 
  
    $view = new View('projectView');
    $view->generer(['portfolio'=>$portfolio]);
    
}

public function cleanProject($folioId){
       $folioManager = new \Forteroche\Blog\Model\FolioManager();
    $portfolio = $folioManager->getFolio($_GET['id']); 
       $view = new View('deleteProjectView'); 
       $view->generer(['portfolio'=>$portfolio]);
   }


 public function eraseProject($folioId){
       $folioManager = new \Forteroche\Blog\Model\FolioManager();
       $deleteLines = $folioManager ->deleteProject($_GET['id']);
       header('Location: index.php?action=boardFolio');
       exit;
   }

public function portfolioModif()
{

    $view = new View('portfolioModif');
    $view->generer(['titreError'=>$this->titreError, 'descriptionError'=>$this->descriptionError, 'technoError'=>$this->technoError, 'commentError'=>$this->commentError,'imageError'=>$this->imageError,'liensError'=>$this->liensError,'titre'=>$this->titre,'description'=>$this->description,'techno'=>$this->techno,'comment'=>$this->comment,'image'=>$this->image,'liens'=>$this->liens,'isSuccess'=>$this->isSuccess]);
  }

     public function portfolioModifAction($image, $description, $techno, $comment, $titre,$liens)
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
    $folioManager = new \Forteroche\Blog\Model\FolioManager();
    $portfolio = $folioManager->updateProject($image, $description, $techno, $comment, $titre, $liens);
    header('location:index.php?action=portfolioModif');
    exit();
} else {
    $view = new View('modifProject');
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















    public function changeComment($commentId) 
    { 
        $folioManager = new \Forteroche\Blog\Model\FolioManager();
        $comment = $commentManager->getComment($_GET['id']);
        $view = new View('changePostView'); 
        $view->generer(array('comment' => $comment));
        header('Location: index.php?action=commentsView&id='.$commentId);
        exit;
    }
    
    public function newComment($commentId,$comment)
    {
        $commentManager = new \Forteroche\Blog\Model\CommentManager();
        $reaffectedLines = $commentManager->updateComment($commentId,$comment);
        $comment = $commentManager->getComment($_GET['id']);
        $postId = $comment['post_id'];

        header('Location: index.php?action=commentsView&id='. $postId);
        exit;    
    }

     public function modifPost($postId,$content,$title,$chapter)
    {
       if (!empty($_POST['content']) && !empty($_POST['title']) && !empty($_POST['chapter'])) {
        $postManager = new \Forteroche\Blog\Model\PostManager();
        $reaffected = $postManager->updatePost($postId,$content,$title,$chapter);
        $Session = new \Forteroche\Blog\MessageFlash();
        $Session->setFlash('Le chapitre a été modifié','');
        
        header('Location: index.php?action=editPost&id='. $postId);
        exit;
        }else{
        $Session = new \Forteroche\Blog\MessageFlash();
        $Session->setFlash('Tous les champs ne sont pas remplis','');
        header('Location: index.php?action=editPost&id='. $postId);
        exit;
    }

  }
    public function eraseComment($commentId)
    {
        $commentManager = new \Forteroche\Blog\Model\CommentManager();
        $comment = $commentManager->getComment($_GET['id']);
        $postId = $comment['post_id'];
        $deleteComment = $commentManager->deleteComment($commentId);
        
        $postId = $comment['post_id'];
        
        header('Location: index.php?action=commentsView&id='. $postId);
        exit;
    }
    public function changePost($postId) 
    { 
        $postManager = new \Forteroche\Blog\Model\PostManager();
        $post = $postManager->getPost($_GET['id']);
        $session = new \Forteroche\Blog\MessageFlash();
        $view = new View('updatePostView'); 
        $view->generer(array('post' => $post,'session' => $session));

    }
    
   
    
   
   public function reability($commentId)
   {
    $commentManager = new \Forteroche\Blog\Model\CommentManager();
    $comment = $commentManager->demoderate($_GET['id']);
    header('Location: index.php?action=commentAction'); 
    exit;
}


public function connect(){
 $postManager = new \Forteroche\Blog\Model\PostManager();
 $post = $postManager;
 $chapters = $postManager->getPosts();  
 $session = new \Forteroche\Blog\MessageFlash();
 $view = new View('connectView'); 
 $view->generer(['post' => $post,'chapters'=>$chapters,'session' => $session]);
 
}
public function commentsView()
{
    $postManager = new \Forteroche\Blog\Model\PostManager();
    $commentManager = new \Forteroche\Blog\Model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    $view = new View('commentsView');
    $session = new \Forteroche\Blog\MessageFlash();
    $view->generer(array('post' => $post,'comments' => $comments, 'session' => $session));
    
}



public function commentAction()
{
    $commentManager = new \Forteroche\Blog\Model\CommentManager();
    $comments = $commentManager->commentModerate();
    $view = new View('commentModerateView');
    $view->generer(array('comments' => $comments));
    
}

public function addPost(){
  
    $postManager = new \Forteroche\Blog\Model\PostManager();
    $post = $postManager;
    $view = new View('addPostView'); 
    $session = new \Forteroche\Blog\MessageFlash();
    $view->generer(array('post' => $post,'session' =>$session));


}   

public function otherPost($chapter,$title,$content){
  if (!empty($_POST['chapter']) && !empty($_POST['title']) && !empty($_POST['content']) ){
   $postManager = new \Forteroche\Blog\Model\PostManager();
   $newLines = $postManager->newPost($chapter,$title,$content);

   $Session = new \Forteroche\Blog\MessageFlash();     
     $Session->setFlash('Le chapitre a bien été ajouté','');
        header('Location: index.php?action=board');
        exit;
      }
        else{
          $Session = new \Forteroche\Blog\MessageFlash();
          $Session->setFlash("Tous les champs n'ont pas été remplis",''); 
          header('Location: index.php?action=addPost');
          exit;
        }
      
  
}


}
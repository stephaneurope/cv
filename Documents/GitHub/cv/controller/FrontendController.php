<?php
namespace Forteroche\Blog;
    // Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('view/frontend/view.php');
require_once('app/MessageFlash.php');
require_once('app/Text_cut.php');


class FrontendController{

  
  public function accueil()
  {
     $commentManager = new \Forteroche\Blog\Model\CommentManager();
    $portfolio = $commentManager->getFolio2(); 
    $view = new View('accueilView');
    $view->generer(['portfolio' => $portfolio]);
    
}
public function portfolio()
  {
    $commentManager = new \Forteroche\Blog\Model\CommentManager();
    $portfolio = $commentManager->getFolio($_GET['id']); 
    $portfol = $commentManager->getFolio2(); 
  
    $view = new View('portfolioView');
    $view->generer(['portfolio'=>$portfolio,'portfol'=>$portfol]);
    
}
public function contact()
  {
 $session1 = new \Forteroche\Blog\MessageFlash();
 $session2 = new \Forteroche\Blog\MessageFlash();
 $session3 = new \Forteroche\Blog\MessageFlash();
 $session4 = new \Forteroche\Blog\MessageFlash();
 $session5 = new \Forteroche\Blog\MessageFlash();
    $view = new View('contactView');
    $view->generer(['session1' => $session1,'session2' => $session2,'session3' => $session3,'session4' => $session4,'session5' => $session5]);
    
}

  

public function cv()
  {
   
    $view = new View('cvView');
    $view->generer([]);
    
}


public function post()
{
    $postManager = new \Forteroche\Blog\Model\PostManager();
    $commentManager = new \Forteroche\Blog\Model\CommentManager();
    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    $chapters = $postManager->getPosts(); 
    $session = new \Forteroche\Blog\MessageFlash();
    $view = new View('postView');
    $view->generer(['post' => $post,'comments' => $comments,'chapters'=>$chapters,'session'=>$session]);
    
}


public function board()
{
    $postManager = new \Forteroche\Blog\Model\PostManager();
    
    $posts = $postManager->getPosts();
    $session = new \Forteroche\Blog\MessageFlash();
    $view = new View('interface');
    $view->generer(['posts' => $posts,'session' => $session]);
    
}

public function error()
{
    $postManager = new \Forteroche\Blog\Model\PostManager();
    $commentManager = new \Forteroche\Blog\Model\CommentManager();
    $post = $postManager;
    $comments = $commentManager;
    $chapters = $postManager->getPosts(); 
    $view = new View('errorView');
    $view->generer(['post' => $post,'comments' => $comments,'chapters'=>$chapters]);
    
}
   public function moderate($commentId)
   {
    if (isset($_GET['id']) && $_GET['id'] > 0) {
        $commentManager = new \Forteroche\Blog\Model\CommentManager();
        $commentManager->boolean($_GET['id']);
        $comment = $commentManager->getComment($_GET['id']);
        $postId = $comment['post_id'];
        header('Location: index.php?action=post&id='. $postId);
        exit;
    }

} 


public function addComment($postId, $author,$comment)
{
    if (!empty(htmlspecialchars(ltrim($_POST['author']))) && !empty(htmlspecialchars(ltrim($_POST['comment'])))){
        $commentManager = new \Forteroche\Blog\Model\CommentManager();
        $affectedLines = $commentManager->postComment($postId,$author,$comment);
        $Session = new \Forteroche\Blog\MessageFlash();
        
        $Session->setFlash('Votre commentaire a bien été ajouté','');
        header('Location: index.php?action=post&id=' . $postId);}else{
          $Session = new \Forteroche\Blog\MessageFlash();
          $Session->setFlash('Vous n\'avez pas rempli tous les champs',''); 
          header('Location: index.php?action=post&id='. $postId);
          exit;
      }
      
      
      
  }




}
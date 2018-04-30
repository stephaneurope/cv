<?php
namespace Model;

require "vendor/autoload.php";

class AdminManager extends Manager
{

  public function identity()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, pseudo, nom, prenom, pass, mail, web, mobile, works, profil_img FROM users'); 
   $req->execute(array());

        return $req;
    }
     public function updateIdentity($pseudo, $nom, $prenom, $mail, $web, $mobile)
    {
        $db = $this->dbConnect();
        $req = $db->prepare ('UPDATE users SET pseudo = ?, nom = ?, prenom = ?, mail  = ?, web = ?, mobile = ?');

    $reaffected = $req->execute(array($pseudo, $nom, $prenom, $mail, $web, $mobile));

        return  $reaffected;
    }
     public function updateProfilImg($profil_img)
    {
        $db = $this->dbConnect();
        $req = $db->prepare ('UPDATE users SET profil_img = ?');

    $reaffected = $req->execute(array($profil_img));

        return  $reaffected;
    }
    public function connected($pseudo,$pass_hache)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, pass FROM users WHERE pseudo = :pseudo'); 
        $req->execute(array('pseudo' => $pseudo));
        $resultat = $req->fetch();
         return $resultat;
    }
    
}
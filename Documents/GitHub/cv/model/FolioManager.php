<?php
namespace Model;

require "vendor/autoload.php";

class FolioManager extends Manager
{

public function getFolio($folioId){
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT id, image, description,techno,comment, titre, liens  FROM  portfolio WHERE id = ?');
   $portfolio=$req->execute(array($folioId));
   $portfolio = $req->fetch();
    return $portfolio;
} 
public function getFolio2(){
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT id, image, description,techno,comment, titre, liens  FROM  portfolio');
   $portfolio=$req->execute(array());
    return $req;
}
public function insertfolio($image, $description, $techno, $comment, $titre,$liens){
    $db = $this->dbConnect();
    $req = $db->prepare('INSERT INTO portfolio(image, description, techno, comment, titre,liens) VALUES(?, ?, ?, ?, ?,?)');
    $portfolio=$req->execute(array($image, $description, $techno, $comment, $titre, $liens));
    return $portfolio;
}

public function deleteProject($folioId){
  $db = $this->dbConnect();
  $req = $db->prepare('DELETE FROM portfolio  WHERE id = ?'); 
  $deleteLines= $req->execute(array($folioId));
  return $deleteLines;
}

public function updateProject($folioId, $image, $description, $techno, $comment, $titre, $liens)
{
    $db = $this->dbConnect();
    $req = $db->prepare('UPDATE portfolio SET image = ?, description = ?, techno = ?, comment = ?,titre  = ?,liens  = ? WHERE id = ? ');
    $reaffected =$req->execute(array($image, $description, $techno, $comment, $titre, $liens, $folioId));
    return $reaffected;

}
public function updateProjectNoImage($folioId,$description, $techno, $comment, $titre, $liens)
{
    $db = $this->dbConnect();
    $req = $db->prepare('UPDATE portfolio SET description = ?, techno = ?, comment = ?,titre  = ?,liens  = ? WHERE id = ? ');
    $reaffectedIm =$req->execute(array($description, $techno, $comment, $titre, $liens,$folioId));
    return $reaffectedIm;

}




}
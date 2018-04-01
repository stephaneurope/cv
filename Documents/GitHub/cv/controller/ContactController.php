<?php

namespace Forteroche\Blog;
require_once('app/MessageFlash.php');
class ContactController{


    public $email;
    public $phone;
    public $data;
     

public function contactForm() {

     $firstname = $name = $email = $phone = $message = "";
     $firstnameError = $nameError = $emailError = $phoneError = $messageError = "";
     $isSuccess = false;
     $emailTo = "serri.stephan@gmail.com";
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    { 
        $firstname = $this->test_input($_POST["firstname"]);
        $name = $this->test_input($_POST["name"]);
        $email = $this->test_input($_POST["email"]);
        $phone = $this->test_input($_POST["phone"]);
        $message = $this->test_input($_POST["message"]);
        $isSuccess = true; 
        $emailText = "";
        
        if (empty($firstname))
        {
       $session1 = new \Forteroche\Blog\MessageFlash();
        $session1->setFlash('Vous n\'avez pas renseigné votre nom','');


        $isSuccess = false; 
        } 
        else
        {
            $emailText .= "Firstname: $firstname\n";
        }

        if (empty($name))
        {
            $session2 = new \Forteroche\Blog\MessageFlash();
            $session2->setFlash("Et oui je veux tout savoir. Même ton nom !",'');
            $isSuccess = false; 
        } 
        else
        {
            $emailText .= "Name: $name\n";
        }

        if(!$this->isEmail($email)) 
        {
            $session3 = new \Forteroche\Blog\MessageFlash();
            $session3->setFlash("T'essaies de me rouler ? C'est pas un email ça  !",'');
            $isSuccess = false; 
        } 
        else
        {
            $emailText .= "Email: $email\n";
        }

        if (!$this->isPhone($phone))
        {
             $session4 = new \Forteroche\Blog\MessageFlash();
            $session4->setFlash("Que des chiffres et des espaces, stp...",'');
           $isSuccess = false; 
        }
        else
        {
            $emailText .= "Phone: $phone\n";
        }

        if (empty($message))
        {

             $session5 = new \Forteroche\Blog\MessageFlash();
            $session5->setFlash("Qu'est-ce que tu veux me dire ?",'');
            $isSuccess = false; 
        }
        else
        {
            $emailText .= "Message: $message\n";
        }
        
        if($isSuccess) 
        {
            $headers = "From: $firstname $name' <$email>\r\nReply-To: $email";
            mail($emailTo, "Un message de votre site", $emailText, $headers);
             $firstname = $name = $email = $phone = $message = "";
        }
        
        //echo json_encode($array);
        
   } 
}
    public function isEmail($email) 
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    public function isPhone($phone) 
    {
        return preg_match("/^[0-9 ]*$/",$phone);
    }
    public function test_input($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

}



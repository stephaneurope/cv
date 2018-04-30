<?php
namespace Controller;

require "vendor/autoload.php"; 
class ContactController{


    public $email;
    public $phone;
    public $data;
    public  $firstnameError = '';
    public $nameError =  '';
     public $phoneError =  '';
    public  $mailError =  '';
    public  $messageError = '' ;
    public $message1 = '';
     
public function contact()
  {

     
       $view = new \Cv\View('contactView');
       $view->generer(['firstnameError'=>$this->firstnameError, 'nameError'=>$this->nameError,'phoneError'=>$this->phoneError, 'mailError'=>$this->mailError,'messageError'=>$this->messageError, 'message1' =>$this->message1]);
    
}
public function contactForm() {

     $firstname = $name = $this->email = $this->phone = $message = "";
     $this->firstnameError = $this->nameError = $this->mailError = $this->phoneError = $this->messageError = "";
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

         $this->firstnameError ='Vous n\'avez pas renseigné votre prénom';
         $isSuccess = false;

        } 
        else
        {
            $emailText .= "Firstname: $firstname\n";
        }

        if (empty($name))
        {
      
        $this->nameError = "Et oui je veux tout savoir. Même ton nom !";
            $isSuccess = false; 
        } 
        else
        {
            $emailText .= "Name: $name\n";
        }

        if(!$this->isEmail($email)) 
        {
          
         $this->mailError ="T'essaies de me rouler ? C'est pas un email ça  !";
            $isSuccess = false; 
        } 
        else
        {
            $emailText .= "Email: $email\n";
        }

        if (!$this->isPhone($phone))
        {
          $this->phoneError = "Que des chiffres et des espaces, stp...";
           $isSuccess = false; 
        }
        else
        {
            $emailText .= "Phone: $phone\n";
        }

        if (empty($message))
        {

           $this->messageError ="Qu'est-ce que tu veux me dire ?";
            $isSuccess = false; 
        }
        else
        {
            $emailText .= "Message: $message\n";
        }
        
        if($isSuccess) 
        {
            
            $headers = "From: $firstname $name' <$email>\r\nReply-To: $email";
            mail($emailTo, "Un message de serri-stephan.com", $emailText, $headers);
             $firstname = $name = $email = $phone = $message = "";
             $this->message1 = 'Votre message a bien été envoyé!! Merci!';
        }
        
        //echo json_encode($array);
        
   } 

   $view = new \Cv\View('contactView');
       $view->generer(['firstnameError'=>$this->firstnameError, 'nameError'=>$this->nameError,'phoneError'=>$this->phoneError, 'mailError'=>$this->mailError,'messageError'=>$this->messageError,'message1' =>$this->message1]);

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



<?php
require('../model/database.php');
require('../model/userInfo_db.php');
require'../mailer/PHPMailer.php';
require'../mailer/SMTP.php';
require'../mailer/Exception.php';
  
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$userInfo = new userInfo_db();
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'showS';
    }
}  

switch($action)
{
    case 'showS':
        $user = $userInfo->getCurrent();
        $userId = $user['user_id'];
        include('../customer_support/contact.php');
        break;
        
    case 'send':
     $mess = filter_input(INPUT_POST, 'mess');
     $mess = nl2br($mess,false);
     $userId = filter_input(INPUT_POST, 'id');
     $emailTo = "budgetbuddy75@gmail.com";
     $mail = new PHPMailer();
  
     $mail->isSMTP();
     $mail->Host = "smtp.gmail.com";
     $mail->SMTPAuth = 'true';
     $mail->SMTPSecure = 'ssl';
     $mail->Port = "465";
     $mail->Username = "budgetbuddy75@gmail.com";
     $mail->Password = "llwsedtbgtmgbgiv";
     $mail->Subject = "Customer Support";
     $mail->setFrom("budgetbuddy75@gmail.com");
     $message = 
      "Dear Admin " . "<br>The user ". $userId. " current experience issue such as: <br>"
      .htmlspecialchars($mess). "<br>Please Review the situation as soon as possible <br>" .
    
      "Thank you and have a great day,\nThe BudgetBuddy team<br>".
      "BudgetBuddy";
     $mail->Body = $message;
     $mail->addAddress($emailTo);
     $mail->isHTML(true);
     if($mail->Send())
     {
       include("../customer_support/email-confirmation.php");
     }
 
     $mail->smtpClose();
     break;
}

 

  
 
  
 
 
         
  
  
 
 
 
  
      
        



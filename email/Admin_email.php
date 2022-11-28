<?php
require('../model/email.php');
require'../mailer/PHPMailer.php';
require'../mailer/SMTP.php';
require'../mailer/Exception.php';
$emailDB = new emailSend();

$infos = $emailDB->getInfo();

 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;

  
  
 if($mail->Send())
 {
     echo "Email Sent !";
 }
 
 $mail->smtpClose();
foreach ($infos as $info)
{
  if($info['editStatus'] == 0)
  {
    
    $emailTo = $info['email'];
 
    $subject = "";
  
    
    $mail = new PHPMailer();
  
  $mail->isSMTP();
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPAuth = 'true';
  $mail->SMTPSecure = 'ssl';
  $mail->Port = "465";
  $mail->Username = "budgetbuddy75@gmail.com";
  $mail->Password = "llwsedtbgtmgbgiv";
  $mail->Subject = "Please Start the Month" ;
  $mail->setFrom("budgetbuddy75@gmail.com");
  
  $message = "Dear ". $info['adminN']. ", <br>".
            "This is an automated notification to inform you that you have yet to start". $info['monthS']. ", ".$info['yearS']." ,for " .$info['user_id'].
            "<br>Please complete it as soon as possible<br>
                 Thank you and have a great day,<br>
                 The BudgetBuddy team"
    ;
    $mail->Body = $message;
    $mail->addAddress($emailTo);
    $mail->isHTML(true);
    if($mail->Send())
    {
     echo "Email Sent !";
    }
 
    $mail->smtpClose();
  }
}
 
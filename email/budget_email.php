<?php
  require'../mailer/PHPMailer.php';
  require'../mailer/SMTP.php';
  require'../mailer/Exception.php';
  

 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;

  
  $mail = new PHPMailer();
  
  $mail->isSMTP();
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPAuth = 'true';
  $mail->SMTPSecure = 'ssl';
  $mail->Port = "465";
  $mail->Username = "budgetbuddy75@gmail.com";
  $mail->Password = "llwsedtbgtmgbgiv";
  $mail->Subject = "Warning about your spending in " . $month;
  $mail->setFrom("budgetbuddy75@gmail.com");
  
 $message = 
    "Dear " . $userName . "<br>This is an automated notification to inform you that you have exceeded 80% of the total monthly budget of $"
     .$budget. "<br>Please Review your current Spend and Budget on our Webpage <br>" .
    
    "Thank you and have a great day,\nThe BudgetBuddy team<br>".
    "BudgetBuddy";
 
         
  
  
 
 
 $mail->Body = $message;
 $mail->addAddress($emailTo);
 $mail->isHTML(true);
 if($mail->Send())
 {
     echo "Email Sent !";
 }
 
 $mail->smtpClose();
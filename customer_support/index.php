<?php
require('../model/database.php');
require('../model/user.php');
require('../model/userInfo_db.php');

$userInfo = new userInfo_db();
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'showSpending';
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
     $template = './alert_template.php';

 
      $subject = "Customer Support";
  
       $swap_var = array(
       "{USER}"  => $userId,
       "{mess}" => htmlspecialchars($mess),
       
       );
       $header = "From BudgetBuddy <budgetbuddy@gmail.com";
       $header .= "MIME-Version: 1.0\r\n";
       $header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  
        if(file_exists($template))
       {
         $message = file_get_contents($template);
       }
       else 
       {
          die("Unable to locate template"); 
       }
 
       foreach(array_keys($swap_var) as $key)
       {
          if(strlen($key) > 2 && trim($key) != "")
          {
         $message = str_replace($key, $swap_var[$key], $smessage);
          }
        }
        if(mail($emailTo, $subject, $message, $header))
        {
            include("../customer_support/email-confirmation.php");
        }
        
}


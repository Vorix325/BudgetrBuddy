<?php
require('../model/email.php');
$emailDB = new emailSend();

$infos = $emailDB->getInfo();


foreach ($infos as $info)
{
  if($info['editStatus'] == 0)
  {
    $template = './admin_template.php';
    $emailTo = $info['email'];
 
    $subject = "Please Start the Month";
  
    $swap_var = array(
     "{USER}"  => $info['user_id'],
     "{ADMIN}" => $info['adminN'],
     "{MONTH}"=> $info['monthS'],
     "{YEAR}" => $info['yearS'],
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
    mail($emailTo, $subject, $message, $header);
  }
}
 
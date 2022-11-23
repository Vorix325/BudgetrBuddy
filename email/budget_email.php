<?php

  $template = './alert_template.php';

  $emailTo = filter_input(INPUT_POST, 'email');
  $username = filter_input(INPUT_POST, 'name');
  $budget = filter_input(INPUT_POST, 'budget');
  $month = filter_input(INPUT_POST, 'month');
  $subject = "Spending Warning";
  
  $swap_var = array(
    "{USER}"  => $username,
    "{BUDGET}" => $budget,
    "{MONTH}"   => $month,
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
 
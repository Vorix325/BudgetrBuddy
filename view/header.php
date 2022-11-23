<?php 
   $dsn = 'mysql:host=localhost;dbname=bbdatabase';
   $username = 'mgs_user';
   $password = 'pa55word';
   $options = array(PDO::ATTR_ERRMODE =>
   PDO::ERRMODE_EXCEPTION);
 try 
 {
   $db1 = new PDO($dsn, $username, $password, $options);
 } 
 catch (PDOException $e) 
 {
      exit;
 }
 
   global $db1;
    $sql = "SELECT typeof_user FROM currentq WHERE queue = 1;";  
    $statement = $db1->prepare($sql);
    $statement->execute();
    $types = $statement->fetch();
    $statement->closeCursor();
    $type = $types[0];
 ?>
<!DOCTYPE html>
<html>
<head>
   
     <link
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap"
            rel="stylesheet"
        />
        <!-- Stylesheet -->
        <link rel="stylesheet" href="../bp-stylesheet.css" />
</head>   
<body>
<header><h1>Budge Buddy</h1></header>

 <div class ="header">
            <div class="inner-header">
                <div class="logo-container">
                    <h1>Budget<span>Buddy</span></h1>
                </div>
                <ul class="navigation">
                    <a href='/ex_starts/BudgetBuddy/BudgetBuddy/index.php'><li>Home</li></a>
                    <a href= '/ex_starts/BudgetBuddy/BudgetBuddy/user_info/index.php?action=showLogin'><li>Login</li></a>
                    <?php 
                    if($type != null) : ?>
                      <a href='/ex_starts/BudgetBuddy/BudgetBuddy/user_info/index.php?action=show_profile'><li>Profile</li></a>
                      <a href='/ex_starts/BudgetBuddy/BudgetBuddy/budget_page/index.php'><li>Spending</li></a>
                      <a href='/ex_starts/BudgetBuddy/BudgetBuddy/budget_page/index.php?action=showBudget'><li>Budget</li></a>
                      <a href= '/ex_starts/BudgetBuddy/BudgetBuddy/user_info/index.php?action=logout'><li>Logout</li></a>
                    <?php endif; ?>
                </ul>
            </div>
</div>


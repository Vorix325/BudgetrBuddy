<!DOCTYPE html>   
<html>   
    <head>  
        <meta name="viewport" content="width=device-width, initial-scale=1"/>  
        <title> Home Page </title>  
    
        <!-- Google Font link -->
        <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap"
        rel="stylesheet" />

        <!-- Stylesheet -->
        <link rel="stylesheet" href="bp-stylesheet.css" />
    </head>    
    <body>
        

        <!-- Header -->
        <?php include 'view/header.php'; ?>

        <div class="wrapper">
            <div class="container">
                <!-- Welcome -->
                <div class="welcome">
                    <h3>Welcome to Budget Buddy! Let us help you get started on that budget</h3>
                </div>
            </div>
            <!-- About Us -->    
            <div class="about-container">
                <h3><b>About Us</b></h3>
                <h3>Budget Buddy is dedicated to help you manage your finances simply and effectively.
                    Our goal is to help give you a life that is cost-effective and free of financial stress.
                </h3>
            </div>
            <!-- Manage Profile -->
            <div class = "profile-container">
                <form action="./user_info/index.php" method='post'>
                    <?php if($type == null) : ?>
                    <input type='hidden' name='action' value='show_login'>
                    <?php else : ?>
                    <input type='hidden' name='action' value='show_profile'>
                    <?php endif; ?>
                    
                 <h3><b>Manage Profile</b></h3>
                 <h3>We're buddies aren't we? Check your profile and let's make sure to get the details right.</h3>
                 <button type='submit' class="submit">Profile</button>                      
                </form>
            </div>
            <!-- Start Budget -->
            <div class = "start-container">
                 <form action="<?php if($type == null)
                 {
                     echo "./user_info/index.php";
                 
                 }
                 else
                 {
                     echo "./budget_page/index.php";
                 } ?>" 
                 method='post'>
                    <?php if($type == null) : ?>
                    <input type='hidden' name='action' value='show_login'><!-- comment -->
                    <?php else : ?>
                    <input type='hidden' name='action' value='showBudget'><!-- comment -->
                    <?php endif; ?>
                 <h3><b>Manage Budget</b></h3>
                 <h3>Would you like to manage your budget now? Let's get to it!</h3>
                 <button type='submit' class="submit">Budget</button>
               </form>
            </div>
            <!-- Support -->
            <div class = "start-container">
                 <form action="<?php if($type == null)
                 {
                     echo "./user_info/index.php";
                 
                 }
                 else
                 {
                     echo "./customer_support/index.php";
                 } ?>" 
                 method='post'>
                    <?php if($type == null) : ?>
                    <input type='hidden' name='action' value='show_login'><!-- comment -->
                    <?php else : ?>
                    <input type='hidden' name='action' value='showS'><!-- comment -->
                    <?php endif; ?>
                <h3><b>Need Support?</b></h3>
                <h3>Experiencing technical difficulties or have any questions? Take to a support Buddy.</h3>
                <button type='submit' class="submit">Contact</button>
                 </form>
            </div>
        </div>   
        <!-- Footer -->
        <?php include 'view/footer.php'; ?>
   
<!DOCTYPE html>   
<html>   
    <head>  
        <meta name="viewport" content="width=device-width, initial-scale=1"/>  
        <title> Email Confirmation </title>  
    
        <!-- Google Font link -->
        <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap"
        rel="stylesheet" />

        <!-- Stylesheet -->
        <link rel="stylesheet" href="../bp-stylesheet.css" />
    </head>    
    <body>
        <form action="index.php" method='post'>

        <!-- Header -->
        <?php include '../view/header.php'; ?>

        <div class="wrapper">
            <div class="container">
                <!-- Welcome -->
                <div class="welcome">
                    <h3>Your email has been sent! Please allow 3-5 business days for our support team to respond.</h3><br>
                    <p>To go back to your budget click <a href="ex_starts/BudgetBuddy/BudgetBuddy/index.php">Budget</a></p>
                </div>
            </div>    
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br>
        <!-- Footer -->
        <?php include '../view/footer.php'; ?>

        </form>
    </body>

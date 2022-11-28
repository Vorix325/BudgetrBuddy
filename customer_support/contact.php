<!DOCTYPE html>   
<html>   
    <head>  
        <meta name="viewport" content="width=device-width, initial-scale=1"/>  
        <title> Contact Page </title>  
    
        <!-- Google Font link -->
        <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap"
        rel="stylesheet" />

        <!-- Stylesheet -->
        <link rel="stylesheet" href="BudgetrBuddy/bp-stylesheet.css" />
    </head>

    <body>
        

        <!-- Header -->
        <?php include '../view/header.php'; ?>

        <div class="wrapper">
            <div class="container">
                <!-- Welcome -->
                <div class="welcome">
                    <h3>Our Budget Buddy support team is just a call or an email away. Let us know how we can help!</h3>
                    <p><b>Contact Us:</b></p>
                    <p>Call us at <b>1-800-232-4567</b> to speak to a support buddy directly.</p>
                    <p>Email us at <b>buddysupport@budgetbuddy.ca</b> or fill in the form below to send us an email.<p>
                </div>

                <div class="contact-container">
                    <form action='./index.php' method="post" class="message">
                        <h3>What's up Buddy?</h3>
                        <input type='hidden' name='action' value='send'>
                        <input type='hidden' name='id' value='<?php echo $userId; ?>'>
                        <textarea id="message" placeholder="Message" name='mess' cols="100" rows="10"></textarea>
                        <button type="submit" class="submit" id="submit">Send</button>  

                    </form> 
                </div>
            </div>    
        </div>

        <!-- Footer -->
        <?php include '../view/footer.php'; ?>

       

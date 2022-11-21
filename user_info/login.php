<!DOCTYPE html>   
<html>   
    <head>  
        <meta name="viewport" content="width=device-width, initial-scale=1"/>  
        <title> Login Page </title>  
    
        <!-- Google Font link -->
        <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap"
        rel="stylesheet" />

        <!-- Stylesheet -->

        <link rel="stylesheet" href="../bp-stylesheet.css" />

       
    </head>    
  
    <body>
        

        <!-- Header -->
        <div class ="header">
            <div class="inner-header">
                <div class="logo-container">
                    <h1>Budget<span>Buddy</span></h1>
                </div>
            </div>
        </div>

        <div class="wrapper">
            <div class="container">
                <!-- Welcome -->
                <div class="welcome">
                    <h3>Welcome to Budget Buddy! Let's get started on that budget</h3>
                    <p><?php print_r($as); ?></P>
                   
                </div>
            </div>
             
            <!-- Login -->      
            <div class="login-container">
               <form action="index.php" method='post'>
                <input type="hidden" name='action' value='login'>
                <label>Username : </label>   
                <input type="text" placeholder="Enter Username" name="username" required/>  
                <label>Password : </label>   
                <input type="password" placeholder="Enter Password" name="password" required/>  
                <button class="submit">Login</button> 
               </form> 
                &nbsp;
                <Br><input type="checkbox" checked="checked" class="checkbox"> Remember me  
                &nbsp;
                 <br><a href="#"> Forgot password? </a> 
                &nbsp; <br> <br>
                <form action="index.php" method='post'>
                <input type="hidden" name='action' value='show_reg'>
                  <p>Are you a new Buddy?</p>
                  <button class="submit">Create New Account</button>  
                </form>
            </div>   
        </div>
        
        <!-- Footer -->
        <?php include '../view/footer.php'; ?>
          
            
    </body>     
</html>  

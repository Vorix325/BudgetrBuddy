<!DOCTYPE html>   
<html>   
    <head>  
        <meta name="viewport" content="width=device-width, initial-scale=1"/>  
        <title> Signup Page </title>  
    
        <!-- Google Font link -->
        <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap"
        rel="stylesheet" />

        <!-- Stylesheet -->
        <link rel="stylesheet" href="../bp-stylesheet.css" />
    </head>    
    <body>
        
            <div class="wrapper">
                <div class="signup-container">
                   <form action="index.php" method='post'>
                    <input type='hidden' name='action' value='register'>
                    <h1>Sign up</h1>
                    <h4>It's free and only takes a minute</h4>
                    <br>
                    <label>First Name</label>
                    <input type="text" placeholder="" id="firstname" name="fname" required>
                    <label>Last Name</label>
                    <input type="text" placeholder="" id="lastname" name="lname" required>
                    <label>Email</label><br>
                    <input type="email" placeholder="" id="email" name='email' required><br>
                    <label>Phone</label><br>
                    <input type="tel" placeholder="" id="phone" name='phone' required><br>
                     <label>Username</label>
                    <input type="text" placeholder="" id="username" name='username' required>
                    <label>Password</label>
                    <input type="password" placeholder="" id="password" name='password' required>
                    <label>Confirm Password</label>
                    <input type="password" placeholder="" id="confirm-password" name='confirm' required>
                    <br>
                    <button type="submit"class="submit" style="display: block; margin: 0 auto;"">Submit</button>
                    </form>
                    <p>By signing up, you agree to our <br>
                    <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></p>
                    <p>Already have an account? <a href="../user_info/login.php">Login</a></p>
                    
                </div>
            </div>
        
    </body>

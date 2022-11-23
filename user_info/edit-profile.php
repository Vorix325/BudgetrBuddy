<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Edit Profile</title>
        <!-- Google Font link -->
        <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap"
        rel="stylesheet" />
        <!-- Stylesheet -->
        <link rel="stylesheet" type="text/css" href="BudgetrBuddy/bp-stylesheet.css">
        <!-- Font Awesome link -->
        <link 
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <!-- Header -->
        <?php include '../view/header.php'; ?>
        
        <div class="wrapper">
            <div class="container">
                <!-- Welcome -->
                <div class="welcome">
                    <h3>Hey <?php echo $username;?>, edit your profile here.</h3>
                </div>
                <div class="info-container">
                    <h3>Profile</h3>
                    <form action='./index.php' method="post">
                      <input type='hidden' name='action'  value='editUser'>
                      <input type='hidden' name='userId'  value='<?php echo $userId; ?>'>
                     <label>User Name:</label>
                     <input type="text" name="username" value='<?php echo $username; ?>'/>
                     <br>
                     <label>Password:</label>
                     <input type="text" name="password" value='<?php echo $password; ?>'/>
                     <br> 
                     <label>First Name:</label>
                     <input type="text" name="fname" value='<?php echo $fname; ?>'/>
                     <br>
                     <label>Last Name:</label>
                     <input type="text" name="lname" value='<?php echo $lname; ?>'/>
                     <br>     
                     <label>Email:</label>
                     <input type="text" name="email" value='<?php echo $email; ?>'/>
                     <br> 
                     <label>Phone:</label>
                     <input type="text" name="phone" value='<?php echo $phone; ?>'/>
                     <br> 
                     <label>Nick Name:</label>
                     <input type="text" name="lname" value='<?php echo $nick; ?>'/>
                     <br> 
                    <button type='submit' class="profile-submit">Update</button> 
                    </form>
                </div>
            </div>
        </div>
        <br>

        <!-- Footer -->
        <?php include '../view/footer.php'; ?>

    </body>
</html>



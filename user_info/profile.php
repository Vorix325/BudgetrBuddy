<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>User Profile Page</title>
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
                    <h3>Welcome to your profile! Check to see if we got the details right.</h3>
                </div>
                <div class="info-container">
                    <h3>Your Profile</h3>
                    <table border="1" id="user-info" class="user-info" style="display: block; margin: 0 auto;">
                        <tr>
                            <th>UserName</th><!--  -->
                            <th>Password</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Nick Name</th>
                            <th>Modify</th>
                        </tr>
                        <tr>
                            <form action='./index.php' method='post'>
                             <input type ='hidden' name='action' value='showEdit'><!-- comment -->
                             <input type = 'hidden' name='userId' value='<?php echo $info->getID(); ?>'>
                            <td><input type='text' name='userName' value='<?php echo $info->getUser(); ?>' readonly></td>
                            <td><input type='text' name='pass' value='<?php echo $info->getPass(); ?>' readonly></td>
                            <td><input type='text' name='fname' value='<?php echo $info->getFname(); ?>' readonly></td>
                            <td><input type='text' name='lname' value='<?php echo $info->getLname(); ?>' readonly></td>
                            <td><input type='text' name='email' value='<?php echo $info->getEmail(); ?>' readonly></td>
                            <td><input type='text' name='phone' value='<?php echo $info->getPhone(); ?>' readonly></td>
                            <td><input type='text' name='nick' value='<?php echo $info->getNick(); ?>' readonly></td>
                            <td><button type = 'submit' class="user-edit"><i class="fas fa-user-edit" id="user-edit"></i></button></td>
                            </form>
                        </tr>
                    </table>
                    <br>
                    
                             
                    
                    
                </div>
            </div>
        </div>
        <br>

        <!-- Footer -->
        <?php include '../view/footer.php'; ?>

    </body>
</html>


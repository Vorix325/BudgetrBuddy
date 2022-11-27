<!DOCTYPE html>

<html lang="en">
    <head>
        <meta name="viewport"
        content="width=device-width, initial-scale=1.0" />
        <titleAdmin UserView</title>

        <!-- Google Font link -->
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap"
            rel="stylesheet"
        />
        <!-- Stylesheet -->
        <link rel="stylesheet" href="../bp-stylesheet.css" />
        <!-- Font Awesome link -->
		<link 
		rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>
        <!-- Header -->
        <?php include '../view/header.php'; ?>

        <div class="wrapper3">
            <div class="container">
                <!-- Welcome -->
                <div class="welcome" id="welcome">
                    <h3>Manage Regular User</h3>
                </div>    

               
            <!-- Budget Cateogory List -->
            <div class="list">
                <h3>User List:</h3>
                <div class="expense-list-container"
                     id="list">
                </div>
                <!-- Budget Category Table -->
						<table border="1" id="category-info" class="category-info" style="display: block; margin: 0 auto;">
							<tr>
								<th>User Id</th>
                                                                <th>User name</th>
								<th>First Name</th>
                                                                <th>Last Name</th>
                                                                <th>Email</th>
                                                                <th>Phone</th>
                                                                <th>Nick Name</th>
                                                                <th>Password</th>
                                                                <th>Type</th>
								<th>Modify</th>
								<th>Delete</th>
								
							</tr>
							
                                                            <?php foreach($datas as $d) : ?>
                                                              <tr>
								<td><?php echo $d->getID() ;?></td>
                                                                <td><?php echo $d ->getUser(); ?></td>   
                                                                <td><?php echo $d ->getFname(); ?></td><!-- < -->
                                                                <td><?php echo $d ->getLname(); ?></td>
                                                                <td><?php echo $d ->getEmail(); ?></td>
                                                                <td><?php echo $d ->getPhone(); ?></td>
                                                                <td><?php echo $d ->getNick(); ?></td>
                                                                <td><?php echo $d ->getPass(); ?></td>
                                                                <td><?php echo $d ->getType(); ?></td>
                                                                <td><form action="./index.php" method='post'>
                                                                    <input type='hidden' name='action' value='showEditUser'>
                                                                    <input type='hidden' name='userId' value='<?php echo $d->getID() ;?>'><!-- comment -->
                                                                    <input type='hidden' name='name' value='<?php echo $d ->getUser(); ?>'><!-- comment -->
                                                                    <input type='hidden' name='fname' value='<?php echo $d ->getFname(); ?>'><!-- comment -->
                                                                    <input type='hidden' name='lname' value='<?php echo $d ->getLname(); ?>'><!-- comment -->
                                                                    <input type='hidden' name='email' value='<?php echo $d ->getEmail(); ?>'><!-- comment -->
                                                                    <input type='hidden' name='phone' value='<?php echo $d ->getPhone(); ?>'><!-- comment -->
                                                                    <input type='hidden' name='nick' value='<?php echo $d ->getNick(); ?>'><!-- comment -->
                                                                    <input type='hidden' name='pass' value='<?php echo $d ->getPass(); ?>l'><!-- comment -->
                                                                    <input type='hidden' name='type' value='<?php echo $d ->getType(); ?>'><!-- comment -->
                                                                    <button class="user-edit"><i class="fas fa-user-edit" id="user-edit"></i></button>
                                                                 </form></td>
                                                                    <td><form action='./index.php' method='post'>
                                                                      <input type='hidden' name='action' value='deleteUser'>
                                                                      <input type='hidden' name='id' value='<?php echo $d->getID() ;?>'>
                                                                      <button class="user-edit"><i class="fas fa-user-times" id="user-edit"></i></button>
                                                                    </form></td>
                                                                    </tr>
						            <?php endforeach; ?>
							
              
						</table>
						<br>
						
        </div>
        <!-- Java Script -->
        <script src = "../budget_page/script.js"></script>
        <!-- Footer -->
        <?php include '../view/footer.php'; ?>
    </body>
</html>

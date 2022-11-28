<!DOCTYPE html>

<html lang="en">
    <head>
        <meta name="viewport"
        content="width=device-width, initial-scale=1.0" />
        <title>Admin All</title>

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

        <div class="wrapper2">
            <div class="container">
                <!-- Welcome -->
                <div class="welcome" id="welcome">
                    <h3>Let's start the month and work on that Budget!</h3>
                </div>    

               
            <!-- Budget Cateogory List -->
            <div class="list">
                <h3>Budget Category List:</h3>
                <div class="expense-list-container"
                     id="list">
                </div>
                <!-- Budget Category Table -->
						<table border="1" id="category-info" class="category-info" style="display: block; margin: 0 auto;">
							<tr>
								<th>&emsp;&emsp;&ensp;&ensp;User Id&emsp;&emsp;&ensp;&ensp;</th>
                                                                <th>&emsp;&emsp;&ensp;&ensp;User name&emsp;&emsp;&ensp;&ensp;</th>
								<th>&ensp;&emsp;&emsp;Budget&ensp;&emsp;&emsp;</th>
                                                                <th>&ensp;&emsp;&emsp;Month&ensp;&emsp;&emsp;</th>
                                                                <th>&ensp;&emsp;&emsp;Year&ensp;&emsp;&emsp;</th>
								<th>&emsp;Modify&emsp;</th>
								<th>&emsp;Delete&emsp;</th>
                                                                <th>&emsp;Report&emsp;</th>
								
							</tr>
							
                                                            <?php foreach($main as $d) : ?>
                                                        <tr>
								<td><?php echo $d['user_id'] ;?></td>
                                                                <td><?php 
                                                                      
                                                                       $userDB = new userInfo_db();
                                                                       $nameA = $userDB->getName($d['user_id']);
                                                                       echo $nameA[0];
                                                                    ?>
                                                                </td>   
                                                                <td><?php echo $d['amount']; ?></td><!-- < -->
                                                                <td><?php echo $d['SMonth']; ?></td>
                                                                <td><?php echo $d['SYear']; ?></td>
                                                                <td><form action="./index.php" method='post'>
                                                                        <input type='hidden' name='action' value='showEditBudget'>
                                                                        <input type ='hidden' name ='budget_id' value ='<?php echo $d['budget_id']; ?>'>
                                                                        <input type='hidden' name='month' value='<?php echo $d['user_id']; ?>'>
                                                                        <input type='hidden' name="name" value="<?php echo $nameA[0]; ?>"><!-- comment -->
                                                                        <input type='hidden' name='amount' value='<?php echo $d['amount']; ?>'>
                                                                        <input type='hidden' name='month' value='<?php echo $d['SMonth']; ?>'>
                                                                        <input type='hidden' name='year' value='<?php echo $d['SYear']; ?>'>
                                                                    <button class="user-edit"><i class="fas fa-user-edit" id="user-edit"></i></button>
                                                                    </form></td>
                                                                    <td><form action="./index.php" method ='post'>
                                                                         <input type='hidden' name='action' value='deleteBudget'>
                                                                         <input type ='hidden' name ='budget_id' value ='<?php echo $d['budget_id']; ?>'>
                                                                         <button class="user-edit"><i class="fas fa-user-times" id="user-edit"></i></button>
                                                                        </form></td>
                                                                                <td><form action='./index.php' method='post'>
                                                                                     <input type='hidden' name='action' value='report'>
                                                                                     <input type='hidden' name='id' value='<?php echo $d['user_id']; ?>'>
                                                                                     <input type='hidden' name='month' value='<?php echo $d['SMonth']; ?>'>
                                                                                     <input type='hidden' name='year' value='<?php echo $d['SYear']; ?>'>
                                                                                      <button class="user-edit"><i class="fas fa-user-edit" id="user-edit"></i></button>
                                                                                    </form></td>
                                                                                    </tr>
						             <?php endforeach; ?>
							
                                                        
						</table>
                                                <form action ="./index.php" method="post">
                                                    <input type='hidden' name='action' value='showAddBudget'><!-- comment -->
                                                    
                                                    <button class=submit type=submit value="Submit"ad>Start Month</button>
                                                </form>
                                        
						<br>
                                                
						            </div>
        </div>
        <!-- Java Script -->
        <script src = "../budget_page/script.js"></script>
        <!-- Footer -->
        <?php include '../view/footer.php'; ?>
    </body>
</html>

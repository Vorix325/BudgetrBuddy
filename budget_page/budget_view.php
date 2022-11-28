<!DOCTYPE html>

<html lang="en">
    <head>
        <meta name="viewport"
        content="width=device-width, initial-scale=1.0" />
        <title>Budget Page</title>

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

        <div class="wrapper">
            <div class="container">
                <!-- Welcome -->
                <div class="welcome" id="welcome">
                    <h3>Hey Buddy! Let's work on that Budget</h3>
                </div>    
                     
                </div>
                 <!-- Output -->
                 <div class="output-container flex-space">
                    <div>
                        <p>Total Budget</p>
                        
                        <span id="amount"><?php echo $budgets; ?></span>
                    </div>
                    <div>
                        <p>Total Expenses</p>
                        <span id="expense-value"><?php echo $total; ?></span>
                    </div>
                    <div>
                        <p>Balance</p>
                        <span id="balance-amount"><?php echo $balance; ?></span>
                    </div>
                 </div>
            </div>
            <!-- Budget Cateogory List -->
            <div class="list">
                <h3>Budget Category List:</h3>
                <div class="expense-list-container"
                     id="list">
                </div>
                <!-- Budget Category Table -->
       
						<table border="1" id="category-info" class="category-container" style="display: block; margin: 0 auto;">
							<tr>
								<th>&emsp;&nbsp;&nbsp;Category&emsp;&nbsp;&nbsp;</th>
								<th>&emsp;Limit&emsp;</th>
                                                                <th>&nbsp;Spending Cost&nbsp;</th>
								<th>&ensp;Modify&ensp;</th>
								<th>&ensp;Delete&ensp;</th>
								
							</tr>
                                                        <?php foreach($categories as $ca) :?>
							<tr>
                                                            <?php if($ca->getMonth() == $currentM && $ca->getYear() == $currentY) : ?>
                                                                <td><?php echo $ca->getCaName(); ?></td>
								<td><?php echo $ca->getLimit(); ?></td>
                                                                <td><?php echo $ca->getTotal(); ?></td>
                                             
                                                                <td><form action="./index.php" method="post">
                                                                    <input type ="hidden" name='action' value='showUpCategory'>
                                                                    <input type='hidden' name='userId' value='<?php echo $userId[0]; ?>'>
                                                                    <input type ='hidden' name='name' value= '<?php echo $ca->getCaName(); ?>' readonly >
                                                                    <input type = 'hidden' name = 'ca_id' value = <?php echo $ca->getCaID(); ?>>
                                                                    <input type ='hidden' name='Limit' value= '<?php echo $ca->getLimit(); ?>' readonly >
                                                                    <button class="user-edit"><i class="fas fa-user-times" id="user-edit"></i></button>
                                                                    
                                                                </form></td>
                                                                <td><form action="./index.php" method="post">
                                                                    <input type ="hidden" name='action' value='deleteCategory'>
                                                                    <input type = 'hidden' name ='ca_id' value = '<?php echo $ca->getCaID(); ?>'><!-- comment -->
                                                                    <button class="user-edit"><i class="fas fa-user-times" id="user-edit"></i></button>
                                                                </form></td>
							    <?php endif; ?>
							</tr>
                                                        <?php endforeach; ?>
						</table>
						<br>
                                                <form action="./index.php" method ="post">
                                                                    <input type ="hidden" name='action' value='showAddCategory'>
                                                                    <input type='hidden' name='userId' value='<?php echo $userId[0]; ?>'>
                                                                    <input type ='hidden' name='name' value= '<?php echo $ca->getCaName(); ?>' readonly >
                                                                    <input type = 'hidden' name = 'ca_id' value = <?php echo $ca->getCaID(); ?>>
                                                                    <input type ='hidden' name='Limit' value= '<?php echo $ca->getLimit(); ?>' readonly >
								    <button class=submit type=submit>Update</button>
          
                                                </form> 
                </form
            </div>
        </div>
	    <br><br><br><br><br><br><br><br><br><br><br><br><br>
        <!-- Java Script -->
        <script src = "script.js"></script>
        <!-- Footer -->
        <?php include '../view/footer.php'; ?>
    </body>
</html>

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

                <div class="budget-container">
                     <!-- Month Date -->
                     <div class="start-month-container">
                        <h3>Month Date</h3> 
                        <label for="month">Select Month & Date</label>
                        <p class= "hide error" id="month-error">Date is invalid</p>
                        <input type="date" class="month-date" id="month-date"/>
                        <button class = "submit" id="set-month-button">Set Date</button>
                     </div>
                        
                     <!-- Budget -->
                     <div class="budget-amount-container">
                        <h3>Budget</h3>
                        <label for="budget">Budget Total for the Month:</label>
                        <p class="hide error" id="budget-error">Value cannot be empty or negative</p>
                        <input type = "number" id="budget-amount" placeholder="Enter Your Budget"/>
                        <button class = "submit" id="budget-amount-button">Set Budget</button>    
                     </div>
                </div>
                 <!-- Output -->
                 <div class="output-container flex-space">
                    <div>
                        <p>Total Budget</p>
                        <span id="amount">0</span>
                    </div>
                    <div>
                        <p>Total Expenses</p>
                        <span id="expense-value">0</span>
                    </div>
                    <div>
                        <p>Balance</p>
                        <span id="balance-amount">0</span>
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
						<table border="1" id="category-info" class="category-info" style="display: block; margin: 0 auto;">
							<tr>
								<th>&emsp;&nbsp;&nbsp;Category&emsp;&nbsp;&nbsp;</th>
								<th>&emsp;Limit&emsp;</th>
                                                                <th>&nbsp;Spending Cost&nbsp;</th>
								<th>&ensp;Modify&ensp;</th>
								<th>&ensp;Delete&ensp;</th>
								
							</tr>
                                                        <?php foreach($categories as $ca) :?>
							<tr>
								<td><?php echo $ca->getName(); ?></td>
                                                                <td><?php echo $ca->getTotal(); ?></td>
                                                                <td></td>
								<td><button class="user-edit"><i class="fas fa-user-edit" id="user-edit"></i></button></td>
								<td><button class="user-edit"><i class="fas fa-user-times" id="user-edit"></i></button></td>
								
							</tr>
                                                        <?php endforeach; ?>
						</table>
						<br>
						<p>To save changes made to spending click <a href="#">Update</a></p>
						<button type=button class="submit">Update</button> 
            </div>
        </div>
        <!-- Java Script -->
        <script src = "script.js"></script>
        <!-- Footer -->
        <?php include '../view/footer.php'; ?>
    </body>
</html>

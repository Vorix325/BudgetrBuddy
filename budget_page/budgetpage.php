<!DOCTYPE html>

<html lang="en">
   
    <head>
        <meta name="viewport"
        content="width=device-width, initial-scale=1.0" />
        <title>Budget Page</title>

        <!-- Google Font link -->
       
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

                <!-- Select Month -->
                <div class="month-container">
                            <h3>Monthly Budget</h3> 
                            <label for="month">Select Month & Date</label>
                            <input type="date" class="month-date" id="month-date"/>
                            <input type='text'><?php echo $errorMessage; ?></input>
                            <button class = "submit" id="set-month-button">Set Month </button>
                </div>

                <div class="budget-container">
                     <!-- Budget -->
                     <div class="budget-amount-container">
                        <form action="." method="post">
                         <input type="hidden" name="action"  value="checkValue">
                         <h3>Budget</h3>
                         <label for="budget">Budget Total for the Month:</label>
                         <input type = "number" id="budget-amount" placeholder="Enter Your Budget"/>
                         <button class = "submit" id="budget-amount-button">Set Budget</button>   
                        </form>
                     </div>
                     <!-- Expenses -->
                     <div class="expense-amount-container">
                        <form action="." method="post">
                         <input type="hidden" name="action"  value="checkValue">
                         <h3>Budget Categories</h3>
                         <label for="bcategory">Enter Your Expenses:</label>
                         <input type="text" class="expense-title" id="expense-title" placeholder="Enter Title of Expense"/>
                         <input type="number" id="expense-amount" name='budget' placeholder="Enter Expense Cost"/>
                         <button class="submit" id="check-amount">Check Amount</button>   
                        </form>
                    </div>
                </div>
                 <!-- Output -->
                 <div class="output-container flex-space">
                    <div>
                        <p>Total Budget</p>
                        <span id="amount">0</span>
                    </div>
                    <div>
                        <p>Expenses</p>
                        <span id="expense-value">0</span>
                    </div>
                    <div>
                        <p>Balance</p>
                        <span id="balance-amount">0</span>
                    </div>
                 </div>
            </div>
            <!-- Budget Category List -->
            <div class="list">
                <h3>Budget Category List:</h3>
                <div class="expense-list-container" id="list">
                    <table>
                     <!-- Display all category name loop -->
                     <?php foreach ($categories as $category) : ?>
                      <tr>
                          <td><?php echo $categoryName;?></td>
                      </tr>
                     <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
       
        <!-- Footer -->
       <?php include '../view/footer.php'; ?>

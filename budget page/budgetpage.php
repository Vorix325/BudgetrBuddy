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
                            <p class= "hide error" id="month-error">Date is invalid</p>
                            <input type="date" class="month-date" id="month-date"/>
                            <button class = "submit" id="set-month-button">Set Month
                            </button>
                        </div>
                            <input type='text'><?php echo $errorMessage; ?></input>
                            <button class = "submit" id="set-month-button">Set Month </button>
                </div>

                <div class="budget-container">
                     <!-- Budget -->
                     <div class="budget-amount-container">
                        <h3>Budget</h3>
                        <label for="budget">Budget Total for the Month:</label>
                        <p class="hide error" id="budget-error">Value cannot be empty or negative</p>
                        <input type = "number" id="budget-amount" placeholder="Enter Your Budget"/>
                        <button class = "submit" id="budget-amount-button">Set Budget</button>    
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
                        <h3>Budget Categories</h3>
                        <label for="bcategory">Enter Your Expenses:</label>
                        <p class="hide error"
                        id="expense-title-error">Values cannot be empty
                        </p>
                        <input type="text"
                        class="expense-title"
                        id="expense-title"
                        placeholder="Enter Title of Expense"
                        />
                        <input 
                            type="number"
                            id="expense-amount"
                            placeholder="Enter Expense Cost"
                        />
                        <button class="submit" 
                        id="check-amount">Check Amount
                        </button>   
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
                      
                          <td><?php echo $category->getCaName();?></td>
                      
                     <?php endforeach; ?>
                    </table>
                <div class="expense-list-container"
                     id="list">
                </div>
            </div>
        </div>
        <!-- Java Script -->
        <script src = "script.js"></script>
        <!-- Footer -->
       <?php include '../view/footer.php'; ?>

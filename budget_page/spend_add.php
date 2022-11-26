<!DOCTYPE html>

<html lang="en">
    <head>
        <meta name="viewport"
        content="width=device-width, initial-scale=1.0" />
        <title>Add Spending</title>

        <!-- Google Font link -->
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap"
            rel="stylesheet"
        />
        <!-- Stylesheet -->
        <link rel="stylesheet" href="../bp-stylesheet.css" />
    </head>

    <body>
        <!-- Header -->
        <?php include '../view/header.php'; ?>

        <div class="wrapper">
            <div class="container">
                <div class="welcome">
                    <h3>Spent more money this month? Add your spending to the budget.</h3>
                </div>
            </div>
                

            <!-- Add New Spending -->
            <div class="super-welcome">
                <main>
                    <h1>Add Spending</h1>
                    <form action="." method="post" id="add_product_form">
                        <br>
                        <input type="hidden" name="action" value="addSpending">
                        <label>Select Budget Category:</label><br>
                        <select name="categoryId" class="select-category">
                        <?php foreach ( $categories as $category ) : ?>
                            <?php if($category->getMonth() == $currentM && $category->getYear() == $currentY) : ?>
                            <option value="<?php echo $category->getCaID(); ?>">
                                <?php echo $category->getCaName(); ?>
                            </option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        </select>
                        <br>
                        <input type ="hidden" name='userId' value='<?php echo $userId[0]; ?>'>
                        <label>Name:</label>
                        <input type="text" name="spending_Name" />
                        <br>
                        <label>Amount:</label>
                        <input type="text" name="spend" />
                        <br>
                        <label for="month">Select Month & Date of Spending:</label><br>
                        <p class= "hide error" id="month-error">Date is invalid</p>
                        <input type="date" class="month-date"  id="month-date" name='time'>
                        <br><br>
                        <input type='submit' class="profile-submit" value="Add Spending" />
                        <br>
                    </form>
                </main>
            </div>
        </div>
        <!-- Footer -->
        <?php include '../view/footer.php'; ?>
    </body>
</html>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta name="viewport"
        content="width=device-width, initial-scale=1.0" />
        <title>Edit Spending</title>

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
                    <h3>Need to adjust your spending costs? Edit your spending here.</h3>
                </div>
            </div>

            <!-- Edit Spending -->
            <div class="super-welcome">
                <main>
                    <h1>Edit Spending</h1><br>
                    <form action="./index.php" method="post" id="add_product_form">
                        <input type="hidden" name="action" value="updateSpending">
                        <label>Select Budget Category:</label><br>
                        <select name="categoryId" class="select-category">
                        <?php foreach ( $categories as $category ) : ?>
                            <?php if($category->getMonth() == $currentM && $category->getYear() == $currentY) : ?>
                            <option value="<?php echo $category->getCaID(); ?>" <?php if( $category->getCaID() == $category_id ): ?> selected="selected" <?php endif; ?>>
                                <?php echo $category->getCaName(); ?>
                            </option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        </select>
                        <br>
                        <input type ="hidden" name='spend_id' value='<?php echo $spendId; ?>'>
                        <input type ="hidden" name='userId' value='<?php echo $userId[0]; ?>'>
                        <label>Name:</label>
                        <input type="text" name="name" value="<?php echo $name; ?>" >
                        <br>

                        <label>Amount:</label>
                        <input type="text" name="amount" value="<?php echo $amount; ?>" >
                        <input type="hidden" name="old" value="<?php echo $amount; ?>" >
                        <br>
                        
                        <label for="month">Select Month & Date of Spending:</label>
                        <p class= "hide error" id="month-error">Date is invalid</p>
                        <input type="date" name = 'time' class="month-date"  id="month-date" value="<?php echo $times ?>" >
                        <br><br>
                        <input type="submit" class="profile-submit" value="Update Spending" >
                        <br>
                    </form>
                </main>
            </div>
        </div>
        <!-- Footer -->
        <?php include '../view/footer.php'; ?>
    </body>
</html>

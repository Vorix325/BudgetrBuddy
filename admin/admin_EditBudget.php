<!DOCTYPE html>

<html lang="en">
    <head>
        <meta name="viewport"
        content="width=device-width, initial-scale=1.0" />
        <title>Admin Edit Budget</title>

        <!-- Google Font link -->
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap"
            rel="stylesheet"
        />
        <!-- Stylesheet -->
        <link rel="stylesheet" href="../bp-stylesheet.css" />
    </head>

    <body>
        <?php include '../view/header.php'; ?>
        <div class="wrapper">
 
            <!-- Edit User Budget -->
            <div class="category-container">
            <main>
                <h1>Edit User Budget</h1>
                <form action="." method="post" id="start_month">
                    <input type="hidden" name="action" value="editBudget">
                    <br>
                    <input type ="hidden" name='userId' value='<?php echo $userId; ?>'>
                    <label>User:</label>
                    <input type='text' value="<?php echo $userName; ?>" readonly>
                    <br>
                    <label>Budget:</label>
                    <input type="text" name="amount" value="<?php echo $amount; ?>">
                    <br>
                    <label>Month: </label><!-- comment -->
                    <input type='text' value="<?php echo $month; ?>" readonly>
                    <label>Year: </label>
                    <input type='text' value="<?php echo $year; ?>" readonly>
                    <label>&nbsp;</label>
                    <button class=submit type=submit>Edit User Allowance</button>
                    <br>
                </form>
            </main>
         </div>
         <?php include '../view/footer.php'; ?>
    </body>

</html>

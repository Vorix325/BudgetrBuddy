<!DOCTYPE html>

<html lang="en">
    <head>
        <meta name="viewport"
        content="width=device-width, initial-scale=1.0" />
        <title>Add Budget Page</title>

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
                <!-- To Add Budget -->
                <div class="welcome">
                    <h3>Hey Buddy, set your budget limit here so we can keep track of your finances.</h3>
                </div>
            </div>

            <!-- Set Budget -->   
            <div class="category-container">
            <main>
                <h1>Set Budget</h1>
                <form action="." method="post" id="addCategory">
                    <input type="hidden" name="action" value="addCategory">
                    <input type ="hidden" name="userId" Value="<?php echo $userId; ?>"><!-- comment -->
                    <input type ="hidden" name="month" Value="<?php echo $month; ?>"><!-- comment -->
                    <input type ="hidden" name="year" Value="<?php echo $year; ?>"><!-- comment -->
                    <label>Name:</label>
                    <input type="text" name="ca_name" placeholder="Name"/>
                    <br>
                    <label>Limit:</label>
                    <input type="text" name="Limit" placeholder="Enter Amount" />
                    <br>
                    <input class="submit" type="submit" value="Set Budget" />
                    <br>
                </form>
            </main>
            </div>
        </div>
        <!-- Footer -->
        <?php include '../view/footer.php'; ?>
    </body>
</html>

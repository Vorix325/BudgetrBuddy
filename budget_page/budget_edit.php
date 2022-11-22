<!DOCTYPE html>

<html lang="en">
    <head>
        <meta name="viewport"
        content="width=device-width, initial-scale=1.0" />
        <title>Edit Budget Page</title>

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
                <!-- To Edit Budget -->
                <div class="welcome">
                    <h3>Need to adjust your budget? Edit your budget amount here.</h3>
                </div>
            </div>


            <!-- Edit Budget -->
            <div class="category-container">
            <main>
                <h1>Edit Budget</h1>
                <form action="." method="post" id="add_product_form">
                    <input type="hidden" name="action" value="add_product">
                    <input type ="hidden" name="userId" Value="<?php echo $userId; ?>"><!-- comment -->
                    <input type ="hidden" name="month" Value="<?php echo $month; ?>"><!-- comment -->
                    <input type ="hidden" name="year" Value="<?php echo $year; ?>"><!-- comment -->
                    <label>Name:</label>
                    <input type="text" name="ca_name" value="<?php echo $name; ?>"/>
                    <br>

                    <label>Limit:</label>
                    <input type="text" name="Limit" value='<?php echo $limit; ?>'/>
                    <br>

                    <label>&nbsp;</label>
                    <input class="submit" type="submit" value="Reset Budget" />
                    <br>
                </form>
            </main>
            </div>
            </div>
        </div>
        <!-- Footer -->
        <?php include '../view/footer.php'; ?>
    </body>
</html>

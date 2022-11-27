<!DOCTYPE html>

<html lang="en">
    <head>
        <meta name="viewport"
        content="width=device-width, initial-scale=1.0" />
        <title>Start Month</title>

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

        <?php include '../view/header.php'; ?>
        <!-- Start Month -->
        <div class="wrapper">
            <div class="category-container">   
                <main>
                    <h1>Start Month</h1>
                    <form action="." method="post" id="start_month">
                        <input type="hidden" name="action" value="addBudget">
                        <br>
                        <label>User:</label>
                        <select name = 'id'>
                            <?php foreach($user as $s) : ?>
                            <option value="<?php echo $s['user_id']; ?>"><?php echo $s['user_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <br>

                        <label>Budget:</label>
                        <input type="text" name="amount" >
                        <br>
                        <label>Month: </label>
                        <select name = 'month'>
                            <?php foreach($month_names as $month) : ?>
                            <option value="<?php echo $month; ?>"><?php echo $month; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label>Year: </label>
                        <select name='year'>
                            <?php foreach($year_10 as $year) : ?>
                            <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label>&nbsp;</label>
                        <br>
                        <button class=submit type=submit>Start Month</button>
                        <br>
                    </form>

                </main>
            </div>
        </div>
        <?php include '../view/footer.php'; ?>
     </body>
</html>

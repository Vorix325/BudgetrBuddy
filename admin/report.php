<!DOCTYPE html>

<html lang="en">
    <head>
        <meta name="viewport"
        content="width=device-width, initial-scale=1.0" />
        <title>Report</title>

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
 
            <!-- Report -->
            <div class="category-container">
                <main>
                    <h1>Report</h1>
                    <form action="." method="post" id="start_month">
                        <input type="hidden" name="action" value="editBudget">
                        <br>
                        <label>Top Spend Month:</label>

                        <?php foreach ($c90 as $c): ?>
                        <p><?php echo $c->getCaName(); ?> <?php echo $c->getTotal(); ?></p>
                        <?php endforeach; ?>
                        <br>
                        <table border="1">
                            <tr>
                                <th>Categories</th>
                                <th>Spending Limit</th>
                                <th>Total Spend</th>
                                <th>Month</th>
                                <th>Year</th>
                            </tr>
                        <?php foreach ($datas as $data): ?>
                        <tr>
                        <td><?php echo $data->getCaName(); ?></td>
                        <td><?php echo $data->getLimit(); ?></td>
                        <td><?php echo $data->getTotal(); ?></td>
                        <td><?php echo $data->getMonth(); ?></td>
                        <td><?php echo $data->getYear(); ?></td>
                        </tr>
                        <?php endforeach; ?>
                        </table>
                    </form>
                </main>
            </div>
        </div>
        <?php include '../view/footer.php'; ?>
    </body>
</html>


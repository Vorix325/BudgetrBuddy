<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport"
        content="width=device-width, initial-scale=1.0" />
        <title>Budget View</title>

        <!-- JS link -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
        <!-- Stylesheet -->
        <link rel="stylesheet" href="BudgetrBuddy/bp-stylesheet.css" />
    </head>

    <body>
        <!-- Header -->
        <?php include '../view/header.php'; ?>

        <div class="wrapper">
            <div class="container">
                <div class="welcome" id="welcome">
                    <p>test</p>
                    <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

    <script>
    var xValues = <?php echo $caName; ?>;
    var yValues = <?php echo $caTotal; ?>;
    var barColors = <?php echo $color; ?>;

    new Chart("myChart", {
    type: "bar",
    data: {
        labels: xValues,
        datasets: [{
        backgroundColor: barColors,
        data: yValues
        }]
    },
    options: {
        legend: {display: false},
        title: {
        display: true,
        text: "Spending Category"
        }
    }
    });
    </script>

                <nav>
                    <ul>
                        <?php foreach($caNames as $ca) : ?>
                        <form action="./index.php" method ="post">
                        <a href=""> <li><?php echo $ca; ?></li></a>
                        </form>
                        <?php endforeach; ?>
                    </ul><!-- comment -->
                    <Table>
                        <tr>
                            <th>Spend Id</th><!-- comment -->
                            <th>Cost Name</th><!-- comment -->
                            <th>Amount</th>
                        </tr>
                        <tr>
                    <?php foreach ($allSpend as $spend) : ?>
                        <td><?php echo $spend['spending_id']; ?></td>
                        <td><?php echo $spend['costName']; ?></td><!-- comment -->
                        <td><?php echo $spend['Sname']; ?></td>
                    <?php endforeach; ?>
                        </tr>
                    </Table>
                </nav>
                </div>
            </div>
        </div>
    <!-- Footer -->
    <?php include '../view/footer.php'; ?>
   
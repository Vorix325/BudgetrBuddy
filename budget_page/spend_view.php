<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport"
        content="width=device-width, initial-scale=1.0" />
        <title>Budget View</title>

        <!-- JS link -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
        <!-- Stylesheet -->
        <link rel="stylesheet" href="../bp-stylesheet.css" />
    </head>

    <body>
        <!-- Header -->
        <?php include '../view/header.php'; ?>

        <div class="wrapper">
            <div class="container">
                <div class="welcome" id="welcome">
                    <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

    <script>
    var xValues = <?php echo $caName; ?>;
    var yValues = <?php echo $caTotal; ?>;
    

    new Chart("myChart", {
    type: "bar",
    data: {
        labels: xValues,
        datasets: [{
        backgroundColor: "rgba(0,0,0,1.0)",
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
                            <th>Date</th><!-- comment -->
                            <th>Edit</th><!-- comment -->
                            <th>Delete</th>
                        </tr>
                        
                        <tr>
                    <?php foreach ($allSpend as $spend) : ?>
                        <?php if($spend['SMonth'] == $currentM && $spend['SYear'] = $currentY) : ?>
                        <td><input type='text' name='spend_id' value='<?php echo $spend['spending_id']; ?>'></td>
                        <td><input type='text' name='spending_Name' value='<?php echo $spend['costName']; ?>'></td>
                         <td><input type='text' name='category_id' value='<?php echo $spend['category_id']; ?>'></td>
                         <td><input type='text' name='time' value='<?php echo $spend['timeS']; ?>'></td>
                         <td><form action="./index.php" method='post'>
                                 <input type='hidden' name='action' value='showUpSpend'><!-- comment -->
                                 <input type='hidden' name='spend_id' value='<?php echo $spend['spending_id']; ?>'>
                                 <input type='hidden' name='spending_Name' value='<?php echo $spend['costName']; ?>'>
                                 <input type='hidden' name='category_id' value='<?php echo $spend['category_id']; ?>'>
                                 <input type='hidden' name='time' value='<?php echo $spend['timeS']; ?>'></td>
                                 
                            <button class="user-edit"><i class="fas fa-user-edit" id="user-edit"></i></button>
                         </form></td>
			<td><form action="./index.php" method='post'>
                              <input type='hidden' name='action' value='deleteSpend'><!-- comment -->
                              <input type='hidden' name='spend_id' value='<?php echo $spend['spending_id']; ?>'>
                              <input type='hidden' name='category_id' value='<?php echo $spend['category_id']; ?>'>
                              <button class="user-edit"><i class="fas fa-user-times" id="user-edit" onclick="return confirm('Are you sure?')" name="deleteSpend"></i></button>
                            </form></td>
                        <?php endif; ?>
                    <?php endforeach; ?>
                        </tr>
                    </Table>
                    <br>
                    <form action="./index.php" method='post'>
                         <input type='hidden' name='action' value='showAddSpend'><!-- comment -->
                          <input type='hidden' name='spend_id' value='<?php echo $spend['spending_id']; ?>'>
                          <input type='hidden' name='spending_Name' value='<?php echo $spend['costName']; ?>'>
                          <input type='hidden' name='category_id' value='<?php echo $spend['category_id']; ?>'>
                          <input type='hidden' name='time' value='<?php echo $spend['timeS']; ?>'>
                          <button type='submit' value='Add New Spending'>
                    </form>
                </nav>
                </div>
            </div>
        </div>
    <!-- Footer -->
    <?php include '../view/footer.php'; ?>
   
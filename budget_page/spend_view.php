<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport"
        content="width=device-width, initial-scale=1.0" />
        <title>Budget View</title>

        <!-- JS link -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
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
                    <table border =" 1">
                        <tr>
                        <?php foreach($categories as $ca) : ?>
                        <?php if($ca->getMonth() == $currentM && $ca->getYear() == $currentY) : ?>
                            <td><form action="./index.php" method ="post">
                                <input type ="hidden" name="current" value='<?php echo $ca->getCaID(); ?>'>
                                <button tpye = 'submit'><?php echo $ca->getCaName(); ?></button>
                              </form></td>
                        <?php endif; ?>
                        <?php endforeach; ?>
                        <tr>
                    </table><!-- comment -->
                    <br>
                    <table border = '1'>
                        <tr>
                            <th>Spend Id</th><!-- comment -->
                            <th>Cost Name</th><!-- comment -->
                            <th>Amount</th>
                            <th>Date Spent</th><!-- comment -->
                            <th>Edit</th><!-- comment -->
                            <th>Delete</th>
                        </tr>
                        
                        
                        
                    <?php foreach ($allSpend as $spend) : ?>
                        <tr>
                           
                      <?php if($spend['category_id'] == $current) : ?>
                        <?php if( $spend['SMonth'] == $currentM && $spend['SYear'] = $currentY) : ?>
                        <td><input type='text' name='spend_id' value='<?php echo $spend['spending_id']; ?>'></td>
                        <td><input type='text' name='spending_Name' value='<?php echo $spend['costName']; ?>'></td>
                         <td><input type='text' name='amount' value='<?php echo $spend['Samount']; ?>'></td>
                         <td><input type='text' name='time' value='<?php echo $spend['SYear'].'-'.$spend['SMonth'].'-'.$spend['SDate']; ?>'></td>
                         <td><form action="./index.php" method='post'>
                                 <input type='hidden' name='action' value='showUpSpend'><!-- comment -->
                                 <input type='hidden' name='spend_id' value='<?php echo $spend['spending_id']; ?>'>
                                 <input type='hidden' name='name' value='<?php echo $spend['costName']; ?>'>
                                 <input type='hidden' name='category_id' value='<?php echo $spend['category_id']; ?>'>
                                 <input type='hidden' name='amount' value='<?php echo $spend['Samount']; ?>'>
                                 <input type='hidden' name='date' value='<?php echo $spend['SDate']; ?>'>
                                 <input type='hidden' name='month' value='<?php echo $spend['SMonth']; ?>'>
                                 <input type='hidden' name='year' value='<?php echo $spend['SYear']; ?>'>
                                 <button class="user-edit"><i class="fas fa-user-edit" id="user-edit"></i></button>
                         </form></td>
			<td><form action="./index.php" method='post'>
                              <input type='hidden' name='action' value='deleteSpend'><!-- comment -->
                              <input type='hidden' name='spend_id' value='<?php echo $spend['spending_id']; ?>'>
                              <input type='hidden' name='category_id' value='<?php echo $spend['category_id']; ?>'>
                              <button class="user-edit"><i class="fas fa-user-times" id="user-edit" onclick="return confirm('Are you sure?')" name="deleteSpend"></i></button>
                            </form></td>
                        <?php endif; ?>
                      <?php endif; ?>
                             </tr>
                    <?php endforeach; ?>
                       
                    </Table>
                    <br>
                    <form action="./index.php" method='post'>
                         <input type='hidden' name='action' value='showAddSpend'><!-- comment -->
                          <input type='hidden' name='spend_id' value='<?php echo $spend['spending_id']; ?>'>
                          <input type='hidden' name='spending_Name' value='<?php echo $spend['costName']; ?>'>
                          <input type='hidden' name='category_id' value='<?php echo $spend['category_id']; ?>'>
                           <button type='submit' class="submit">Add new Spending</button>
                    </form>
                </nav>
                </div>
            </div>
        </div>
    <!-- Footer -->
    <?php include '../view/footer.php'; ?>
   
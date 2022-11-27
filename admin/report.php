<?php include '../view/header.php'; ?>
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
                <th>Categories</th><!--  -->
                <th>Spending Limit</th>
                <th>Total Spend</th><!-- comment -->
                <th>Month</th>
                <th>Year</th>
            </tr>
        <?php foreach ($datas as $data): ?>
        <tr>
        <tad><?php echo $data->getCaName(); ?></td>
        <td><?php echo $data->getLimit(); ?></td>
       
        
        <td><?php echo $data->getTotal(); ?></td>
        
        <td><?php echo $data->getMonth(); ?></td>
        
        <td><?php echo $data->getYear(); ?></td>
        
        </tr>
        <?php endforeach; ?>
        </table>
    </form>
    
</main>
<?php include '../view/footer.php'; ?>


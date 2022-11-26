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
        
        <?php foreach ($datas as $data): ?>
        <label>Categories :</label>
        <p><?php echo $data->getCaName(); ?></p>
        <br>
        <label>Spending Limit</label>
        <p><?php echo $data->getLimit(); ?></p>
        <br><!-- comment -->
        <label>Total Spend</label>
        <p><?php echo $data->getTotal(); ?></p>
        <br>
        <label>Month: </label><!-- comment -->
        <p><?php echo $data->getMonth(); ?></p>
        <label>Year: </label>
        <?php echo $data->getYear(); ?></p>
        <label>&nbsp;</label>
        <br>
        <?php endforeach; ?>
    </form>
    
</main>
<?php include '../view/footer.php'; ?>


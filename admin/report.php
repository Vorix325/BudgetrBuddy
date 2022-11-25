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
        <label>Month: </label><!-- comment -->
        <input type='text' value="<?php echo $month; ?>" readonly>
        <label>Year: </label>
        <input type='text' value="<?php echo $year; ?>" readonly>
        <label>&nbsp;</label>
        <input type="submit" value="Start Month" />
        <br>
        <?php endforeach; ?>
    </form>
    
</main>
<?php include '../view/footer.php'; ?>


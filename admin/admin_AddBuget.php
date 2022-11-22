<?php include '../view/header.php'; ?>
<main>
    <h1>Start Month</h1>
    <form action="." method="post" id="add_product_form">
        <input type="hidden" name="action" value="addSpending">
        <br>
        <input type ="hidden" name='userId' value='<?php echo $userId; ?>'>
        <label>Name:</label>
        <select></select>
        <br>

        <label>Budget:</label>
        <input type="text" name="amount" />
        <br>
        <label>Month: </label><!-- comment -->
        <select></select>
        <label>Year: </label>
        <select></select>
        <label>&nbsp;</label>
        <input type="submit" value="Add Spend" />
        <br>
    </form>
    
</main>
<?php include '../view/footer.php'; ?>
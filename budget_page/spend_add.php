<?php include '../view/header.php'; ?>
<main>
    <h1>Add New Spend</h1>
    <form action="." method="post" id="add_product_form">
        <input type="hidden" name="action" value="addSpending">

        <label>Category:</label>
        <select name="category_id">
        <?php foreach ( $categories as $category ) : ?>
            <option value="<?php echo $category->getCaID(); ?>">
                <?php echo $category->getCaName(); ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>
        <input type ="hidden" name='userId' value='<?php echo $userId; ?>'>
        <label>Name:</label>
        <input type="text" name="spendName" />
        <br>

        <label>Amount:</label>
        <input type="text" name="amount" />
        <br>
        
        <div class="start-month-container">
        <h3>Month Date</h3> 
        <label for="month">Select Month & Date</label>
        <p class= "hide error" id="month-error">Date is invalid</p>
        <input type="date" class="month-date"  id="month-date">
        </div>
        <label>&nbsp;</label>
        <input type="submit" value="Add Spend" />
        <br>
    </form>
    
</main>
<?php include '../view/footer.php'; ?>
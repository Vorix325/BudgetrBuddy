<?php include '../view/header.php'; ?>
<main>
    <h1>Edit Spend</h1>
    <form action="." method="post" id="add_product_form">
        <input type="hidden" name="action" value="updateSpending">

        <label>Category:</label>
        <select name="category_id">
        <?php foreach ( $categories as $category ) : ?>
            <option value="<?php echo $category->getCaID(); ?>" <?php if( $category->getCaID() == $category_id ): ?> selected="selected" <?php endif; ?>>
                <?php echo $category->getCaName(); ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>
        <input type ="hidden" name='userId' value='<?php echo $userId; ?>'>
        <label>Name:</label>
        <input type="text" name="spendName" value="<?php echo $name; ?>" />
        <br>

        <label>Amount:</label>
        <input type="text" name="amount" value="<?php echo $amount; ?>" />
        <br>
        
        <div class="start-month-container">
        <h3>Month Date</h3> 
        <label for="month">Select Month & Date</label>
        <p class= "hide error" id="month-error">Date is invalid</p>
        <input type="date" class="month-date"  id="month-date" value="<?php echo $date; ?>">
        </div>
        <label>&nbsp;</label>
        <input type="submit" value="Update Spend" />
        <br>
    </form>
    
</main>
<?php include '../view/footer.php'; ?>
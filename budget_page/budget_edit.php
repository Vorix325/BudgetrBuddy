<?php include '../view/header.php'; ?>
<main>
    <h1>Add New Category</h1>
    <form action="." method="post" id="add_product_form">
        <input type="hidden" name="action" value="add_product">
        <input type ="hidden" name="userId" Value="<?php echo $userId; ?>"><!-- comment -->
        <input type ="hidden" name="month" Value="<?php echo $month; ?>"><!-- comment -->
        <input type ="hidden" name="year" Value="<?php echo $year; ?>"><!-- comment -->
        <label>Name:</label>
        <input type="text" name="ca_name" value="<?php echo $name; ?>"/>
        <br>

        <label>Limit:</label>
        <input type="text" name="Limit" value='<?php echo $limit; ?>'/>
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Product" />
        <br>
    </form>
   

</main>
<?php include '../view/footer.php'; ?>
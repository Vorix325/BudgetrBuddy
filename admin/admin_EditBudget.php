es<?php include '../view/header.php'; ?>
<main>
    <h1>Edit User Budget</h1>
    <form action="." method="post" id="start_month">
        <input type="hidden" name="action" value="addBudget">
        <br>
        <input type ="hidden" name='userId' value='<?php echo $userId; ?>'>
        <label>User:</label>
        <input type='text' readonly>
        <br>

        <label>Budget:</label>
        <input type="text" name="amount" />
        <br>
        <label>Month: </label><!-- comment -->
        <input type='text' readonly>
        <label>Year: </label>
        <input type='text' readonly>
        <label>&nbsp;</label>
        <input type="submit" value="Start Month" />
        <br>
    </form>
    
</main>
<?php include '../view/footer.php'; ?>
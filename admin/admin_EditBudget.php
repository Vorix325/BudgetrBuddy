<?php include '../view/header.php'; ?>
<main>
    <h1>Edit User Budget</h1>
    <form action="." method="post" id="start_month">
        <input type="hidden" name="action" value="editBudget">
        <br>
        <input type ="hidden" name='userId' value='<?php echo $userId; ?>'>
        <label>User:</label>
        <input type='text' value="<?php echo $userName; ?>" readonly>
        <br>

        <label>Budget:</label>
        <input type="text" name="amount" value="<?php echo $amount; ?>">
        <br>
        <label>Month: </label><!-- comment -->
        <input type='text' value="<?php echo $month; ?>" readonly>
        <label>Year: </label>
        <input type='text' value="<?php echo $year; ?>" readonly>
        <label>&nbsp;</label>
        <input type="submit" value="Edit User Allowance" />
        <br>
    </form>
    
</main>
<?php include '../view/footer.php'; ?>
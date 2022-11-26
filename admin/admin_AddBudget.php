<?php include '../view/header.php'; ?>
<main>
    <h1>Start Month</h1>
    <form action="." method="post" id="start_month">
        <input type="hidden" name="action" value="addBudget">
        <br>
        <label>User:</label>
        <select name = 'id'>
            <?php foreach($user as $s) : ?>
            <option value="<?php echo $s['user_id']; ?>"><?php echo $s['user_name']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>

        <label>Budget:</label>
        <input type="text" name="amount" >
        <br>
        <label>Month: </label><!-- comment -->
        <select name = 'month'>
            <?php foreach($month_names as $month) : ?>
            <option value="<?php echo $month; ?>"><?php echo $month; ?></option>
            <?php endforeach; ?>
        </select>
        <label>Year: </label>
        <select name='year'>
            <?php foreach($year_10 as $year) : ?>
            <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
            <?php endforeach; ?>
        </select>
        <label>&nbsp;</label>
        <input type="submit" value="Start Month" />
        <br>
    </form>
    
</main>
<?php include '../view/footer.php'; ?>
<?php include '../view/header.php'; ?>
<div id="main">
    <h1 class="top">Test</h1>
    <p>
 <?php 
    $db = database::getDB();
    $query = 'SELECT * FROM currentQ
              ';
    $statement = $db->query($query);
    $print = $statement->fetch();
    print_r($print);
    ?></p>
</div>
<?php include '../view/footer.php'; ?>



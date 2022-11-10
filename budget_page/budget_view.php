<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<body>
<p>test</p>
<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>
var xValues = <?php echo $caName; ?>;
var yValues = <?php echo $caTotal; ?>;

var barColors = ["red", "green","blue","orange"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Spending Category"
    }
  }
});
</script>

 <nav>
        <ul>
            <?php foreach($caNames as $ca) : ?>
            <form action="./index.php" method ="post">
              <a href=""> <li><?php echo $ca; ?></li></a>
            </form>
            <?php endforeach; ?>
        </ul><!-- comment -->
        <table>
            <tr>
                <th>Spend Id</th><!-- comment -->
                <th>Cost Name</th><!-- comment -->
                <th>Amount</th>
            </tr>
            <tr>
        <?php foreach ($allSpend as $spend) : ?>
            <td><?php echo $spend['spending_id']; ?></td>
            <td><?php echo $spend['costName']; ?></td><!-- comment -->
            <td><?php echo $spend['Sname']; ?></td>
        <?php endforeach; ?>
            </tr>
        </table>
</nav>
</body>
</html>

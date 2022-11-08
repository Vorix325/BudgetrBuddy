<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<body>
<p>test</p>
<canvas id="myChart" style="width:100%;max-width:600px"></canvas>
<?php foreach($caNames as $ca) : ?>
<p><?php echo $ca; ?></p><!-- comment -->
<?php endforeach; ?>
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

</body>
</html>

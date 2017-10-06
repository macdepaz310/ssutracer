<?php
$connect = mysqli_connect("localhost", "root", "", "account");
$sql = "SELECT * FROM account_tbl";
$result = mysqli_query($connect, $sql);
$chart_data = '';
while ($row = mysqli_fetch_array($result))
{
  $chart_data .= " {year:'".$row["year"]."', profit:".$row["profit"].", purchase:".$row["purchase"].", sale:".$row["sale"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Chart Sample</title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script //# sourceMappingURL="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script //# sourceMappingURL="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script //# sourceMappingURL="http://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  </head>
  <body>
    <div class="container" style="width:900px;">
      <h1>CHART</h1>
    </div><br><br>
    <div id="chart">
    </div>

  </body>
</html>
<script>
Morris.Line({
  element : 'chart',
  data:[<?php echo $chart_data; ?>],
  xkeys: 'year',
  ykeys:['profit', 'purchase', 'sale'],
  lables:['Profit', 'Purchase','Sale'],
  hideHover:'auto'
});
</script>

<!--******* @ Author @ **********-->
<!--******* @ Nishanth  @ **********-->
<!--******* @  @ **********-->
<?php
//index.php
$connect = mysqli_connect("localhost", "test", "test", "test");
$query = "SELECT * FROM account";
$result = mysqli_query($connect, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ year: '".$row["year"]."', profit: ".$row["profit"].", purchase:".$row["purchase"].", sale: ".$row["sale"]."},";

}
//$chart_data_n = rtrim($chart_data,',');
//$chart_data = substr($chart_data, 0, -2);
//echo $chart_data_n  ;
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | How to use Morris.js chart with PHP & Mysql</title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 align="center">Report</h2>
   <h3 align="center">Last 10 Years Profit, Purchase and Sale Data</h3>
   <br /><br />
   <div id="chart"></div>
  </div>
 </body>
</html>

<script>
Morris.Line({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'year',
 ykeys:['profit', 'purchase', 'sale'],
 labels:['Profit', 'Purchase', 'Sale'],
 fillOpacity: 0.6,
      hideHover: 'auto',
      behaveLikeLine: true,
      resize: true,
      pointFillColors:['#ffffff'],
      pointStrokeColors: ['black'],
      lineColors:['green','gray','red'],
 hideHover:'auto',
 stacked:true
});
</script>

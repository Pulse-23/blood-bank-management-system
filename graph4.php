<?php 

    //include header file
    include ('include/A_header.php');
    //connecting to database 
    $conn = mysqli_connect('localhost', 'bhargavi', 'mysqlpwd123', 'bloodbank');
    if(!$conn){
      echo 'Error';
    }

    $query = " SELECT bloodbankid, name from bloodbank ";
    $result = mysqli_query($conn, $query);
    $bb_det = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $bb_id = [];
    $bb_name = [];
    for($i=0; $i<count($bb_det); $i++){
    	$bb_id[$i] = $bb_det[$i]['bloodbankid'];
    	$bb_name[$i] = $bb_det[$i]['name'];
    }

 ?>

 <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Bloodbank ID', 'Count'],

          <?php 

          	$query = [];
            $result = [];
            $count = [];
            $ans = [];

            for($i=0; $i<count($bb_id); $i++){
              $bbid = $bb_id[$i];
              $bbname = $bb_name[$i];
              $query[$i] = " SELECT count(bbid) from bloodbag where bbid='$bbid' ";
              $result[$i] = mysqli_query($conn, $query[$i]);
              $count[$i] = mysqli_fetch_all($result[$i], MYSQLI_ASSOC);
              $ans[$i] = $count[$i][0]['count(bbid)'];

              echo"['".$bbid."',".$ans[$i]."],";
            }

          ?>

        ]);

        var options = {
          chart: {
            title: 'Blood Bank Supplies',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <br><br><br><br>
    <div id="columnchart_material" style="width: 1200px; height: 600px;margin-left:200px"></div>
    <br><br>
  </body>
</html>

<?php 
  //include footer file
  include ('include/footer.php');
?>          
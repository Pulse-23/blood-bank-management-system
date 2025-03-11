<?php 

    //include header file
    include ('include/A_header.php');
    //connecting to database 
    $conn = mysqli_connect('localhost', 'bhargavi', 'mysqlpwd123', 'bloodbank');
    if(!$conn){
      echo 'Error';
    }

    $query = " SELECT hospitalid, name from hospital ";
    $result = mysqli_query($conn, $query);
    $h_det = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $h_id = [];
    $h_name = [];
    for($i=0; $i<count($h_det); $i++){
    	$h_id[$i] = $h_det[$i]['hospitalid'];
    	$h_name[$i] = $h_det[$i]['name'];
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
          ['Hospital ID', 'Count'],

          <?php 

          	$query = [];
            $result = [];
            $count = [];
            $ans = [];

            for($i=0; $i<count($h_id); $i++){
              $hid = $h_id[$i];
              $hname = $h_name[$i];
              $query[$i] = " SELECT count(hid) from demand where hid='$hid' ";
              $result[$i] = mysqli_query($conn, $query[$i]);
              $count[$i] = mysqli_fetch_all($result[$i], MYSQLI_ASSOC);
              $ans[$i] = $count[$i][0]['count(hid)'];

              echo"['".$hid."',".$ans[$i]."],";
            }

          ?>

        ]);

        var options = {
          chart: {
            title: 'Hospital Requests',
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
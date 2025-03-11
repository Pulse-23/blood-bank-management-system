<?php 

    //include header file
    include ('include/A_header.php');

    //connecting to database 
    $conn = mysqli_connect('localhost', 'bhargavi', 'mysqlpwd123', 'bloodbank');
    if(!$conn){
      echo 'Error';
    }

    $bg = array('A+','A-','B+','B-','O+','O-','AB+','AB-');

 ?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Blood Group', 'Number of Blood Bags'],
          <?php
            $c = count($bg);
            $query = [];
            $result = [];
            $count = [];
            $ans = [];
            for($i=0; $i<$c; $i++){
              $bg_ans = $bg[$i];
              $query[$i] = " SELECT count(*) from bloodbag where bloodgroup='$bg_ans' and bstatus='Available' ";
              $result[$i] = mysqli_query($conn, $query[$i]);
              $count[$i] = mysqli_fetch_all($result[$i], MYSQLI_ASSOC);
              $ans[$i] = $count[$i][0]['count(*)'];
              echo"['".$bg_ans."',".$ans[$i]."],";
            }
          ?>
        ]);

        var options = {
          title: 'Blood Group'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <br><br>
    <div id="piechart" style="width: 1000px; height: 600px;margin-left: 350px;"></div>
  </body>
</html>
<?php 
  //include footer file
  include ('include/footer.php');
?>          
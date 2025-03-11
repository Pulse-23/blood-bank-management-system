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
          ['Blood Group', 'Demand'],
          

          <?php
            $c = count($bg);
            $query_d = [];
            $result_d = [];
            $count_d = [];
            $ans_d = [];
            $query =[];
            $result= [];
            $count =[];
            $ans = [];
            for($i=0; $i<$c; $i++){
              $bg_ans = $bg[$i];
              $query_d[$i] = " SELECT sum(requiredno) from demand where bloodGroup = '$bg_ans'; ";
              $result_d[$i] = mysqli_query($conn, $query_d[$i]);
              $count_d[$i] = mysqli_fetch_all($result_d[$i], MYSQLI_ASSOC);
              if($count_d[$i][0]['sum(requiredno)'] == NULL) {
                $count_d[$i][0]['sum(requiredno)'] = 0;
              }
              $ans_d[$i] = $count_d[$i][0]['sum(requiredno)'];


              $query[$i] = " SELECT count(*) from bloodbag where bloodgroup='$bg_ans' and bstatus='Used' ";
              $result[$i] = mysqli_query($conn, $query[$i]);
              $count[$i] = mysqli_fetch_all($result[$i], MYSQLI_ASSOC);
              $ans[$i] = $count[$i][0]['count(*)'];

              echo"['".$bg_ans."',".$ans_d[$i]."],";
            }
          ?>


       ]);

        var options = {
          title: 'Demand',
          hAxis: {title: 'Blood Group',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <br><br><br>
    <div id="chart_div" style="width: 100%; height: 500px;"></div>
    <br>
  </body>
</html>




<?php 
  //include footer file
  include ('include/footer.php');
?>          

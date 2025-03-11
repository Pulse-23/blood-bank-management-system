<?php 


    //connecting to database 
    $conn = mysqli_connect('localhost', 'bhargavi', 'mysqlpwd123', 'bloodbank');
    if(!$conn){
      echo 'Error';
    }

    $bg = array('A+','A-','B+','B-','O+','O-','AB+','AB-');

 ?>

<html>
  <head>
    <style>
* {
  box-sizing: border-box;
}

.column {
  float: left;
  width: 33%;
  padding-top: 0px;
  padding-right: 0px;
  padding-bottom: 30px;
  padding-left: 0px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width: 500px) {
  .column {
    width: 100%;
  }
}

  input[type=image] {
  background-color: none;
  border: none;
  color: white;
  padding: 16px 32px;
  margin: 110px 0px 20px 65px;
}

</style>
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
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    <script>
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Blood Group', 'Demand', 'Available'],
          

          <?php
            $c = count($bg);
            $query = [];
            $result = [];
            $count = [];
            $ans = [];
            for($i=0; $i<$c; $i++){
              $bg_ans = $bg[$i];
              //echo $bg_ans;
              $query_d[$i] = " SELECT sum(requiredno) from demand where bloodGroup = '$bg_ans'; ";
              $result_d[$i] = mysqli_query($conn, $query_d[$i]);
              $count_d[$i] = mysqli_fetch_all($result_d[$i], MYSQLI_ASSOC);
              if($count_d[$i][0]['sum(requiredno)'] == NULL) {
                $count_d[$i][0]['sum(requiredno)'] = 0;
              }

              //print_r($count_d[$i][0]['sum(requiredno)']);

              $query[$i] = " SELECT count(*) from bloodbag where bloodgroup='$bg_ans' and bstatus='Available' ";
              $result[$i] = mysqli_query($conn, $query[$i]);
              $count[$i] = mysqli_fetch_all($result[$i], MYSQLI_ASSOC);
              $ans[$i] = $count[$i][0]['count(*)'];

              //print_r($ans[$i]);
              echo"['".$bg_ans."', '".$count_d[$i][0]['sum(requiredno)']."','".$ans[$i]."'],";
            }
          ?>


        ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
     <div class="row">
      <div class="column">
        <div id="piechart" style="width: 500px; height: 500px;"></div>
      </div>
      <div class="column">
        <div id="columnchart_material" style="width: 500px; height: 500px;"></div>
     </div>
   </div>
  </body>
</html>
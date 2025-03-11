<?php 

    //include header file
    include ('include/A_header.php');

    //connecting to database 
    $conn = mysqli_connect('localhost', 'bhargavi', 'mysqlpwd123', 'bloodbank');
    if(!$conn){
        echo 'Error';
    }
    session_start();

    $required = $_SESSION['required'];
    $bloodgroup = $_SESSION['bloodgroup'];
    $demand_id = $_SESSION['demandid'];


    $query = " SELECT bloodBagid, bloodgroup, bstatus, donorid from bloodbag ";
    $result = mysqli_query($conn, $query);
    $answers = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    $i = 0;
    foreach($answers as $answer){
      $bbid = $answer['bloodBagid'];
      $blood_group = $answer['bloodgroup'];
      $status = $answer['bstatus'];
      $did = $answer['donorid'];

      if($blood_group==$bloodgroup and $status=='Available'){
        $query_update_bb = " CALL updateBloodbag('$bbid') ";
        $result_update_bb = mysqli_query($conn, $query_update_bb);

        $query_donor_det = "SELECT usedQuantity, remainingQuantity from donor where donorid='$did' ";
        $result_donor_det = mysqli_query($conn, $query_donor_det);
        $donor_qty = mysqli_fetch_all($result_donor_det, MYSQLI_ASSOC);
        $used = $donor_qty[0]['usedQuantity'] + 1;
        $rem = $donor_qty[0]['remainingQuantity'] - 1;

        $query_update_donor = " CALL updateDonorQty('$used', '$rem', '$did') ";
        $result_update_donor = mysqli_query($conn, $query_update_donor);

        $query_update_demand = " CALL updateDemand('$demand_id') ";
        $result_update_demand = mysqli_query($conn, $query_update_demand);

        $i ++;
      }
      if($i == $required){
        break;
      }
    }

 ?>



<!DOCTYPE html>
  <html>
  <body>

  <br><br><br><br>
  <p style="font-family: verdana;font-size: 27px;color: #3d3d3d;text-align: center;font-weight: 900; margin-top: 50px;"> 
    TRANSACTION COMPLETED 
  </p><br><br>
  <p style="text-align: center;">
  <form method="post" action="A_home.php">
    <input type="image" src="img1/home.png" alt="submit" style="margin-left: 693px">
  </form>
  </p>
  <p style="font-family: verdana;font-size: 22px;color: #3d3d3d;text-align: center;font-weight: 900;"> 
    Go Home
  </p><br><br><br><br><br>


  </body>
  </html>


  <?php include 'include/footer.php' ?>
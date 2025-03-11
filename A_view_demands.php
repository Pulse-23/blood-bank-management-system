<?php 

  //include header file
  include ('include/A_header.php');

  //connecting to database 
  $conn = mysqli_connect('localhost', 'bhargavi', 'mysqlpwd123', 'bloodbank');
    if(!$conn){
      echo 'Error';
    }

    if(isset($_POST['submit'])){
    $hname = $_POST['hospital'];

    $query_hid = " SELECT hospitalid from hospital where name='$hname' ";
    $result_hid = mysqli_query($conn, $query_hid);
    $hid = mysqli_fetch_all($result_hid, MYSQLI_ASSOC);
    $hid_ans = $hid[0]['hospitalid'];

    $query_demand = " SELECT demandid, requiredno, bloodGroup from demand where hid='$hid_ans' and dstatus='Scheduled' ";
    $result_demand = mysqli_query($conn, $query_demand);
    $details = mysqli_fetch_all($result_demand, MYSQLI_ASSOC); 
    $count = mysqli_num_rows($result_demand);
    //print_r($details) ;
	}

 ?>



<!DOCTYPE html>
<html>
<style>
  .size{
    padding: 80px 0px;
  }
  img{
    width: 300px;
    height: 300px;
  }
  h2{
    font-size: 15px;
    color: #3d3d3d;
  }
  h1{
    color: white;
  }
  .size{
    min-height: 0px;
    padding: 70px 0 20px 0;
    
  }
  * {
      box-sizing: border-box;
    }

    /* Create three unequal columns that floats next to each other */
    .column {
      float: left;
      padding: 10px;
      height: 50px; /* Should be removed. Only for demonstration */
    }

    .left{
      width: 40%;
      margin-left: 0px;
      text-align: right;
    }


    .right{
      width: 10%;
      text-align: left;
    }

    .middle {
      width: 10%;
      text-align: center;
    }

    .rightr {
      width: 10%;
      margin-left: 90 px;
    }


    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }


     input[type=submit] {
      background-color: #666666;
      border: 2px solid #3d3d3d;
      color: white;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      margin: 0px 0px;
      cursor: pointer;
      border-radius: 10px;
      font-size: 20px; 
  }


</style>
<body>

  <div class="container-fluid red-background size">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h1 class="text-center">Demand Details</h1>
        <hr class="white-bar">
      </div>
    </div>
  </div>



  <?php 
    for($i=0; $i<$count; $i++){

      //extracting info
      $h_demand = ($details[$i]);
      $demand_id = $h_demand['demandid'];
      $requiredno = $h_demand['requiredno'];
      $bloodGroup = $h_demand['bloodGroup'];

  ?>



  <div class="container" style="background-color: #e5e5e5; padding-top: 10px; width: 850px; height: 100px;margin-top: 40px;margin-bottom: 50px; margin-left: 350px">
    <div class="row">
      <div class="column left" style="background-color:#e5e5e5;">
        <h2 style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;text-align: right;padding-top: 5px">Blood Group</h2>
        <h2 style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;text-align: right;padding-top: 5px">Required Number</h2>
      </div>
      <div class="column middle" style="background-color:#e5e5e5;">
        <h2 style="text-align: center;padding-top: 5px"> : </h2>
        <h2 style="text-align: center;padding-top: 5px"> : </h2>
      </div>
      <div class="column right" style="background-color:#e5e5e5;">
        <h2 style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;text-align: left;padding-top: 5px"><?php echo $bloodGroup ?></h2>
        <h2 style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;text-align: left;padding-top: 5px"><?php echo $requiredno ?></h2>
      </div>
      <div class="column rightr" style="background-color:#e5e5e5;">
        <p style="text-align: center;">
          <form method="post" action="A_actual_transaction.php">
            <input type="hidden" name="required" <?php echo 'value="'.$requiredno.'"'  ?>>
            <input type="hidden" name="bloodgroup" <?php echo 'value="'.$bloodGroup.'"'  ?>>
            <input type="hidden" name="demandID" <?php echo 'value="'.$demand_id.'"'  ?>>
            <input type="submit" value="Transact" >
          </form>
        </p>  
      </div>
    </div>
  </div>

  


  <?php
    
    }

  ?>
  <br>
  <form method="post" action="A_home.php">
    <input type="image" src="img1/home.png" alt="submit" style="margin-left: 693px">
  </form>
  </p>
  <p style="font-family: verdana;font-size: 22px;color: #3d3d3d;text-align: center;font-weight: 900;"> 
    Go Home
  </p>
<br>
</body>
</html>


<?php include 'include/footer.php' ?>
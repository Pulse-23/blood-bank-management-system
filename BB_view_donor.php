<?php 

  	//include header file
  	include ('include/U_header.php');

 	  $userid = $_GET['view_userid'];
    //echo $userid;

    $conn = mysqli_connect('localhost', 'bhargavi', 'mysqlpwd123', 'bloodbank');
    if(!$conn){
      echo 'Error';
    }

    $query_bbid = " SELECT bloodbankid FROM bloodbankpoc where userid='$userid' ";
    $result_bbid = mysqli_query($conn, $query_bbid);
    $bbid = mysqli_fetch_all($result_bbid, MYSQLI_ASSOC);
    $bbid_ans = $bbid[0]['bloodbankid'];


    $query_joint = " CALL donor_det('$bbid_ans') ";
    $result_joint = mysqli_query($conn, $query_joint);
    $details = mysqli_fetch_all($result_joint, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result_joint);
    //echo $count;
    //print_r($details);
    


    if (isset($_POST['p_userid'])) {
      $userid = $_POST['p_userid']; 
      $url = "BB_poc.php?p_userid=" . $userid;
      header((string)'Location: '.$url);
      exit();
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
      height: 300px; /* Should be removed. Only for demonstration */
    }

    .left{
      width: 24%;
      margin-left: 175px;
      text-align: right;
    }


    .right{
      width: 24%;
      text-align: left;
    }

    .middle {
      width: 10%;
      text-align: center;
    }


    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }


</style>
<body>

  <div class="container-fluid red-background size">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h1 class="text-center">Donor Details</h1>
        <hr class="white-bar">
      </div>
    </div>
  </div>



  <?php 
    for($i=0; $i<$count; $i++){

      //extracting info
      $now = ($details[$i]);
      //print_r($now);

      $first_name = $now['first_name'];
      $last_name = $now['last_name'];
      $gender = $now['gender'];
      $dob = $now['dob'];
      $phoneno = $now['phoneno'];
      $bloodGroup = $now['bloodGroup'];
      $totalQuantity = $now['totalQuantity'];
      $usedQuantity = $now['usedQuantity'];
      $remainingQuantity = $now['remainingQuantity']; 
  ?>



  <div class="container" style="background-color: #e5e5e5; padding-top: 10px; width: 850px; height: 320px;margin-top: 40px;margin-bottom: 50px">
    <div class="row">
      <div class="column left" style="background-color:#e5e5e5;">
        <h2 style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;text-align: right;padding-top: 5px">First Name</h2>
        <h2 style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;text-align: right;padding-top: 5px">Last Name</h2>
        <h2 style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;text-align: right;padding-top: 5px">Gender</h2>
        <h2 style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;text-align: right;padding-top: 5px">Date of Birth</h2>
        <h2 style="font-family: 'Lucida Sans Unicode','Lucida Grande', sans-serif;text-align: right;padding-top: 5px">Phone Number</h2>
        <h2 style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;text-align: right;padding-top: 5px">Blood Group</h2>
        <h2 style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;text-align: right;padding-top: 5px">Total Blood Bags</h2>
        <h2 style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;text-align: right;padding-top: 5px">Used Blood Bags</h2>
        <h2 style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;text-align: right;padding-top: 5px">Available Blood Bags</h2>
      </div>
      <div class="column middle" style="background-color:#e5e5e5;">
        <h2 style="text-align: center;padding-top: px"> : </h2>
        <h2 style="text-align: center;padding-top: 5px"> : </h2>
        <h2 style="text-align: center;padding-top: 5px"> : </h2>
        <h2 style="text-align: center;padding-top: 5px"> : </h2>
        <h2 style="text-align: center;padding-top: 5px"> : </h2>
        <h2 style="text-align: center;padding-top: 5px"> : </h2>
        <h2 style="text-align: center;padding-top: 5px"> : </h2>
        <h2 style="text-align: center;padding-top: 5px"> : </h2>
        <h2 style="text-align: center;padding-top: 5px"> : </h2>
      </div>
      <div class="column right" style="background-color:#e5e5e5;">
        <h2 style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;text-align: left;padding-top: 5px"><?php echo $first_name ?></h2>
        <h2 style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;text-align: left;padding-top: 5px"><?php echo $last_name ?></h2>
        <h2 style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;text-align: left;padding-top: 5px"><?php echo $gender ?></h2>
        <h2 style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;text-align: left;padding-top: 5px"><?php echo $dob ?></h2>
        <h2 style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;text-align: left;padding-top: 5px"><?php echo $phoneno ?></h2>
        <h2 style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;text-align: left;padding-top: 5px"><?php echo $bloodGroup ?></h2>
        <h2 style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;text-align: left;padding-top: 5px"><?php echo $totalQuantity ?></h2>
        <h2 style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;text-align: left;padding-top: 5px"><?php echo $usedQuantity ?></h2>
        <h2 style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;text-align: left;padding-top: 5px"><?php echo $remainingQuantity ?></h2>
      </div>
  </div>
  </div>

  <?php
    
    }

  ?>


  <p style="text-align: center;">
    <form method="post" action="BB_view_donor.php">
      <input type="hidden" name="p_userid" <?php echo 'value="'.$userid.'"'  ?>>
      <input type="image" src="img1/home.png" alt="submit" style="margin-left: 685px">
    </form>
  </p>
  <p style="font-family: verdana;font-size: 22px;color: #3d3d3d;text-align: center;font-weight: 900;"> 
    Go Home
  </p>

</body>
</html>
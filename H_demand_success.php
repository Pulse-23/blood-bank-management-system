<?php 

  //include header file
  include ('include/U_header.php');

  //connecting to database 
  $conn = mysqli_connect('localhost', 'bhargavi', 'mysqlpwd123', 'bloodbank');
    if(!$conn){
      echo 'Error';
    }


    $userid = 0;


    //for entering donor details
    if(isset($_POST['demand'])) {
      $reqno = $_POST['reqno'];
      $bloodgroup = $_POST['group'];
      $userid = $_POST['success_userid'];

      //echo $bloodgroup;
      //echo $userid;
    
      $query_hid = " SELECT hospitalid FROM hospitalpoc where userid='$userid' ";
      $result_hid = mysqli_query($conn, $query_hid);
      $hid = mysqli_fetch_all($result_hid, MYSQLI_ASSOC);
      $hid_ans = $hid[0]['hospitalid'];

      echo $reqno;
      echo $bloodgroup;
      echo $hid_ans;

      $query_insert_demand = " CALL insertIntoDemand('$reqno', '$bloodgroup', 'Scheduled', '$hid_ans') ";
      $result_insert_demand = mysqli_query($conn, $query_insert_demand);


    }


    if (isset($_POST['poc_userid'])) {
      $userid = $_POST['poc_userid'];
      $url = "H_poc.php?poc_userid=" . $userid;
      header((string)'Location: '.$url);
      exit();
    }


  ?>

  <!DOCTYPE html>
  <html>
  <body>


  <p style="font-family: verdana;font-size: 22px;color: #3d3d3d;text-align: center;font-weight: 900; margin-top: 50px;"> 
    Demand Details Added Successfully
  </p><br><br><br>
  <p style="text-align: center;">
  <form method="post" action="H_demand_success.php">
    <input type="hidden" name="poc_userid" <?php echo 'value="'.$userid.'"'  ?>>
    <input type="image" src="img1/home.png" alt="submit" style="margin-left: 693px">
  </form>
  </p>
  <p style="font-family: verdana;font-size: 22px;color: #3d3d3d;text-align: center;font-weight: 900;"> 
    Go Home
  </p>


  </body>
  </html>
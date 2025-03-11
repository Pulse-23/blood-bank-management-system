<?php 

    //include header file
    include ('include/U_header.php');


  $userid = 0;

  if(isset($_GET['userid'])){
      $userid = $_GET['userid'];
  }

  $conn = mysqli_connect('localhost', 'bhargavi', 'mysqlpwd123', 'bloodbank');
    if(!$conn){
      echo 'Error';
    }

    if (isset($_POST['prof_userid'])) {
      $userid = $_POST['prof_userid'];
      echo $userid;
      $url = "BB_poc.php?prof_userid=" . $userid;
      header((string)'Location: '.$url);
      exit();
    }

    $query = "SELECT first_name,last_name, gender, dob, phoneno,username,role from users where userid='$userid' ";
    $result = mysqli_query($conn, $query);
    $profiles = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //print_r($profiles);

    $first_name = $profiles[0]['first_name'];
    $last_name = $profiles[0]['last_name'];
    $gender = $profiles[0]['gender'];
    $dob = $profiles[0]['dob'];
    $phoneno = $profiles[0]['phoneno'];
    $username = $profiles[0]['username'];
    $role = "Blood Bank POC";

    $query_bbid = " SELECT bloodBankid from bloodbankpoc where userid='$userid' ";
    $result_bbid = mysqli_query($conn, $query_bbid);
    $bbid = mysqli_fetch_all($result_bbid, MYSQLI_ASSOC);
    $bbid_ans = $bbid[0]['bloodBankid'];
    $query = "SELECT name from bloodbank where bloodbankid='$bbid_ans' ";
    $result = mysqli_query($conn, $query);
    $bbnames = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $bbname = $bbnames[0]['name'];




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
    font-size: 27px;
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
      width: 30%;
      margin-left: 100px;
      text-align: right;
    }


    .right{
      width: 35%;
      text-align: left;
    }

    .middle {
      width: 20%;
      text-align: center;
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
      padding: 10px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      margin: 25px 2px;
      cursor: pointer;
      border-radius: 17px;
      font-size: 20px; 
  }


</style>

  <div class="container-fluid red-background size">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h1 class="text-center">Profile</h1>
        <hr class="white-bar">
      </div>
    </div>
  </div>
  <div class="container" style="background-color: #e5e5e5; padding-top: 10px; width: 1500px; height: 480px;margin-top: 40px;margin-bottom: 50px">
    <div class="row">
      <div class="column left" style="background-color:#e5e5e5;">
        <h2 style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;text-align: right;padding-top: 5px">First Name</h2>
        <h2 style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;text-align: right;padding-top: 5px">Last Name</h2>
        <h2 style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;text-align: right;padding-top: 5px">Gender</h2>
        <h2 style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;text-align: right;padding-top: 5px">Date of Birth</h2>
        <h2 style="font-family: 'Lucida Sans Unicode','Lucida Grande', sans-serif;text-align: right;padding-top: 5px">Phone Number</h2>
        <h2 style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;text-align: right;padding-top: 5px">User Name</h2>
        <h2 style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;text-align: right;padding-top: 5px">Role</h2>
        <h2 style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;text-align: right;padding-top: 5px">Blood Bank</h2>
        <form method="post" action="BB_change_pass.php">
          <input type="hidden" name="change_pwd" <?php echo 'value="'.$userid.'"'  ?>>
          <input type="submit" value="Change Password" style="margin-left: 65px;">
      </form>
        <!--a href="BB_change_pass.php"><p align="center"><button class="button" style="margin-top: 20px;margin-right: 65px">Change Password</button> </p></a-->
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
        <form method="post" action="BB_delete_acc.php">
          <input type="hidden" name="delete" <?php echo 'value="'.$userid.'"'  ?>>
          <input type="submit" value="Delete Account" style="margin-top: 31px">
      </form>
      </div>
      <div class="column right" style="background-color:#e5e5e5;">
        <h2 style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;text-align: left;padding-top: 5px"><?php echo $first_name ?></h2>
        <h2 style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;text-align: left;padding-top: 5px"><?php echo $last_name ?></h2>
        <h2 style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;text-align: left;padding-top: 5px"><?php echo $gender ?></h2>
        <h2 style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;text-align: left;padding-top: 5px"><?php echo $dob ?></h2>
        <h2 style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;text-align: left;padding-top: 5px"><?php echo $phoneno ?></h2>
        <h2 style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;text-align: left;padding-top: 5px"><?php echo $username ?></h2>
        <h2 style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;text-align: left;padding-top: 5px"><?php echo $role ?></h2>
        <h2 style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;text-align: left;padding-top: 5px"><?php echo $bbname ?></h2>
        <form method="post" action="BB_change_phoneno.php">
          <input type="hidden" name="change_phno" <?php echo 'value="'.$userid.'"'  ?>>
          <input type="submit" value="Change Phone Number" style="margin-right: 65px;">
      </form>
      </div>
  </div>
  </div>



<p style="text-align: center;">
  <form method="post" action="BB_profile.php">
    <input type="hidden" name="prof_userid" <?php echo 'value="'.$userid.'"'  ?>>
    <input type="image" src="img1/home.png" alt="submit" style="margin-left: 680px">
  </form>
  </p>
  <p style="font-family: verdana;font-size: 22px;color: #3d3d3d;text-align: center;font-weight: 900;"> 
    Go Home
  </p>


  
</html>




 <?php include 'include/footer.php' ?>
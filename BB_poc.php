<?php 

  //include header file
  include ('include/U_header.php');

  //connecting to database 
  $conn = mysqli_connect('localhost', 'bhargavi', 'mysqlpwd123', 'bloodbank');
    if(!$conn){
      echo 'Error';
    }


    $userid = 0;



    if(isset($_POST['submit']) or isset($_POST['signin'])) {
      $username = $_POST['username'];
      $pwd = $_POST['password'];
      $userid_username_ans = 0;
      $userid_pwd_ans = 0;

      $query_userid_username = " SELECT userid FROM users where username='$username' ";
      $result_userid_username = mysqli_query($conn, $query_userid_username);
      $userid_username = mysqli_fetch_all($result_userid_username, MYSQLI_ASSOC);
      if(empty($userid_username)){
        header("Location: BB_signin_failure.php");
      }
      $userid_username_ans = $userid_username[0]['userid'];

      $query_userid_pwd = " SELECT userid FROM users where pwd='$pwd' and role='BBPOC' ";
      $result_userid_pwd = mysqli_query($conn, $query_userid_pwd);
      $userid_pwd = mysqli_fetch_all($result_userid_pwd, MYSQLI_ASSOC);
      if(!empty($userid_pwd)){
        $userid_pwd_ans = $userid_pwd[0]['userid'];
      }

      $userid = $userid_pwd_ans;
      if(!($userid_username_ans == $userid_pwd_ans))  {
        header("Location: BB_signin_failure.php");
      }
    }


    //for BB_profile
    if (isset($_POST['userid'])) {
      $userid = $_POST['userid'];
      $url = "BB_profile.php?userid=" . $userid;
      header((string)'Location: '.$url);
      exit();
    }


    if (isset($_POST['donor_userid'])) {
      $userid = $_POST['donor_userid'];
      $url = "BB_donor_details.php?donor_userid=" . $userid;
      header((string)'Location: '.$url);
      exit();
    }


    if (isset($_POST['view_userid'])) {
      $userid = $_POST['view_userid'];
      $url = "BB_view_donor.php?view_userid=" . $userid;
      header((string)'Location: '.$url);
      exit();
    }

    
    if(isset($_GET['poc_userid'])){
      $userid = $_GET['poc_userid'];
    }
    
    //echo $userid;


    if(isset($_GET['p_userid'])){
      $userid = $_GET['p_userid'];
    }
    
    //echo $userid;


    if(isset($_GET['prof_userid'])){
      $userid = $_GET['prof_userid'];
    }
    
    //echo $userid;

    



 ?>




<!DOCTYPE html>
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
  padding-bottom: 0px;
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
</head>
<body>


<div class="row">
  <div class="column">
    <p style="text-align: center;">
      <form method="post" action="BB_poc.php">
        <input type="hidden" name="donor_userid" <?php echo 'value="'.$userid.'"'  ?>>
        <input type="image" src="img1/poc1.png" alt="submit">
      </form>
    </p>
    <p style="font-family: verdana;font-size: 22px;color: #3d3d3d;text-align: center;font-weight: 900;"> 
        Add Donor Details
    </p>
    <br><br><br>
  </div>
  <div class="column">
    <p style="text-align: center;">
      <form method="post" action="BB_poc.php">
        <input type="hidden" name="userid" <?php echo 'value="'.$userid.'"'  ?>>
        <input type="image" src="img1/poc3.png" alt="submit">
      </form>
    </p>
    <p style="font-family: verdana;font-size: 22px;color: #3d3d3d;text-align: center;font-weight: 900;"> 
        View Profile
    </p>
    <br><br><br>
  </div>
  <div class="column">
    <p style="text-align: center;">
      <form method="post" action="BB_poc.php">
        <input type="hidden" name="view_userid" <?php echo 'value="'.$userid.'"'  ?>>
        <input type="image" src="img1/poc2.png" alt="submit">
      </form> 
    </p>
    <p style="font-family: verdana;font-size: 22px;color: #3d3d3d;text-align: center;font-weight: 900;"> 
        View Donor Details
    </p>
    <br><br><br>
  </div>
</div>

</body>
</html>


 <?php include 'include/footer.php' ?>
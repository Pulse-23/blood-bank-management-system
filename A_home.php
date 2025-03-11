<?php 

  //include header file
  include ('include/A_header.php');

  //connecting to database 
  $conn = mysqli_connect('localhost', 'bhargavi' , 'mysqlpwd123', 'bloodbank');
    if(!$conn){
      echo 'Error';
    }


    if(isset($_POST['submit']) or isset($_POST['signin'])) {
      $username = $_POST['username'];
      $pwd = $_POST['password'];
      $userid_username_ans = 0;
      $userid_pwd_ans = 0;

      $query_userid_username = " SELECT id FROM admin where username='$username' ";
      $result_userid_username = mysqli_query($conn, $query_userid_username);
      $userid_username = mysqli_fetch_all($result_userid_username, MYSQLI_ASSOC);
      if(empty($userid_username)){
        header("Location: A_signin_failure.php");
      }
      $userid_username_ans = $userid_username[0]['id'];

      $query_userid_pwd = " SELECT id FROM admin where pwd='$pwd'" ;
      $result_userid_pwd = mysqli_query($conn, $query_userid_pwd);
      $userid_pwd = mysqli_fetch_all($result_userid_pwd, MYSQLI_ASSOC);
      if(!empty($userid_pwd)){
        $userid_pwd_ans = $userid_pwd[0]['id'];
      }

      if(!($userid_username_ans == $userid_pwd_ans))  {
        header("Location: A_signin_failure.php");
      }
    }

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
</head>
<body>


<div class="row">
  <div class="column">
    <p style="text-align: center;">
      <a href="A_bloodbank.php">
        <img border="0" src="img1/home1.png" style="margin-top: 110px">
      </a>
    </p>
    <p style="font-family: verdana;font-size: 22px;color: #3d3d3d;text-align: center;font-weight: 900;"> 
        Blood Bank
    </p>
    <br><br><br>
  </div>
  <div class="column">
    <p style="text-align: center;">
       <a href="A_transaction.php">
        <img border="0" src="img1/home2.png" style="margin-top: 110px">
      </a>
    </p>
    <p style="font-family: verdana;font-size: 22px;color: #3d3d3d;text-align: center;font-weight: 900;"> 
        Transactions
    </p>
    <br><br><br>
  </div>
  <div class="column">
    <p style="text-align: center;">
      <a href="A_hospital.php">
        <img border="0" src="img1/home3.png" style="margin-top: 110px">
      </a>
    </p>
    <p style="font-family: verdana;font-size: 22px;color: #3d3d3d;text-align: center;font-weight: 900;"> 
        Hospital
    </p>
    <br><br><br>
  </div>
</div>

</body>
</html>


 <?php include 'include/footer.php' ?>
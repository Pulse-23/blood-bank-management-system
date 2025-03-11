<?php 

  //include header file
  include ('include/A_header.php');

  //connecting to database 
  $conn = mysqli_connect('localhost', 'bhargavi', 'mysqlpwd123', 'bloodbank');
    if(!$conn){
      echo 'Error';
    }

 ?>



<!DOCTYPE html>
  <html>
  <body>

  <br><br><br><br>
  <p style="font-family: verdana;font-size: 27px;color: #3d3d3d;text-align: center;font-weight: 900; margin-top: 50px;"> 
    TRANSACTION CANNOT BE COMPLETED 
  </p><br><br>
  <p style="text-align: center;">
  <form method="post" action="A_home.php">
    <input type="image" src="img1/home.png" alt="submit" style="margin-left: 685px">
  </form>
  </p>
  <p style="font-family: verdana;font-size: 22px;color: #3d3d3d;text-align: center;font-weight: 900;"> 
    Go Home
  </p><br><br><br><br><br>


  </body>
  </html>


  <?php include 'include/footer.php' ?>
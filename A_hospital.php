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
<head>
<style>
* {
  box-sizing: border-box;
}

.column {
  float: left;
  width: 50%;
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
      <a href="A_add_hospital.php">
        <img border="0" src="img1/add.png" style="margin-top: 110px">
      </a>
    </p>
    <p style="font-family: verdana;font-size: 22px;color: #3d3d3d;text-align: center;font-weight: 900;"> 
        Add Hospital
    </p>
    <br><br><br>
  </div>
  <div class="column">
    <p style="text-align: center;">
       <a href="A_del_hospital.php">
        <img border="0" src="img1/delete.png" style="margin-top: 110px">
      </a>
    </p>
    <p style="font-family: verdana;font-size: 22px;color: #3d3d3d;text-align: center;font-weight: 900;"> 
        Remove Hospital
    </p>
    <br><br><br>
  </div>
</div>

</body>
</html>


 <?php include 'include/footer.php' ?>
<?php 
	
	//include header file
    include ('include/header.php');

	$conn = mysqli_connect('localhost', 'bhargavi', 'mysqlpwd123', 'bloodbank');
    if(!$conn){
      echo 'Error';
    }

    if(isset($_POST['delete'])){
    	$userid = $_POST['delete'];

    	$query1 = " CALL delete_bbpoc('$userid') ";
    	$result1 = mysqli_query($conn, $query1);
    	$query2 = " CALL delete_user('$userid') ";
    	$result2 = mysqli_query($conn, $query2);

        header("Location: index.php");
        exit();
    }

 ?>


  <?php include 'include/footer.php' ?>
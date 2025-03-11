<?php 


    //connecting to database 
    $conn = mysqli_connect('localhost', 'bhargavi', 'mysqlpwd123', 'bloodbank');
    if(!$conn){
      echo 'Error';
    }
    session_start();

    if(isset($_POST['required'])){
      $required = $_POST['required'];
      $_SESSION['required'] = $required;
    }

    if(isset($_POST['bloodgroup'])){
      $bloodgroup = $_POST['bloodgroup'];
      $_SESSION['bloodgroup'] = $bloodgroup;
    }

    if(isset($_POST['demandID'])){
      $demand_id = $_POST['demandID'];
      $_SESSION['demandid'] = $demand_id;
    }

    $query_count = " CALL count_('$bloodgroup') ";
    $result_count = mysqli_query($conn, $query_count);
    $count = mysqli_fetch_all($result_count, MYSQLI_ASSOC);
    $count_ans = $count[0]['count(*)'];

    //checking count and processing
    if($count_ans < $required){
      header("Location: A_transaction_failure.php");
    }
    else{
      header("Location: A_transaction_success.php");
    }
 ?>

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
    if(isset($_POST['donor'])) {
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $gender = $_POST['gender'];
      $day = $_POST['date'];
      $month = $_POST['month'];
      $year = $_POST['year'];
      $date = strftime("%F", strtotime($year."-".$month."-".$day));
      $phoneno = $_POST['contact_no'];
      $country = $_POST['country'];
      $state = $_POST['state'];
      $city = $_POST['city'];
      $bloodgroup = $_POST['group'];
      $userid = $_POST['success_userid'];

      //echo $bloodgroup;
      //echo $userid;
    
      $query_bbid = " SELECT bloodbankid FROM bloodbankpoc where userid='$userid' ";
      $result_bbid = mysqli_query($conn, $query_bbid);
      $bbid = mysqli_fetch_all($result_bbid, MYSQLI_ASSOC);
      $bbid_ans = $bbid[0]['bloodbankid'];

      $query_donor = " SELECT donorid FROM donor where phoneno='$phoneno' ";
      $result_donor = mysqli_query($conn, $query_donor);
      $count_donor = mysqli_num_rows($result_donor);


      if($count_donor == 0){
        $query_insert_donors = " CALL insertIntoDonor('$firstname', '$lastname', '$gender', '$date', '$phoneno', '$country', 
                                  '$state', '$city', '$bloodgroup', '1', '0', '1') ";
        $result_insert_donor = mysqli_query($conn, $query_insert_donors);
        //echo 'Inserted';

        //extract donor id
        $query_donor1 = " SELECT donorid FROM donor where phoneno='$phoneno' ";
        $result_donor1 = mysqli_query($conn, $query_donor1);
        $donor_row1 = mysqli_fetch_all($result_donor1, MYSQLI_ASSOC);
        $donorid1 = $donor_row1[0]['donorid'];

        $query_insert_bloodbag = " CALL insertIntoBloodBag('Available', '$donorid1', '$bbid_ans', '$bloodgroup') ";
        $result_insert_bloodbag = mysqli_query($conn, $query_insert_bloodbag);
      }
      elseif ($count_donor > 0) {
        $donor_row = mysqli_fetch_all($result_donor, MYSQLI_ASSOC);
        $donorid = $donor_row[0]['donorid'];

        $query_totalq = " SELECT totalQuantity FROM donor where phoneno='$phoneno' ";
        $result_totalq = mysqli_query($conn, $query_totalq);
        $totalq = mysqli_fetch_all($result_totalq, MYSQLI_ASSOC);
        $totalQuantity = $totalq[0]['totalQuantity'];

        $query_remq = " SELECT remainingQuantity FROM donor where phoneno='$phoneno' ";
        $result_remq = mysqli_query($conn, $query_remq);
        $remq = mysqli_fetch_all($result_remq, MYSQLI_ASSOC);
        $remQuantity = $remq[0]['remainingQuantity'];

        $totalQuantity = $totalQuantity + 1;
        $remQuantity = $remQuantity + 1;

        $query_update_donors = " CALL updateDonor('$totalQuantity', '$remQuantity', '$phoneno') ";
        $result_update_users = mysqli_query($conn, $query_update_donors);

        $query_insert_bloodbag = " CALL insertIntoBloodBag('Available', '$donorid', '$bbid_ans', '$bloodgroup') ";
        $result_insert_bloodbag = mysqli_query($conn, $query_insert_bloodbag);
      }


    }


    if (isset($_POST['poc_userid'])) {
      $userid = $_POST['poc_userid'];
      $url = "BB_poc.php?poc_userid=" . $userid;
      header((string)'Location: '.$url);
      exit();
    }


  ?>

  <!DOCTYPE html>
  <html>
  <body>


  <p style="font-family: verdana;font-size: 22px;color: #3d3d3d;text-align: center;font-weight: 900; margin-top: 50px;"> 
    Donor Details Added Successfully
  </p><br><br><br>
  <p style="text-align: center;">
  <form method="post" action="BB_donor_success.php">
    <input type="hidden" name="poc_userid" <?php echo 'value="'.$userid.'"'  ?>>
    <input type="image" src="img1/home.png" alt="submit" style="margin-left: 693px">
  </form>
  </p>
  <p style="font-family: verdana;font-size: 22px;color: #3d3d3d;text-align: center;font-weight: 900;"> 
    Go Home
  </p>


  </body>
  </html>
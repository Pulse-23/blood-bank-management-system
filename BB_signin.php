<?php 

    //include header file
    include ('include/header.php');

    //connecting to database 
    $conn = mysqli_connect('localhost', 'bhargavi', 'mysqlpwd123', 'bloodbank');
    if(!$conn){
        echo 'Error';
    }

    //getting the data into variables
    if(isset($_POST['submit'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $day = $_POST['date'];
        $month = $_POST['month'];
        $year = $_POST['year'];
        $date = strftime("%F", strtotime($year."-".$month."-".$day));
        $phoneno = $_POST['contact_no'];
        $bbname = $_POST['bloodbank'];
        $username = $_POST['email'];
        $pwd = $_POST['password'];

        $flag = 0;
        //checking for repeated entries - email 
        $query_username = " SELECT username FROM users where username='$username' ";
        $result_username = mysqli_query($conn, $query_username);
        $count_username = mysqli_num_rows($result_username);
        if($count_username > 0){
            $flag = 1;
            header("Location: BB_signup_email_failure.php");
        }

        //checking for repeated entries - bbname
        //get bbid from bb table
        $query_bbid = " SELECT bloodbankid FROM bloodbank where name='$bbname' ";
        $result_bbid = mysqli_query($conn, $query_bbid);
        $bbid = mysqli_fetch_all($result_bbid, MYSQLI_ASSOC);
        $bbid_ans = $bbid[0]['bloodbankid'];
        //check if that bbid is there in bbPOC table 
        $query_bbid1 = " SELECT bloodbankid FROM bloodbankpoc where bloodBankid='$bbid_ans' ";
        $result_bbid1 = mysqli_query($conn, $query_bbid1);
        $count_bbid = mysqli_num_rows($result_bbid1);
        if($count_bbid > 0){
            $flag = 1;
            header("Location: BB_signup_BB_failure.php");
        }


        //if both the if conditions fail, we insert into appropriate tables
        if($flag == 0){
            $query_insert_users = " CALL insertIntoUsers('$firstname', '$lastname', '$gender', '$date', '$phoneno', '$username', '$pwd', 'BBPOC') ";
            $result_insert_users = mysqli_query($conn, $query_insert_users);

            //insert into bbpoc table by getting 
            //1. appropriate userid
            $query_userid = " SELECT userid FROM users where username='$username' ";
            $result_userid = mysqli_query($conn, $query_userid);
            $userid = mysqli_fetch_all($result_userid, MYSQLI_ASSOC);
            $userid_ans = $userid[0]['userid'];
            //2. appropriate bbid - alr found as bbid_ans

            $query_insert_bbpoc = " CALL insertIntoBbpoc('$bbid_ans', '$userid_ans') ";
            $result_insert_bbpoc = mysqli_query($conn, $query_insert_bbpoc);
        }

    }

?>

<style>
    .size{
        min-height: 150px;
        padding: 30px 0 60px 0;

    }
    h1{
        color: white;
    }
    .form-group{
        text-align: left;
    }
    h3{
        color: #e74c3c;
        text-align: center;
    }
    .red-bar{
        width: 25%;
    }
    .form-container{
        background-color: white;
        border: .5px solid #eee;
        border-radius: 5px;
        padding: 20px 10px 20px 30px;
        -webkit-box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
-moz-box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
    }
</style>
 <div class="container-fluid white-background size">
    <div class="row">
    </div>
</div>
<div class="conatiner size ">
    <div class="row">
        <div class="col-md-6 offset-md-3 form-container">
        <h3>Sign In</h3>
        <hr class="red-bar">
        
        <!-- Erorr Messages -->

            <form action="BB_poc.php" method="post" >
                <div class="form-group">
                    <label for="email">Username (Email id)</label>
                    <input type="text" name="username" class="form-control" placeholder="Email Or Phone" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Password" required class="form-control">
                </div>
                <div class="form-group">
                        <button id="submit" name="submit" type="submit" class="btn btn-lg btn-danger center-aligned" style="margin-top: 20px;">Sign In</button>
                    </div>
            </form>
        </div>
    </div>
</div>
<?php include 'include/footer.php' ?>

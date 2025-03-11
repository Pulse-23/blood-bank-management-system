<?php 
	
	//include header file
    include ('include/U_header.php');

	$conn = mysqli_connect('localhost', 'bhargavi', 'mysqlpwd123', 'bloodbank');
    if(!$conn){
      echo 'Error';
    }

    if(isset($_POST['change_pwd'])){
    	$userid = $_POST['change_pwd'];
    }
    if(isset($_POST['pwd_update'])) {
    	$userid = $_POST['pwd_update'];
    	$new_pwd = $_POST['new_password'];
    	$query = " CALL update_password('$userid', '$new_pwd') ";
    	$result = mysqli_query($conn, $query);

    	$url = "BB_profile.php?userid=" . $userid;
        header((string)'Location: '.$url);
        exit();
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
	input[type=submit] {
  background-color: #e74c3c;
  border: 3px solid #e74c3c;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 20px 100px 0px 310px;
  cursor: pointer;
  border-radius: 17px;
}
</style>
 <div class="container-fluid white-background size">
	<div class="row">
	</div>
</div>
<div class="conatiner size ">
	<div class="row">
		<div class="col-md-6 offset-md-3 form-container">
		<h3>Change Password</h3>
		<hr class="red-bar">
		
		<!-- Erorr Messages -->

			<form action="BB_change_pass.php" method="post" >
				<div class="form-group">
					<label for="password">Old Password</label>
					<input type="password" name="password" placeholder="Password" required class="form-control">
				</div>
				<div class="form-group">
					<label for="password">New Password</label>
					<input type="password" name="new_password" placeholder="Password" required class="form-control">
				</div>
				<input type="hidden" name="pwd_update" <?php echo 'value="'.$userid.'"'  ?>>
          		<input type="submit" value="Update">
			</form>
		</div>
	</div>
</div>


  <?php include 'include/footer.php' ?>
<?php 
	
	//include header file
    include ('include/U_header.php');

	$conn = mysqli_connect('localhost', 'bhargavi', 'mysqlpwd123', 'bloodbank');
    if(!$conn){
      echo 'Error';
    }

    if(isset($_POST['change_phno'])){
    	$userid = $_POST['change_phno'];
    }
    if(isset($_POST['phno_update'])) {
    	$userid = $_POST['phno_update'];
    	$new_phno = $_POST['new_phno'];
    	$query = " CALL update_phno('$userid', '$new_phno') ";
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
		<h3>Change Phone number</h3>
		<hr class="red-bar">
		
		<!-- Erorr Messages -->

			<form action="BB_change_phoneno.php" method="post" >
				<div class="form-group"><br>
              		<label for="contact_no">Old Phone number: </label>
              		<input type="text" name="old_phno" value="" placeholder="**********" class="form-control" required pattern="^\d{10}$" title="10 numeric characters only" maxlength="10">
            	</div>
            	<div class="form-group"><br>
              		<label for="contact_no">New Phone number: </label>
              		<input type="text" name="new_phno" value="" placeholder="**********" class="form-control" required pattern="^\d{10}$" title="10 numeric characters only" maxlength="10">
            	</div>
				<input type="hidden" name="phno_update" <?php echo 'value="'.$userid.'"'  ?>>
          		<input type="submit" value="Update">
			</form>
		</div>
	</div>
</div>


  <?php include 'include/footer.php' ?>
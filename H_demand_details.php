<?php 
  //include header file
  include ('include/U_header.php');

  //connecting to database
  $conn = mysqli_connect('localhost', 'bhargavi', 'mysqlpwd123', 'bloodbank');
  	if(!$conn){
  		echo 'Error';
  	}

	$userid = $_GET['demand_userid'];
  	//echo $userid;


 ?>


<style>
	.size{
		min-height: 0px;
		padding: 60px 0 40px 0;
		
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
	.form-group{
		text-align: left;
	}
	h1{
		color: white;
	}
	h3{
		color: #e74c3c;
		text-align: center;
	}
	.red-bar{
		width: 25%;
	}
</style>
<div class="container size">
	<br>
	<div class="row">
		<div class="col-md-6 offset-md-3 form-container">
			<h3>Demand Details</h3>
			<hr class="red-bar">
			<form class="form-group" action="H_demand_success.php" method="post">
				<div class="form-group">
              		<label for="group">Blood Group: </label><br>
              		<select class="form-control demo-default" name="group" id="group" required>
              		<option value="">Blood Group</option>
	              	<option value="A+">A+</option>
	              	<option value="A-">A-</option>
	              	<option value="B+">B+</option>
	              	<option value="B-">B-</option>
	              	<option value="O+">O+</option>
	              	<option value="O-">O-</option>
	              	<option value="AB+">AB+</option>
	              	<option value="AB-">AB-</option>
              		</select>
            	</div>
            	<div class="form-group"><br>
              		<label for="contact_no">Number of Bags Required: </label>
              		<input type="number" name="reqno" placeholder="Number of Bags Required:" value="" class="form-control" required pattern="^\d{10}$"  maxlength="3">
            	</div>
            	<div class="form-group">
					<label for="hidden_userid"></label>
					<input type="hidden" name="success_userid" id="success_userid" <?php echo 'value="'.$userid.'"'  ?>>
				</div>
				<div class="form-group">
					<button id="demand" name="demand" type="submit" class="btn btn-lg btn-danger center-aligned" style="margin-top: 20px;">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
<br><br>

 <?php include ('include/footer.php'); ?>
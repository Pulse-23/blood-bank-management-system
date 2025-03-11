<?php 

	//include header file
	include ('include/A_header.php');

	//connecting to database 
	$conn = mysqli_connect('localhost', 'bhargavi', 'mysqlpwd123', 'bloodbank');
  	if(!$conn){
  		echo 'Error';
  	}

  	if(isset($_POST['submit'])){
  		$hname = $_POST['hname'];
  		$state = $_POST['state'];
  		$city = $_POST['city'];

  		$query_insert = " CALL addHospital('$hname', '$state', '$city') ";
  		$result_insert = mysqli_query($conn, $query_insert);
  		

        header("Location: A_home.php");
  	}

?>



<style>
	.size{
		min-height: 0px;
		padding: 120px 0 40px 0;
		
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
	<div class="row">
		<div class="col-md-6 offset-md-3 form-container">
					<h3>Add Hospital</h3>
					<hr class="red-bar">

				<form class="form-group" action="A_add_hospital.php" method="post">
					<div class="form-group">
						<label for="bbname">Name:</label>
						<input type="text" name="hname" id="hname" placeholder="Hospital Name" required pattern="[A-Za-z/\s]+" title="Only lower and upper case" class="form-control">
					</div><!--bb name-->
					<div class="form-group">
						<label for="state">State:</label>
						<input type="text" name="state" id="state" placeholder="State" required pattern="[A-Za-z/\s]+" title="Only lower and upper case" class="form-control">
					</div><!--state-->
					<div class="form-group">
						<label for="city">City:</label>
						<input type="text" name="city" id="city" placeholder="City" required pattern="[A-Za-z/\s]+" title="Only lower and upper case" class="form-control">
					</div><!--city-->
					<div class="form-group">
						<button id="submit" name="submit" type="submit" class="btn btn-lg btn-danger center-aligned" style="margin-top: 20px;">Submit</button>
					</div>
				</form>
		</div>
	</div>
</div>


<?php 
  //include footer file
  include ('include/footer.php');
?>					
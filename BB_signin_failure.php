<?php 

	include ('include/header.php');

 ?>


<style>
	.size{
		min-height: 150px;
		padding: 30px 0 60px 0;

	}
	h4{
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
		color: red;
		text-align: center
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
	<h4>Invalid Login Credentials</h4>
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
					<button class="btn btn-danger btn-lg center-aligned" type="submit" name="signin">Sign In</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php include 'include/footer.php' ?>

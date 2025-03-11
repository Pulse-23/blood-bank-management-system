<?php 
  //include header file
  include ('include/header.php');

  //connecting to database
  $conn = mysqli_connect('localhost', 'bhargavi', 'mysqlpwd123', 'bloodbank');
  	if(!$conn){
  		echo 'Error';
  	}

  //getting names from database
  $query = "SELECT name from hospital";
  $result = mysqli_query($conn, $query);


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
	h4{
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
		color: red;
		text-align: center
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
	<h4>This hospital aready has a POC !</h4>
	<div class="row">
		<div class="col-md-6 offset-md-3 form-container">
					<h3>Sign Up</h3>
					<hr class="red-bar">
					
          <!-- Error Messages -->

				<form class="form-group" action="H_signin.php" method="post">
					<div class="form-group">
						<label for="firstname">Fisrt Name:</label>
						<input type="text" name="firstname" id="firstname" placeholder="First Name" required pattern="[A-Za-z/\s]+" title="Only lower and upper case" class="form-control">
					</div><!--first name-->
					<div class="form-group">
						<label for="lastname">Last Name:</label>
						<input type="text" name="lastname" id="lastname" placeholder="Last Name" required pattern="[A-Za-z/\s]+" title="Only lower and upper case" class="form-control">
					</div><!--last name-->
					<div class="form-group">
            </div><!--End form-group-->
					<div class="form-group">
				              <label for="gender">Gender: </label>
				              		<div class="tab"></div>Male<input type="radio" name="gender" id="gender" value="Male" style="margin-left:10px; margin-right:10px;" checked>
				              		Female<input type="radio" name="gender" id="gender" value="Female" style="margin-left:10px;">
				    </div><!--gender-->
				    <div class="form-inline">
              <label for="name">Date of Birth: </label><br><br>
              <select class="form-control demo-default" id="date" name="date" required>
                <option value="">---Date---</option>
                <option value="01" >01</option><option value="02" >02</option><option value="03" >03</option><option value="04" >04</option><option value="05" >05</option><option value="06" >06</option><option value="07" >07</option> <option value="08" >08</option><option value="09" >09</option><option value="10" >10</option><option value="11" >11</option><option value="12" >12</option><option value="13" >13</option><option value="14" >14</option><option value="15" >15</option><option value="16" >16</option><option value="17" >17</option><option value="18" >18</option><option value="19" >19</option><option value="20" >20</option><option value="21" >21</option><option value="22" >22</option><option value="23" >23</option><option value="24" >24</option><option value="25" >25</option><option value="26" >26</option><option value="27" >27</option><option value="28" >28</option><option value="29" >29</option><option value="30" >30</option><option value="31" >31</option>
              </select>
              <select class="form-control demo-default" name="month" id="month" required>
                <option value="">---Month---</option>
                <option value="01" >January</option><option value="02" >February</option><option value="03" >March</option><option value="04" >April</option><option value="05" >May</option><option value="06" >June</option><option value="07" >July</option><option value="08" >August</option><option value="09" >September</option><option value="10" >October</option><option value="11" >November</option><option value="12" >December</option>
              </select>
              <select class="form-control demo-default" id="year" name="year" required>
                <option value="">---Year---</option>
                <option value="1975" >1975</option><option value="1976" >1976</option><option value="1978" >1978</option><option value="1979" >1979</option><option value="1980" >1980</option><option value="1981" >1981</option><option value="1982" >1982</option><option value="1983" >1983</option><option value="1984" >1984</option><option value="1985" >1985</option><option value="1986" >1986</option><option value="1987" >1987</option><option value="1988" >1988</option><option value="1989" >1989</option><option value="1990" >1990</option><option value="1991" >1991</option><option value="1992" >1992</option><option value="1993" >1993</option><option value="1994" >1994</option><option value="1995" >1995</option><option value="1996" >1996</option><option value="1997" >1997</option><option value="1998" >1998</option><option value="1999" >1999</option><option value="2000" >2000</option><option value="2001" >2001</option><option value="2002" >2002</option><option value="2003" >2003</option><option value="2004" >2004</option><option value="2005" >2005</option>
              </select>
            </div><!--End form-group-->
            		<div class="form-group"><br>
              <label for="contact_no">Contact No: </label>
              <input type="text" name="contact_no" value="" placeholder="**********" class="form-control" required pattern="^\d{10}$" title="10 numeric characters only" maxlength="10">
            </div><!--End form-group-->
            		<div class="form-group">
              <label for="contact_no">Hospital Name: </label><br>
              <select class="form-control demo-default" name="hospital" id="hospital" required>
              	<option value="">----------Chose the hospital you represent----------</option>
              	<?php while($row = mysqli_fetch_array($result)):; ?>
              		<option><?php echo $row[0]; ?></option>
              	<?php endwhile; ?>
              </select>
            </div><!--End form-group-->
				    <div class="form-group">
						<label for="fullname">Email: </label>
						<input type="text" name="email" id="email" placeholder="This will be your username to login" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Please write correct email" class="form-control">
					</div>
            <div class="form-group">
              <label for="password">Password: </label>
              <input type="password" name="password" value="" placeholder="Password" class="form-control" required pattern="{6,}">
            </div><!--End form-group-->			
					<div class="form-group">
						<button id="submit" name="submit" type="submit" class="btn btn-lg btn-danger center-aligned" style="margin-top: 20px;">Sign Up</button>
					</div>
				</form>
		</div>
	</div>
</div>

<?php 
  //include footer file
  include ('include/footer.php');
?>
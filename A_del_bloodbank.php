<?php 

	//include header file
	include ('include/A_header.php');

	//connecting to database 
	$conn = mysqli_connect('localhost', 'bhargavi', 'mysqlpwd123', 'bloodbank');
  	if(!$conn){
  		echo 'Error';
  	}
  	
  $query = "SELECT name from bloodbank";
  $result = mysqli_query($conn, $query);

  if(isset($_POST['submit'])){
    $bbname = $_POST['bloodbank'];

    $query_bbid = " SELECT bloodbankid from bloodbank where name='$bbname' ";
    $result_bbid = mysqli_query($conn, $query_bbid);
    $bbid = mysqli_fetch_all($result_bbid, MYSQLI_ASSOC);
    $bbid_ans = $bbid[0]['bloodbankid'];


    $query_del = " CALL delBloodBank('$bbid_ans') ";
    $result_del = mysqli_query($conn, $query_del);

    header("Location: A_home.php");
  }

?>



<style>
  .size{
    min-height: 0px;
    padding: 180px 0 220px 0;
    
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
          <h3>Remove Blood Bank</h3>
          <hr class="red-bar">

          <form class="form-group" action="A_del_bloodbank.php" method="post">
          <div class="form-group">
              <label for="contact_no">Blood Bank Name: </label><br>
              <select class="form-control demo-default" name="bloodbank" id="bloodbank" required>
                <option value="">--------Chose the blood bank you want to remove---------</option>
                <?php while($row = mysqli_fetch_array($result)):; ?>
                  <option><?php echo $row[0]; ?></option>
                <?php endwhile; ?>
              </select>
            </div>
            <div class="form-group">
            <button id="submit" name="submit" type="submit" class="btn btn-lg btn-danger center-aligned" style="margin-top: 30px;">Submit</button>
          </div>
          </form>
    </div>
  </div>
</div>


<?php 
  //include footer file
  include ('include/footer.php');
?>
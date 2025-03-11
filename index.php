<?php 

	//include header file
	include ('include/header.php');
?>






<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		table {
			border-collapse: collapse;
			width: 80%;
			color: #3d3d3d;
			font-family: monospace;
			font-size: 25px;
			text-align: center;
		}
		th{
			background-color: #3d3d3d;
			color: white;
		}
		tr:nth-child(even) {background-color: #f2f2f2}
	</style>
</head>
<body>






<!--PICTURES PART-->
<div class="container-fluid top-red-background">
				<div class="row">
					<div class="col-md-12">
						<h1 class="text-center" style="font-weight: 700;color: white">Every Blood Donor is a Life Saver</h1>
						<h3 class="text-center" style="font-weight: 300;color: white">You are somebody’s type, Please donate.</h3>
					</div>
				</div>
			</div>


<div class="slideshow-container">

<div class="mySlides fade">
  <img src="img1/main1.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="img1/main2.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="img1/main3.png" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="img1/main4.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="img1/main5.png" style="width:100%">
</div>


</div>


<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 5000); // Change image every 2 seconds
}
</script>






<!-- PARA SECTION -->
<div class="container-fluid red-background">
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center"  style="color: white; font-weight: 700;padding: 10px 0 0 0;">Welcome to Red Cross</h1>
			<hr class="white-bar">
			<p class="text-center pera-text" style="font-size: 18px">
			Our goal is to create and motivate people for Blood Donation. We help anyone in case of any requirement for blood. Our main objective is to continuously organize Blood Donation Camps with all the Government Blood Banks in India and to have collaborations with them so that they can help us in case of any requirement for blood. 
			<br><br>
			If you're a blood donor, you're a hero to someone, somewhere, who received your gracious gift of life. Below given, is the list of all Blood Banks. Visit the nearest Blood Bank and become a hero! 
			</p>
		</div>
	</div>
</div>


<br><br>



<!-- TABLE SECTION -->
<table align="center">
	<tr>
		<th>ID</th>
		<th>BLOOD BANK NAME</th>
		<th>STATE</th>
		<th>CITY</th>
	</tr>

	<?php
		$conn = mysqli_connect('localhost', 'bhargavi', 'mysqlpwd123', 'bloodbank');
		if(!$conn){
      		echo 'Error';
    	}

    	$query = " SELECT bloodbankid, name, state, city FROM bloodbank " ;
    	$result = mysqli_query($conn, $query);
    	if($result->num_rows > 0){
    		while($row = $result->fetch_assoc()){
    			echo "<tr><td>" . $row['bloodbankid'] . "</td><td>" . $row['name'] . "</td><td>" . $row['state'] . "</td><td>" . $row['city'] . "</td></tr>";
    		}
    		echo "</table>";
    	}
	?>
</table>



<br><br>

</body>
</html>

<?php
//include footer file
include ('include/footer.php');
 ?>
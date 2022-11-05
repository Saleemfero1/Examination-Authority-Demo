<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>

	<!--  header files -->
<header>
	<div id="left_side_image">
		<img src="images/EAD.png">
	</div>
	<div id="right_side_image">
		<img src="images/logo 1.png">
	</div>
</header>

<!-- navigation bars -->

<div id="navigation_bar">
	
	  <a href="#" class="active">HOME</a>
	  <a href="about_us.php" id="non_active">ABOUT US</a>
	  <a href="admission.php" id="non_active">ADMISSIONS</a>
	  <a href="collage_portal.php" id="non_active">COLLEGE PORTAL</a>
	  <a href="contact_page.html" id="non_active">CONTACT US</a>
</div>

<!-- Flash news content taken from database -->
<!-- maximum 6 flash news can be displayed-->

<div id="flash_news">
		<h1><img src="images/new logo.png">Flash news<img src="images/new logo.png"></h1>
		<hr>
		<!-- php connection to database to get all the flash news -->
		<?php
			$username="root";
			$password="";
			$server="localhost";
			$database="ead";
			$con=mysqli_connect("localhost","root","")or die("unable to connect");
			$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
			$sql="SELECT * FROM flash_news";
			$result=mysqli_query($con,$sql);
			if(! $result){
				die("could not get data :" .mysql_error());
			}
			while($row=mysqli_fetch_assoc($result))
			{
				echo "<marquee>";
				echo "{$row['news']}";
				echo "  </marquee><br>";
			}
		?>
</div>

<!-- images sliding -->

<div id="images">
	<img id="img1" src="images/screen1.jpg" alt="EAD image 1">
	<img id="img2" src="images/screen1.jpg" alt="EAD image 2">
	<img id="img3" src="images/screen1.jpg" alt="EAD image 3">
</div>

<!-- recent information and the project details-->


<div id="design_features">
	<div id="latest_announcements">
		<h1>Latest Announcements</h1>
		<?php 
		$sql="SELECT * FROM latest_announcements";
			$result=mysqli_query($con,$sql);
			if(! $result){
				die("could not get data :" .mysql_error());
			}
			while($row=mysqli_fetch_assoc($result))
			{
				echo "<p><img src='images/new logo.png'>{$row['news']}</p><br>";
			}
			mysqli_close($con);
			?>
	</div>
</div>

<!--  Details for the display of admission avaliable in website -->
<div id="pro">
	<img src="images/logo 1.png" alt="EAD info logo">
	<div id="info">
		<h1>EAD PROJECT</h1>
		<h2>ADMISSIONS DONE</h2>
		<h4>1. Common Entrance Examination (CET)</h4>
		<h4>2. Diploma Cet(DCET)</h4>
		<h4>3. PGCET</h4>
		<h4>4. DIPLOMA</h4>
	</div>
</div>

<!--  footer -->

<footer>
	<h1>Examination Authority Demo Project</h1>
	<p>a demonstration of real world concept of allotment collage seat allotment of students this is for demonstration purpose only</p>
	<p>**********done by Naveen Kumar R , B.Tech ,Department of Cse , UVCE*********</p> 
</footer>


</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/collage_portal.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<title>Collage Portal</title>
</head>
<body>
<!--header -->

	<div class="Examination_Authority">
	<div class="img1">
		<img src="images/log.png">
	</div>
	<div class="text">
		<h1>Examination Authority Demo </h1>
		<h2>Project</h2>
	</div>
	<div class="img2">
		<img src="images/logo 1.png">
	</div>
</div>

<!-- navigation bars -->

<div id="navigation_bar">
	
	  <a href="index.php" >HOME<i class="fas fa-home"></i></a>
	  <a href="about_us.php">ABOUT US<i class="fas fa-users"></i></a>
	  <a href="admission.php">ADMISSIONS<i class="fas fa-graduation-cap"></i></a>
	  <a href="#" id="active">COLLEGE PORTAL<i class="fas fa-university"></i></a>
	  <a href="contact_page.html">CONTACT US<i class="fas fa-phone-office"></i></a>
</div>

<!-- institution login portal-->
	<div id="login_portal">
	<h1>Institute Login</h1>
	<form method="post" action="collage_portal_verify.php">
		<span>Collage Id  </span>
		<input type="text"  name="collage_id" placeholder="Enter Collage Id Here" value="" required><br>
		<span>Password   </span>
		<input type="Password"  name="Password" placeholder="Enter Password Here" value="" required><br>
		<input type="submit" name="submit"><input type="reset" name="reset">
	</form>
</div>
<div id="circulars">
		<h1>Circulars</h1>
	</div>
	<div id="content">
				<?php
			$username="root";
			$password="";
			$server="localhost";
			$database="collage_portal";
			$con=mysqli_connect("localhost","root","")or die("unable to connect");
			$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
			$sql="SELECT * FROM recent_circulars";
			$result=mysqli_query($con,$sql);
			if(! $result){
				die("could not get data :" .mysql_error());
			}
			while($row=mysqli_fetch_assoc($result))
			{
					echo "<a href='";
					echo "{$row['link']}";
					echo "#'><p>";
					echo "{$row['circulars']} ";
					echo "";
					echo "</p></a>";
			}
			mysqli_close($con);
		?>

	</div>

</div>


<!--footer-->
<div id="page_footer">
	<h1>Examination Authority Demo Project</h1>
	<p>a demonstration of real world concept of allotment collage seat allotment of students this is for demonstration purpose only</p>
	<p>**********done by Naveen Kumar R , B.Tech ,Department of Cse , UVCE*********</p> 
</div>




</body>
</html>
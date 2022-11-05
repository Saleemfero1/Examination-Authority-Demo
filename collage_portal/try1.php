<?php 
	// if the below is set to not than if there is no proper login than it navigates to login page
	session_start();
	$collage_id=$_SESSION['collage_id'];
	if(!isset($_SESSION['collage_id'])){
		echo($collage_id);
		//header("location: //localhost/EAD%20project/collage_portal.php");	
	}
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/home_page.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Settings</title>

</head>
<body>
	<div id="header">
			<div class="img1">
				<img src="images/log.png">
			</div>
			<div class="text">
				<h1>Examination Authority Demo Project </h1>
				<h2>Collage Portal</h2>
				<h3>University Visveshvaraya Collage Of Engineering</h3>
			</div>
			<div class="img2">
				<img src="images/logo 1.png">
			</div>
</div>

<div id="left_navigation_bar">
	<p>Collage Id : E001</p>
	<div id="contents">
		<a href="home_page.php"><i class="fas fa-home"></i>Home</a><br>
		<a href="#"  class="active"><i class="fas fa-cog"></i>Settings</a><br>
		<a href="updates.php"><i class="fas fa-user-edit"></i>Updates</a><br>
		<a href="admission.php"><i class="fas fa-user-graduate"></i>Admissions</a><br>
	</div>

	<div id="Sign-Out">
		<a href="http://localhost/EAD project/collage_portal.php"><i class="fas fa-sign-out"></i>Sign-Out</a>
	</div>
</div>

</body>
</html>
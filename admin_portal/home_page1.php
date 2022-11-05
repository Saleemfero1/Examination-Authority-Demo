<?php 
session_start();
$admin_id=$_SESSION['admin_id'];
	if($admin_id==NULL)
{
	echo "null";
	echo"<script>confirm('due to internal error the page is redirecting to another page');window.location.href='http://localhost/EAD%20project/index.php'</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/home_page1.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<title>EAD Admin Portal</title>
</head>
<body>

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
<div id="navigation_bar">
	<div id="heading">
		<label><h1>EAD Controls</h1></label>
	</div>
	<div id="links">
		<a href="#" id="active"><i class="fad fa-home"></i>Home</a><br>
		<a href="display_settings.php"><i class="fad fa-users-cog"></i>Display Settings</a><br>
		<a href="admission.php"><i class="fad fa-user-graduate"></i>Admissions</a><br>
		<a href="collage_portal.php"><i class="fad fa-university"></i>Collage Portal</a><br>
		
	</div>
	<div id="sign-out">
		<a href="http://localhost/EAD%20project/index.php"><i class="fad fa-sign-out-alt"></i>Sign-Out</a>
	</div>
</div>
<div id="content_right">
	<div id="head">
		<label>EAD Admin Panel</label>
		<span><i class="fad fa-user"></i>Admin ID : <?php echo "$admin_id";  ?> </span>
	</div>

	<div id="note">
		<p>Note: This page is officially for only the authorized EAD Admin menbers only.</p>
		<p>Every activities takes place here must be taken care.</p>
		<p>Note : The authorised users must make sure that their id and password must not be shared.</p><p>This is a EAD Demo Project</p>
	</div>
	<div id="live">
		<h1><center>Admissions Done</center></h1>
	</div>
	<div id="live_admissions">
		<div id="admission">
			<CENTER>
				<table>
				<tr>
			<td><img src="images/university.png">
			 <h1>Diploma CET </h1></td>
			 <td><img src="images/university.png">
			 <h1>Under Graduate</h1></td>
			 <td><img src="images/university.png">
			 <h1>Diploma Courses</h1></td>
			 <td><img src="images/university.png">
			 <h1>Post Graduate</h1></td>
			</tr>
			 </table>
			</CENTER>
		</div>
	</div>
</div>
</body>
</html>

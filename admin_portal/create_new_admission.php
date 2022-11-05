<?php 
session_start();
$admin_id=$_SESSION['admin_id'];
	if($admin_id==NULL)
{
	echo "null";
	echo"<script>confirm('due to internal error the page is redirecting to another page');window.location.href='http://localhost/EAD%20project/index.php'</script>";
}
?>


<?php //accesing the setted cookie value in javascript in admission page
$selected_admission=$_COOKIE['admission_type'];
//$admissions=$_COOKIE['admissions'];
///echo (strtoupper($selected_admission));
//echo($admissions);
//if($selected_admission==NULL||$selected_admission=='NULL')
//{
//	echo "<script>confirm('due to interal error the page redirecting to another page'); //window.location.href='admission.php'</script>"; 
//}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/home_page1.css">
	<link rel="stylesheet" type="text/css" href="css/admission.css">
	<link rel="stylesheet" type="text/css" href="css/create_new_admission.css">
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
		<a href="home_page1.php"><i class="fad fa-home"></i>Home</a><br>
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
		<span><i class="fad fa-user"></i>Admin ID : <?php echo "$admin_id";  ?></span>
	</div>
	<div id="ead_admissions">
		<button value="Go Back!" onclick="history.back()"><i class="fad fa-backward"></i>Go Back</button>
	</div>

	<div id="new_year">
		 <h1><u><center><?php echo (strtoupper($selected_admission)); ?> - New Year Admissions Creation</center></u></h1>
	</div>
	<div id="page_body">
		<center>
			<form method="post" action="create_new_admission_database.php">
			<table>
			<tr>
				<td id="heading"><center>Course Name : </center></td>
				<td><center><?php echo (strtoupper($selected_admission)); ?></center></td>
			</tr>
			<tr>
				<td id="heading"><center>Course Year : </center></td>
				<td><center>
					<select name="selected_year" required="">
						<option value="" ></option>
						<?php
						for ($i=2000; $i <2050 ; $i++) { 
							echo'<option value="';
							echo($i);
							echo'" >';
							echo "$i";
							echo'</option>';
							//echo "$i";
						}
						 ?>
					</select>
				</center></td>
			</tr>
		</table>
		<p id="check"><input type="checkbox" class="check" name="" value="" required="">Once the Database for particular year Is Created It cannot be deleted</p>
		<input type="submit" name="" value="Create">
		</form>
		</center>
	</div>	
</div>
</body>
</html>
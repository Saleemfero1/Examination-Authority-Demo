<?php
session_start();

//$application_id=$_SESSION['application_id'];
//echo($_SESSION['application_id']);
//echo($_SESSION['admission_type']);
?>
<?php //accesing the setted cookie value in javascript in admission page
$selected_admission=$_COOKIE['display_content'];
$to_string=strval($selected_admission);
$tolower=strtolower($to_string);
$table=str_replace(" ", "_",$tolower);
	//echo($table);
//echo($selected_admission);
if($selected_admission==NULL)
{
	echo"<script>confirm('due to internal error the page is redirecting to another page');window.location.href='http://localhost/EAD%20project/admission.php'</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/verification.css">
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

<div id="heading">
	<h1><center>Verification Officer Panel<br> <?php echo($selected_admission); ?></center></h1>
</div>
<!--back button-->
	<div id="back_button">
		<input type="button" value="Go Back!" onclick="window.location.href='http://localhost/EAD%20project/admission.php'">
	</div>

	
<!-- institution login portal
	<div id="login_portal">
	<form method="post" action="student_login_authenticate.php">
		
		<?php 
			//captacha for random numbers and characters
			$n=5;
			$characters='0123456789abcdefghijkmnopqrstuvwxyzABCDEFGHIJKMNOPQRSTUVWXYZ';
			$random_string=substr(str_shuffle($characters),0,$n);
			?>	

		<div id="captacha_value">
			<label><?php
			$_SESSION["captacha"]=$random_string;
			 echo ($random_string);?></label><i class="fas fa-sync-alt" onclick="location.reload();"></i>
		</div>-->

		<div id="Login">
	<center><h1>Login Here</h1></center>
</div>


		<CENTER>
			<div id="login_panel">
			<form method="post" action="verification_authenticate.php">
				<table>
					<tr>
						<td>User Id :</td>
						<td><input type="text" name="user_id" required></td>
					</tr>
					<tr>
						<td>Password :</td>
						<td><input type="password" name="password" required></td>
					</tr>

					
				</table>
				<input type="submit" name="">
			</form>
			
			
		
		</div>
		</CENTER>
</body>
</html>

	<?php //accesing the setted cookie value in javascript in admission page
$selected_admission=$_COOKIE['display_content'];
//echo($selected_admission);
if($selected_admission==NULL)
{
	echo"<script>confirm('due to internal error the page is redirecting to another page');window.location.href='http://localhost/EAD%20project/admission.php'</script>";
}

?>
<?php
			$username="root";
			$password="";
			$server="localhost";
			$database="ead_admission";
			$con=mysqli_connect("localhost","root","")or die("unable to connect");
			$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
			$sql="SELECT * FROM admissions where course='$selected_admission'";
			$result=mysqli_query($con,$sql);
			if(! $result){
				die("could not get data :" .mysql_error());
			}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<title><?php  echo($selected_admission); ?> Applications</title>
	<link rel="stylesheet" type="text/css" href="css/student_login.css">
</head>
<body>

	<!--header -->

	<div class="Examination_Authority">
	<div class="img1">
		<img src="images/log.png">
	</div>
	<div class="text">
		<h1>Examination Authority Demo Project</h1>
		<h2><?php echo($selected_admission); ?></h2>
	</div>
	<div class="img2">
		<img src="images/logo 1.png">
	</div>
</div>

<!--back button-->
	<div id="back_button">
		<input type="button" value="Go Back!" onclick="history.back()">
	</div>

	
<!-- institution login portal-->
	<div id="login_portal">
	<h1> Know Your Application Id</h1>
	<form method="post" action="know_your_application_id_validate.php">
		
		<?php 
			//captacha for random numbers and characters
			$n=5;
			$characters='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$random_string=substr(str_shuffle($characters),0,$n);
//echo ($random_string);
		?>		<table>
			<tr>
				<tr><td><span>Phone Number </span></td>
				<td><input type="tel" name="phone" value="" placeholder="eg. 1234567890  (exclude +91)" pattern="[0-9]{10}" title="show contain valid 10 digits phone number only (exclude +91)" required></td></tr>
			</tr>
			<tr>
				<td><span>Captacha </span></td>
				<td><input type="text"  name="captacha" placeholder="Enter captacha Here" value="" required></td>
			</tr>
		</table>
		<div id="captacha_value">
			<label><?php
			session_start();
			$_SESSION["captacha"]=$random_string;
			 echo ($random_string);?></label><i class="fas fa-sync-alt" onclick="location.reload();"></i>
		</div>
		<input type='submit' name='submit'><input type='reset' name='reset'>
		<div id='create'>
			<center>
		<a href='student_login.php'>Click Here To Login </a>
		</center>
		</form>
	</div>
</body>
</html>
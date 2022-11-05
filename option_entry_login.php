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
	<link rel="stylesheet" type="text/css" href="css/option_entry_login.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<title>Option Entry</title>
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


<!--back button-->
	<div id="back_button">
		<input type="button" value="Go Back!" onclick="window.location.href='http://localhost/EAD%20project/admission.php'">
	</div>

	
<!-- institution login portal-->
	<div id="login_portal">
	<h1><?php echo($selected_admission); ?> Option Entry</h1>
	<form method="post" action="option_entry_authenticate.php">
		
		<?php 
			//captacha for random numbers and characters
			$n=5;
			$characters='0123456789abcdefghijkmnopqrstuvwxyzABCDEFGHIJKMNOPQRSTUVWXYZ';
			$random_string=substr(str_shuffle($characters),0,$n);
//echo ($random_string);
		?>
		<!--<table>
		<tr><td><span>Application Id  </span></td>
		<td><input type="text"  name="application_id" placeholder="Enter Application Id Here" value="" required></td></tr>
		<tr><td><span>Password   </span></td>
		<td><input type="password"  name="password" placeholder="Enter Password Here" value="" required></td></tr>
			</table>
		<div id="captacha">
			<span>Captacha   </span>
		<input type="text"  name="captacha" placeholder="Enter captacha Here" value="" required><br>-->
		<table>
			<tr>
				<td><span>Application Id  </span></td>
				<td><input type="text"  name="application_id" placeholder="Enter Application Id Here" value="" required></td>
			</tr>
			<tr>
				<td><span>Password </span></td>
				<td><input type="password"  name="password" placeholder="Enter Password Here" value="" required></td>
			</tr>
			<tr>
				<td><span>Captacha </span></td>
				<td><input type="text"  name="captacha" placeholder="Enter captacha Here" value="" required></td>
			</tr>
		</table>


		<div id="captacha_value">
			<label><?php
			$_SESSION["captacha"]=$random_string;
			 echo ($random_string);?></label><i class="fas fa-sync-alt" onclick="location.reload();"></i>
		</div>

		<?php $username="root";
			$password="";
			$server="localhost";
			$database="ead_admission";
			$con=mysqli_connect("localhost","root","")or die("unable to connect");
			$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");

			$sqla="select * from admissions where course='$selected_admission'";
			$resulta=mysqli_query($con,$sqla);
			if(! $resulta){
				die("could not get data :" .mysql_error());
			}
			else
			{
				$arraya=mysqli_fetch_array($resulta);
				$option_entry_status=$arraya['option_entry'];
				//echo($arraya['option_entry']);
			}


				echo "<input type='submit' name='submit'><input type='reset' name='reset'>";

		mysqli_close($con);
			?>
		
	</form>
</div>
</body>
</html>
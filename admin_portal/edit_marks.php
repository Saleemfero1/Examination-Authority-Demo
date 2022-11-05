	<?php //accesing the setted cookie value in javascript in admission page
$selected_admission=$_COOKIE['admission_type'];
if($selected_admission==NULL||$selected_admission=='NULL')
{
	echo "<script>confirm('due to interal error the page redirecting to another page'); window.location.href='admission.php'</script>"; 
}
$admissions=strtoupper($_COOKIE['admissions']);
//echo($admissions);
$admission_selected=str_replace(" ","_",strtolower(strval($admissions)));
//echo($selected_admission);
?>

<?php

	$username="root";
	$password="";
	$server="localhost";
	$database="ead_admission";
	$con=mysqli_connect("localhost","root","")or die("unable to connect");
	//selecting the database
	$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
	$sql="SELECT * FROM admissions where course='$admissions'";
	$result=mysqli_query($con,$sql);
	if (!$result) {
		//echo "no";
	}
	else
		//echo "yes";
	$array=mysqli_fetch_array($result);
	//echo($array['status']);
	$sql2="SELECT * FROM $admission_selected";
	$result2=mysqli_query($con,$sql2);
	if (!$result2) {
		//echo "no";
	}
		//echo "yes";
	$array=mysqli_fetch_array($result2);
				 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/home_page1.css">
	<link rel="stylesheet" type="text/css" href="css/admission_updates.css">
	<link rel="stylesheet" type="text/css" href="css/edit_marks.css">
	<link rel="stylesheet" type="text/css" href="css/admission.css">
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
		<a href="#"><i class="fad fa-sign-out-alt"></i>Sign-Out</a>
	</div>
</div>
<div id="content_right">
	<div id="head">
		<label>EAD Admin Panel</label>
		<span><i class="fad fa-user"></i>Admin ID : naveenkumarraja16@EAD</span>
	</div>
		<div id="ead_admissions">
			<u><center><h1><?php echo(strtoupper($_COOKIE['admissions'])); ?></h1></center></u>
		<button value="Go Back!" onclick="history.back()"><i class="fad fa-backward"></i>Go Back</button>
	</div>
	<div id="calculate_marks">
		<CENTER>
			<table>
			<th>Student Application ID</th>
			<th>Final Year Total Marks</th>
			<th>Final year Obtained Marks</th>
			<th>EAD Exam Total Marks</th>
			<th>EAD Exam Obtained Marks</th>
			<th>Submission</th>

			<?php 
			while($row=mysqli_fetch_assoc($result2))
			{
				echo "<form method='post' action='edit_marks_update.php'>
			<tr>
				<td><center><input type='text' name='application_id' value='";
				echo($row['application_id']);
				echo "' readonly></center></td>
				<td><center><input type='number' name='diploma_3year_total_marks' value='";
				echo($row['diploma_3year_total_marks']);
				echo "' required></center></td>
				<td><center><input type='number' name='diploma_year_3_marks' value='";
				echo($row['diploma_year_3_marks']);
				echo "' required></center></td>
				<td><center><input type='number' name='ead_total_marks' value='";
				echo($row['ead_total_marks']);
				echo "' required></center></td>
				<td><center><input type='number' name='ead_obtained_marks' value='";
				echo($row['ead_obtained_marks']);
				echo "' required></center></td>
				<td><center><input type='submit' name='' value='Update'></center></td>
			</tr>
		</form>";
			}
			?>
			
		</table>
		</CENTER>
	</div>
	</div>
	</body>
	</html>	
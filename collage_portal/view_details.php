<?php 
	// if the below is set to not than if there is no proper login than it navigates to login page
	session_start();
	$collage_id=$_SESSION['collage_id'];
	if(!isset($_SESSION['collage_id'])){
		header("location: //localhost/EAD%20project/collage_portal.php");	
	}
	//connecting to mysql
	$username="root";
	$password="";
	$server="localhost";
	$database="collage_portal";
	$con=mysqli_connect("localhost","root","")or die("unable to connect");
	//selecting the database
	$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
	$sql="SELECT * FROM collage_list where collage_id='$collage_id'";
	$result=mysqli_query($con,$sql);
	$array=mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>new collage form</title>
	<link rel="stylesheet" type="text/css" href="css/view_details.css">
</head>

<body>
	<!--header -->
	<div class="Examination_Authority">
	<div class="img1">
		<img src="images/log.png">
	</div>
	<div class="text">
		<h1>Examination Authority Demo Project</h1>
		<h2>Collage Details</h2>
	</div>
	<div class="img2">
		<img src="images/logo 1.png">
	</div>
</div>
<div id="heading">
<h1><u><?php 
				echo"<center>";
				echo "Collage Id : ";
				echo($array['collage_id']);
				echo"</center>";
				 ?></u></h1>
</div>
<div id="back">
	<input type="button" value="Go Back!" onclick="history.back()">
</div>
<div id="application">
	<table>
		<tr>
			<td id="label">Collage Name : </td>
			<td id="span"><?php echo($array['collage_name']);?>.</td>
		</tr>
		<tr>
			<td id="label">Address : </td>
			<td id="span"><?php echo($array['address']);?>.</td>
		</tr>
		<tr>
			<td id="label">Contact Number : </td>
			<td id="span"><?php echo($array['phone']);?>.</td>
		</tr>
		<tr>
			<td id="label">Email - id : </td>
			<td id="span"><?php echo($array['email']);?>.</td>
		</tr>
		<tr>
			<td id="label">Collage Type : </td>
			<td id="span"><?php echo($array['collage_type']);?>.</td>
		</tr>
		<tr>
			<td id="label">Chair-person : </td>
			<td id="span"><?php echo($array['chair_person']);?>.</td>
		</tr>
	</table>
</div>

</body>
</html>
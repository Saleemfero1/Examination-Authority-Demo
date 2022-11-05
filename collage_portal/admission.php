

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
	$sql="SELECT collage_name FROM collage_list where collage_id='$collage_id'";
	$result=mysqli_query($con,$sql);
	$array=mysqli_fetch_array($result);
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/help.css">
	<link rel="stylesheet" type="text/css" href="css/admission_page.css">
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
				<h3><?php 
				echo"<left>";
				echo($array['collage_name']);
				echo"</left>";
				 ?></h3>
			</div>
			<div class="img2">
				<img src="images/logo 1.png">
			</div>
</div>

<div id="left_navigation_bar">
	<p>Collage Id : <?php echo($collage_id); ?></p>
	<div id="contents">
		<a href="home_page.php"><i class="fas fa-home"></i>Home</a><br>
		<a href="settings.php"><i class="fas fa-cog"></i>Settings</a><br>
		<a href="updates.php"><i class="fas fa-user-edit"></i>Updates</a><br>
		<a href="#" class="active"><i class="fas fa-user-graduate"></i>Admissions</a><br>
	</div>

	<div id="Sign-Out">
		<a href="http://localhost/EAD project/collage_portal.php"><i class="fas fa-sign-out"></i>Sign-Out</a>
	</div>
</div>

<!-------------------------------------------- admission list -------------------------------------->
<div id="display_data">
	<div id="heading">
		<h1>Admission Details</h1>
	</div>
	<div id="logo">
		<table>
			<th id="logo1"><img src="images/images.jpeg" alt="admitted students logo"></th>
			<th id="logo2"><img src="images/Admission_1.png" alt="admitted students logo"></th>
			<tr>
				<td><CENTER>Click Here :<a href="admitted_details.php"> Admission Details</a></CENTER></td>
				<td><center>Click Here :<a href="admission_update.php"> E.A.D Admission Update</center></td>
			</tr>
		</table>
	</div>
</div>
<?php mysqli_close($con); ?>



</body>
</html>
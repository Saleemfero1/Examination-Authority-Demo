

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
	<link rel="stylesheet" type="text/css" href="css/admission_update.css">
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
		<a href="admission.php"><i class="fas fa-user-graduate"></i>Admissions</a><br>
	</div>

	<div id="Sign-Out">
		<a href="http://localhost/EAD project/collage_portal.php"><i class="fas fa-sign-out"></i>Sign-Out</a>
	</div>
</div>

<!-------------------------------------------- admission list -------------------------------------->
<?php 

$database2="ead_admission";
	$sql2=mysqli_select_db($con,$database2)or die("cannot cannot to database");
	$sql2="SELECT * FROM admissions where option_entry='closed'";
	$result2=mysqli_query($con,$sql2);
 ?>
<div id="display_data">
	<p id="back" onclick="location.href='admission.php';">Back</p>
	<div id="heading">
		<h1>Confirm Admitted Students</h1>
	</div>
	<div id="admit">
		<form method="post" action="admission_update_validate.php">
			<table>
				<tr>
				<td><label>Select Admission Type* : </td>
					<td>
						<select name="admission" id="admission" required>
							<option value=""></option>
							<?php 
							while($row2=mysqli_fetch_assoc($result2))
							{
							echo"<option value='";
							echo($row2['course']);
							echo"'>";
							echo($row2['course']);
							echo"</option>";
							}
							?>
						</select>
					</td>
				</tr>

				<tr>
				<td><label>Application Id* : </td>
					<td>
						<input type="text" name="application_id" placeholder="enter application id" required>
					</td>
				</tr>

				<tr>
				<td><label>Date of Birth* </label></td>
					<td><input type="date"  name="dob" placeholder="select the date of birth" 
						<?php 
							echo "max='";
							$max=date("Y-m-d"); 
							echo ($max);
							echo "'";
						?>
						 required></td>
				</tr>

				<tr>
				<td><label>Ranking* : </td>
					<td>
						<input type="number" name="rank" placeholder="enter Ranking" required>
					</td>
				</tr>

				<tr>
				<td><label>Allocated Course* : </td>
					<td>
						<input type="text" name="course" placeholder="Ex.. cs_1 , eee_2 " required>
					</td>
				</tr>
			</table>

			<center><input type="Submit" name="" value="Submit"></center>
		</form>
	</div>
</div>
</body>
</html>
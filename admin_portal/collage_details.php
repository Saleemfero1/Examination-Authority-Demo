	<?php //accesing the setted cookie value in javascript in admission page
$collage_id=$_COOKIE['collage_id'];
if($collage_id==NULL||$collage_id=='NULL')
{
	//echo "<script>confirm('due to interal error the page redirecting to another page'); window.location.href='home_page1.php'</script>"; 
}
//echo($collage_id);

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
	<link rel="stylesheet" type="text/css" href="css/home_page1.css">
	<link rel="stylesheet" type="text/css" href="css/collage_details.css">
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
	<div id="back">
		<button value="Go Back!" onclick="history.back()"><i class="fad fa-backward"></i>Go Back</button>
	</div>

	<div id="collage_detail">
		<h3><center><u>Collage Details</u></center></h3>
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

</div>
</body>
</html>
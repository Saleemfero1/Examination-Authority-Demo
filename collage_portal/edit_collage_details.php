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
	if(!$result)
		echo "The collage details are not avaliable";
		
	$array=mysqli_fetch_array($result);
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit collage Details</title>
	<link rel="stylesheet" type="text/css" href="css/edit_collage_details.css">
</head>

<body>
		<script type="text/javascript">
	function validate_password() {
		var pass=document.getElementById("Password").value;
		var repass=document.getElementById("re_password").value;
		if(pass!=repass) {
			document.getElementById("re_password").style.color="red";
		}
		else
		{
			document.getElementById("re_password").style.color="black";
		}
	}
</script>
	<!--header -->

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
<h1><u>Collage Details Updation</u></h1>
</div>
<div id="back">
	<input type="button" value="Go Back!" onclick="history.back()">
</div>

<div id="application">
	<form method="post" action="edit_collage_details_validate.php" enctype="multipart/form-data">
		<table id="1">
			<tr>
				<td><span>Name :</span></td>
				<td><input type="text" id="name" name="name" placeholder="Enter collage name here" value="<?php echo($array['collage_name']); ?>" required></td>
			</tr>
			<tr>
				<td><span>Address :</span></td>
				<td><input type="text" name="address" placeholder="Enter collage address here" value="<?php echo($array['address']); ?>" required></td>
			</tr>
			<tr>
				<td><span>Contact Number :</span></td>
				<td><input type="tel" name="phone_number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890 " value="<?php echo($array['phone']); ?>" required></td>
			</tr>
			<tr>
				<td><span>Email id :</span></td>
				<td><input type="email" name="email" value="<?php echo($array['email']); ?>" placeholder="Enter e-mail id here "required></td>
			</tr>
		</table>
		<div id="form_right">
			<table>
			<tr>
				<td><span class="checkmark">Collage Type :</span></td>
				<td><input type="radio" id="name" name="collage_type" value="1"placeholder="Enter collage name here"  <?php 
				if ($array['collage_type']=='government')
				{
					echo "checked";
				} 
				?> ><label>Government</label>
				<input type="radio" id="name" name="collage_type" value="2" placeholder="Enter collage name here" 
				<?php 
				if ($array['collage_type']=='private')
				{
					echo "checked";
				} 
				?>><label>Private</label></td>
			</tr>
			<tr>
				<td><span>Chair Person:</span></td>
				<td><input type="text" name="chair_name" placeholder="Enter Chair-person Name " value="<?php echo($array['chair_person']); ?>" required></td>
			</tr>
			<tr>
				<td><span>Enter Password :</span></td>
				<td><input type="Password" name="Password" id="Password"  minlength="8" title="must contain atleast 8 or more characters" value="<?php echo($array['password']); ?>" placeholder="Enter Chair-person Name "required></td>
			</tr>
			<tr>
				<td><span>Re-Enter Password :</span></td>
				<td><input type="Password" name="re_password"  id="re_password" onmouseout="validate_password()" minlength="8" value="<?php echo($array['password']); ?>" placeholder="Enter Chair-person Name" required></td>
			</tr>
		</table>
		</div>
		<div id="photo">
					<span>Update Collage Photo :</span></td>
				<input type="file" name="image"  id="file">
		</div>
			<table>
				<td><input type="checkbox" name="" required id="check_box"></td>
			</table>
			<p>I agree to all the conditions imposed by the EAD</p>
				<h4 id="note">Note : Collage Course & Seats Avaliability can only be edited by E.A.D Authority Only. </h4>
				<h4 id="note">Note : Image Updation can be done only if required. </h4>
		<input type="submit" name="submit" value="Update">

	</form>
</div>

</body>
</html>
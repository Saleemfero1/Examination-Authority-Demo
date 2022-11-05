<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Pannel</title>
	<link rel="stylesheet" type="text/css" href="css/temp.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link rel="stylesheet" type="text/css" href="css/collage_portal.css">
</head>
<body>
	<!--header-->
	<header>
		<h1>EAD Admin Panel</h1>
	</header>


<!--navigation bar-->

<div id="navigation_bar">
	<div id="heading">
		<label><h1>EAD Controls</h1></label>
	</div>
	<div id="links">
		<a href="home_page.php"><i class="fad fa-home"></i>Home</a><br>
		<a href="display_settings.php"><i class="fad fa-users-cog"></i>Display Settings</a><br>
		<a href="admission.php"><i class="fad fa-user-graduate"></i>Admissions</a><br>
		<a href="#" class="active"><i class="fad fa-university"></i>Collage Portal</a><br>
	</div>
	<div id="sign-out">
		<a href="#"><i class="fad fa-sign-out-alt"></i>Sign-Out</a>
	</div>
</div>

<!--right side frame settings-->

<div id="frame_right">
<div id="heading_collage">
	<h1>Collages in Karnataka</h1>
</div>
<div id="new_collage">
	<a href="new_collage_form.php"><i class="fad fa-layer-plus"></i>Add Collage</a>
</div>

<?php 
	//connecting to mysql
	$username="root";
	$password="";
	$server="localhost";
	$database="collage_portal";
	$collage_type="government";
	$con=mysqli_connect("localhost","root","")or die("unable to connect");
	//selecting the database
	$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
	$sql="SELECT * FROM collage_list";
	$result=mysqli_query($con,$sql);
	$array=mysqli_fetch_array($result);
	if($array['collage_type']!=NULL)
	{
		echo"<div id='government_collage'>";
		echo "<h1>Government Collage</h1>";
		echo"</div>";
		while($row=mysqli_fetch_assoc($result))
		{
			if($row['collage_type']=='government')
			{
		echo"<div id='collage_details'>";
		echo"<center><h3><span>";
		echo "{$row['collage_id']} - ";
		echo "</span>";
		echo "{$row['collage_name']}";
				echo " -";
		echo "{$row['address']}";
		echo "</h3></center>";
		echo"</div>";
	}
	}
	}

	mysqli_close($con);
?>

<?php 
	//connecting to mysql
	$username="root";
	$password="";
	$server="localhost";
	$database="collage_portal";
	$collage_type="government";
	$con=mysqli_connect("localhost","root","")or die("unable to connect");
	//selecting the database
	$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
	$sql="SELECT * FROM collage_list";
	$result=mysqli_query($con,$sql);
	$array=mysqli_fetch_array($result);
	if($array['collage_type']!=NULL)
	{
		echo"<div id='government_collage1'>";
		echo "<h1>Private Collage</h1>";
		echo"</div>";
		while($row=mysqli_fetch_assoc($result))
		{
			if($row['collage_type']=='private')
			{
		echo"<div id='collage_details1'>";
		echo"<center><h3><span>";
		echo "{$row['collage_id']} - ";
		echo "</span>";
		echo "{$row['collage_name']}";
		echo "  -";
		echo "{$row['address']}";
		echo "</h3></center>";
		echo"</div>";
	}
	}
	}
	mysqli_close($con);
?>

</div>

</body>
</html>

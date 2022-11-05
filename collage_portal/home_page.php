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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Collage Portal</title>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link rel="stylesheet" type="text/css" href="css/home_page.css">
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
		<a href="#" class="active"><i class="fas fa-home"></i>Home</a><br>
		<a href="settings.php"><i class="fas fa-cog"></i>Settings</a><br>
		<a href="updates.php"><i class="fas fa-user-edit"></i>Updates</a><br>
		<a href="admission.php"><i class="fas fa-user-graduate"></i>Admissions</a><br>
	</div>

	<div id="Sign-Out" onclick="session_expiry()">
		<a href="http://localhost/EAD%20project/collage_portal.php"><i class="fas fa-sign-out"></i>Sign-Out</a>
	</div>
</div>

<!-------------------------------------------- courses list -------------------------------------->
<div id="display">
	<div id="courses">
		<h1>Courses Offered & Intake</h1>
	</div>

<!--fetching ug courses list from database-->
<?php
	//fetching data from mysql
	$sql="SELECT * FROM ug_course_list where collage_id='$collage_id'";
	$result=mysqli_query($con,$sql);
	$array=mysqli_fetch_array($result);
	if($array['collage_id']!=NULL)
	{
		echo "<div id='course_type1'>";
		echo"<p>";
		echo"UG Courses";
		echo"</p>";
		echo "</div>";
		echo "<div id='course_name'><h1>B.Tech / B.E</h1></div>";
		echo "<div id='list1'>";
		if($array['cs']!=NULL)
		{
			echo "<h4>Computer Science Engineering</h4><h5>";
			echo ($array['cs']);
			echo"</h5>";
		}

		if($array['me']!=NULL)
		{
			echo "<h4>Mechanical Engineering</h4><h5>";
			echo ($array['me']);
			echo"</h5>";
		}

		if($array['ce']!=NULL)
		{
			echo "<h4>Civil Engineering</h4><h5>";
			echo ($array['ce']);
			echo"</h5>";
		}

		if($array['eee']!=NULL)
		{
			echo "<h4>Electrical and Electronics Engineering</h4><h5>";
			echo ($array['eee']);
			echo"</h5>";
		}
		
		if($array['ec']!=NULL)
		{
			echo "<h4>Electronic and Communication Engineering</h4><h5>";
			echo ($array['ec']);
			echo"</h5>";
		}
		
		if($array['tx']!=NULL)
		{
			echo "<h4>Textile Engineering</h4><h5>";
			echo ($array['tx']);
			echo"</h5>";
		}
		
		if($array['au']!=NULL)
		{
			echo "<h4>Automobile Engineering</h4><h5>";
			echo ($array['au']);
			echo"</h5>";
		}
		
		if($array['mt']!=NULL)
		{
			echo "<h4>Mechatronics Engineering</h4><h5>";
			echo ($array['mt']);
			echo"</h5>";
		}
		
		if($array['rb']!=NULL)
		{
			echo "<h4>Robotics</h4><h5>";
			echo ($array['rb']);
			echo"</h5>";
		}
		
		if($array['ise']!=NULL)
		{
			echo "<h4>Information Science Engineering</h4><h5>";
			echo ($array['ise']);
			echo"</h5>";
		}		

		echo "</div>";

	}
?>

<!--fetching pg courses list from database-->

<?php
	//fetching data from mysql
	$sql1="SELECT * FROM pg_mca_course_list where collage_id='$collage_id'";
	$result1=mysqli_query($con,$sql1);
	$array1=mysqli_fetch_array($result1);
	$sql="SELECT * FROM pg_mtech_course_list where collage_id='$collage_id'";
	$result=mysqli_query($con,$sql);
	$array=mysqli_fetch_array($result);
	$sql2="SELECT * FROM pg_mba_course_list where collage_id='$collage_id'";
	$result2=mysqli_query($con,$sql2);
	$array2=mysqli_fetch_array($result2);

	if(($array['collage_id'])||($array1['collage_id'])||($array2['collage_id'])!=NULL)
	{
		echo "<div id='course_type1'>";
		echo"<p>";
		echo"PG Courses";
		echo"</p>";
		echo "</div>";
	}

	if($array['collage_id']!=NULL)
	{
		echo "<div id='course_name1'><h1>M.Tech / M.Arch</h1></div>";
		echo "<div id='list1'>";
		if($array['cse']!=NULL)
		{
			echo "<h4>Computer Science Engineering</h4><h5>";
			echo ($array['cse']);
			echo"</h5>";
		}

		if($array['it']!=NULL)
		{
			echo "<h4>Information Technology</h4><h5>";
			echo ($array['it']);
			echo"</h5>";
		}

		if($array['cvl']!=NULL)
		{
			echo "<h4>Civil Engineering</h4><h5>";
			echo ($array['cvl']);
			echo"</h5>";
		}

		if($array['tt']!=NULL)
		{
			echo "<h4>Textile Technology</h4><h5>";
			echo ($array['tt']);
			echo"</h5>";
		}
		
		if($array['ec']!=NULL)
		{
			echo "<h4>Electronic and Communication Engineering</h4><h5>";
			echo ($array['ec']);
			echo"</h5>";
		}
		
		if($array['wt']!=NULL)
		{
			echo "<h4>Web Technology</h4><h5>";
			echo ($array['wt']);
			echo"</h5>";
		}
		
		if($array['md']!=NULL)
		{
			echo "<h4>Machine Design</h4><h5>";
			echo ($array['md']);
			echo"</h5>";
		}
		
		if($array['gt']!=NULL)
		{
			echo "<h4>Geo Technological Engineering</h4><h5>";
			echo ($array['gt']);
			echo"</h5>";
		}
		
		if($array['cn']!=NULL)
		{
			echo "<h4>Computer Networks Engineering</h4><h5>";
			echo ($array['cn']);
			echo"</h5>";
		}
		
		if($array['nt']!=NULL)
		{
			echo "<h4>Nano Technology</h4><h5>";
			echo ($array['nt']);
			echo"</h5>";
		}		

		echo "</div>";
	}
	
?>

<!----------------pg course mca list---------------------->

<?php

	//fetching data from mysql
	$sql="SELECT * FROM pg_mca_course_list where collage_id='$collage_id'";
	$result=mysqli_query($con,$sql);
	$array=mysqli_fetch_array($result);
	if($array['collage_id']!=NULL)
	{
		echo "<div id='mca'><h1>MCA</h1></div>";
		echo "<div id='list1'>";
		if($array['mca']!=NULL)
		{
			echo "<h4>Masters in Computer Application</h4><h5>";
			echo ($array['mca']);
			echo"</h5>";
		}
		echo "</div>";
	}
	?>

<!----------------pg course mca list---------------------->

<?php

	//fetching data from mysql
	$sql="SELECT * FROM pg_mba_course_list where collage_id='$collage_id'";
	$result=mysqli_query($con,$sql);
	$array=mysqli_fetch_array($result);
	if($array['collage_id']!=NULL)
	{
		echo "<div id='mca'><h1>MBA</h1></div>";
		echo "<div id='list1'>";
		if($array['mba']!=NULL)
		{
			echo "<h4>Masters in Business Administration</h4><h5>";
			echo ($array['mba']);
			echo"</h5>";
		}
		echo "</div>";
	}
	?>

<!----------------diploma courses list---------------------->

<?php
	//fetching data from mysql
	$sql="SELECT * FROM diploma_courses where collage_id='$collage_id'";
	$result=mysqli_query($con,$sql);
	$array=mysqli_fetch_array($result);
	if($array['collage_id']!=NULL)
	{
		echo "<div id='course_type1'>";
		echo"<p>";
		echo"Diploma Courses";
		echo"</p>";
		echo "</div>";
		echo "<div id='course_name'><h1>Diploma in Polytechnic</h1></div>";
		echo "<div id='list1'>";
		if($array['cs']!=NULL)
		{
			echo "<h4>Computer Science Engineering</h4><h5>";
			echo ($array['cs']);
			echo"</h5>";
		}

		if($array['me']!=NULL)
		{
			echo "<h4>Mechanical Engineering</h4><h5>";
			echo ($array['me']);
			echo"</h5>";
		}

		if($array['cvl']!=NULL)
		{
			echo "<h4>Civil Engineering</h4><h5>";
			echo ($array['cvl']);
			echo"</h5>";
		}

		if($array['eee']!=NULL)
		{
			echo "<h4>Electrical and Electronics Engineering</h4><h5>";
			echo ($array['eee']);
			echo"</h5>";
		}
		
		if($array['ec']!=NULL)
		{
			echo "<h4>Electronic and Communication Engineering</h4><h5>";
			echo ($array['ec']);
			echo"</h5>";
		}
		
		if($array['tx']!=NULL)
		{
			echo "<h4>Textile Engineering</h4><h5>";
			echo ($array['tx']);
			echo"</h5>";
		}
		
		if($array['fd']!=NULL)
		{
			echo "<h4>Fashion Designing</h4><h5>";
			echo ($array['au']);
			echo"</h5>";
		}
		
		if($array['at']!=NULL)
		{
			echo "<h4>Automobile Engineering</h4><h5>";
			echo ($array['at']);
			echo"</h5>";
		}
		
		if($array['ae']!=NULL)
		{
			echo "<h4>Aeronotical Engineering</h4><h5>";
			echo ($array['ae']);
			echo"</h5>";
		}
		
		if($array['hm']!=NULL)
		{
			echo "<h4>Hotel Management</h4><h5>";
			echo ($array['hm']);
			echo"</h5>";
		}		

		echo "</div>";
	}
	mysqli_close($con);
?>

</div>
</body>
</html>
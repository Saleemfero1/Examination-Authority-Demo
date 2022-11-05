	<?php //accesing the setted cookie value in javascript in admission page
$collage_id=$_COOKIE['collage_id'];
//echo($collage_id);
if($collage_id==NULL||$collage_id=='NULL')
{
	//echo "<script>confirm('due to interal error the page redirecting to another page'); window.location.href='home_page1.php'</script>"; 
}

$database="collage_portal";
 $con=mysqli_connect("localhost","root","") or die("unable to connect host");
 $sql=mysqli_select_db($con,$database)or die("unable to connect to database");
$sql="SELECT * FROM ug_course_list where collage_id='$collage_id' ";


?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/home_page1.css">
	<link rel="stylesheet" type="text/css" href="css/collage_portal.css">
	<link rel="stylesheet" type="text/css" href="css/courses_offered.css">
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
		<div id="heading_collage">
			<h1>Update Courses Offered</h1>
		</div>
		<div id="back">
			<button value="Go Back!" onclick="history.back()"><i class="fad fa-backward"></i>Go Back</button>
		</div>

		<div id="ug_courses">
			<h1><center>UG - Courses</center></h1>
		</div>
		<?php

			if($result=mysqli_query($con,$sql)){
				$array=mysqli_fetch_array($result);
				if($array['collage_id']==NULL||$array['collage_id']=='NULL'){
				echo"<div id='create_ug_courses'>
			<form action='create_ug_courses.php' method='post'>
				<center><button><i class='fas fa-plus'></i>Create</button></center>
			</form>
			</div>";
			}
			else{
				echo "<div id='courses_list'>
		 	 <CENTER><form method='post' action='ug_courses_list.php'>
		 	 	<table>
		 	 		<th>Course Name</th>
		 	 		<th>No.Of.Seats Offered</th>
		 	 		<tr>
		 	 			<td><center>Computer Science and Engineering</center></td>
		 	 			<td><center><input type='number' name='cs' value='";
		 	 			echo($array['cs']);
		 	 			echo"'></center></td>
		 	 		</tr>
		 	 		<tr>
		 	 			<td><center>Mechnanical Science Engineering</center></td>
		 	 			<td><center><input type='number' name='me' value='";
		 	 			echo($array['me']);
		 	 			echo"'></center></td>
		 	 		</tr>
		 	 		<tr>
		 	 			<td><center>Civil Engineering</center></td>
		 	 			<td><center><input type='number' name='ce' value='";
		 	 			echo($array['ce']);
		 	 			echo"'></center></td>
		 	 		</tr>
		 	 		<tr>
		 	 			<td><center>Electrical and Electronics  Engineering</center></td>
		 	 			<td><center><input type='number' name='eee' value='";
		 	 			echo($array['eee']);
		 	 			echo"'></center></td>
		 	 		</tr>
		 	 		<tr>
		 	 			<td><center>Electronic and Communication Engineering</center></td>
		 	 			<td><center><input type='number' name='ec' value='";
		 	 			echo($array['ec']);
		 	 			echo"'></center></td>
		 	 		</tr>
		 	 		<tr>
		 	 			<td><center>Textile Engineering</center></td>
		 	 			<td><center><input type='number' name='tx' value='";
		 	 			echo($array['tx']);
		 	 			echo"'></center></td>
		 	 		</tr>
		 	 		<tr>
		 	 			<td><center>Automobile Engineering</center></td>
		 	 			<td><center><input type='number' name='au' value='";
		 	 			echo($array['au']);
		 	 			echo"'></center></td>
		 	 		</tr>
		 	 		<tr>
		 	 			<td><center>Mechatronics Engineering</center></td>
		 	 			<td><center><input type='number' name='mt' value='";
		 	 			echo($array['mt']);
		 	 			echo"'></center></td>
		 	 		</tr>
		 	 		<tr>
		 	 			<td><center>Robotics Engineering</center></td>
		 	 			<td><center><input type='number' name='rb' value='";
		 	 			echo($array['rb']);
		 	 			echo"'></center></td>
		 	 		</tr>
		 	 		<tr>
		 	 			<td><center>Information Science and Engineering</center></td>
		 	 			<td><center><input type='number' name='ise' value='";
		 	 			echo($array['ise']);
		 	 			echo"'></center></td>
		 	 		</tr>
		 	 	</table>
		 	 	<div id='courses_list'>
		<input type='submit' name='submit' value='Update'></div>
		 	 </form></CENTER>
		 </div>";
			}
			}

		 ?>
		 <div id="ug_courses">
			<h1><center>Diploma - Courses</center></h1>
		</div>
		<?php
		$sql="SELECT * FROM diploma_courses where collage_id='$collage_id' ";

			if($result=mysqli_query($con,$sql)){
				$array=mysqli_fetch_array($result);
				if($array['collage_id']==NULL||$array['collage_id']=='NULL'){
				echo"<div id='create_ug_courses'>
			<form action='diploma_course.php' method='post'>
				<center><button><i class='fas fa-plus'></i>Create</button></center>
			</form>
			</div>";
			}
			else{
				echo "<div id='courses_list'>
		 	 <CENTER><form method='post' action='diploma_courses_list.php'>
		 	 	<table>
		 	 		<th>Course Name</th>
		 	 		<th>No.Of.Seats Offered</th>
		 	 		<tr>
		 	 			<td><center>Computer Science and Engineering</center></td>
		 	 			<td><center><input type='number' name='cs' value='";
		 	 			echo($array['cs']);
		 	 			echo"'></center></td>
		 	 		</tr>
		 	 		<tr>
		 	 			<td><center>Mechnanical Science Engineering</center></td>
		 	 			<td><center><input type='number' name='me' value='";
		 	 			echo($array['me']);
		 	 			echo"'></center></td>
		 	 		</tr>
		 	 		<tr>
		 	 			<td><center>Civil Engineering</center></td>
		 	 			<td><center><input type='number' name='cvl' value='";
		 	 			echo($array['cvl']);
		 	 			echo"'></center></td>
		 	 		</tr>
		 	 		<tr>
		 	 			<td><center>Electrical and Electronics  Engineering</center></td>
		 	 			<td><center><input type='number' name='eee' value='";
		 	 			echo($array['eee']);
		 	 			echo"'></center></td>
		 	 		</tr>
		 	 		<tr>
		 	 			<td><center>Electronic and Communication Engineering</center></td>
		 	 			<td><center><input type='number' name='ec' value='";
		 	 			echo($array['ec']);
		 	 			echo"'></center></td>
		 	 		</tr>
		 	 		<tr>
		 	 			<td><center>Textile Engineering</center></td>
		 	 			<td><center><input type='number' name='tx' value='";
		 	 			echo($array['tx']);
		 	 			echo"'></center></td>
		 	 		</tr>
		 	 		<tr>
		 	 			<td><center>Fashion Designing Engineering</center></td>
		 	 			<td><center><input type='number' name='fd' value='";
		 	 			echo($array['fd']);
		 	 			echo"'></center></td>
		 	 		</tr>
		 	 		<tr>
		 	 			<td><center>Automobile Engineering</center></td>
		 	 			<td><center><input type='number' name='at' value='";
		 	 			echo($array['at']);
		 	 			echo"'></center></td>
		 	 		</tr>
		 	 		<tr>
		 	 			<td><center>Aeronotical Engineering</center></td>
		 	 			<td><center><input type='number' name='ae' value='";
		 	 			echo($array['ae']);
		 	 			echo"'></center></td>
		 	 		</tr>
		 	 		<tr>
		 	 			<td><center>Hotel Management Engineering</center></td>
		 	 			<td><center><input type='number' name='hm' value='";
		 	 			echo($array['hm']);
		 	 			echo"'></center></td>
		 	 		</tr>
		 	 	</table>
		 	 	<div id='courses_list'>
		<input type='submit' name='submit' value='Update'></div>
		 	 </form></CENTER>
		 </div>";
			}
			}

		 ?>

		  <div id="ug_courses">
			<h1><center> MBA - Post Graduate Courses</center></h1>
		</div>
		<?php
		$sql="SELECT * FROM pg_mba_course_list where collage_id='$collage_id' ";

			if($result=mysqli_query($con,$sql)){
				$array=mysqli_fetch_array($result);
				if($array['collage_id']==NULL||$array['collage_id']=='NULL'){
				echo"<div id='create_ug_courses'>
			<form action='pg_mba_courses.php' method='post'>
				<center><button><i class='fas fa-plus'></i>Create</button></center>
			</form>
			</div>";
			}
			else{
				echo "<div id='courses_list'>
		 	 <CENTER><form method='post' action='pg_mba_courses_insert.php'>
		 	 	<table>
		 	 		<th>Course Name</th>
		 	 		<th>No.Of.Seats Offered</th>
		 	 		<tr>
		 	 			<td><center>Masters in Business Administration</center></td>
		 	 			<td><center><input type='number' name='mba' value='";
		 	 			echo($array['mba']);
		 	 			echo"'></center></td>
		 	 		</tr>
		 	 	</table>
		 	 	<div id='courses_list'>
		<input type='submit' name='submit' value='Update'></div>
		 	 </form></CENTER>
		 </div>";
			}
			}

		 ?>

		 		  <div id="ug_courses">
			<h1><center> MCA - Post Graduate Courses</center></h1>
		</div>
		<?php
		$sql="SELECT * FROM pg_mca_course_list where collage_id='$collage_id' ";

			if($result=mysqli_query($con,$sql)){
				$array=mysqli_fetch_array($result);
				if($array['collage_id']==NULL||$array['collage_id']=='NULL'){
				echo"<div id='create_ug_courses'>
			<form action='pg_mca_courses.php' method='post'>
				<center><button><i class='fas fa-plus'></i>Create</button></center>
			</form>
			</div>";
			}
			else{
				echo "<div id='courses_list'>
		 	 <CENTER><form method='post' action='pg_mca_courses_insert.php'>
		 	 	<table>
		 	 		<th>Course Name</th>
		 	 		<th>No.Of.Seats Offered</th>
		 	 		<tr>
		 	 			<td><center>Masters in Computer Application</center></td>
		 	 			<td><center><input type='number' name='mca' value='";
		 	 			echo($array['mca']);
		 	 			echo"'></center></td>
		 	 		</tr>
		 	 	</table>
		 	 	<div id='courses_list'>
		<input type='submit' name='submit' value='Update'></div>
		 	 </form></CENTER>
		 </div>";
			}
			}

		 ?>

		 		 		  <div id="ug_courses">
			<h1><center> M.TECH - Post Graduate Courses</center></h1>
		</div>
		<?php
		$sql="SELECT * FROM pg_mtech_course_list where collage_id='$collage_id' ";

			if($result=mysqli_query($con,$sql)){
				$array=mysqli_fetch_array($result);
				if($array['collage_id']==NULL||$array['collage_id']=='NULL'){
				echo"<div id='create_ug_courses'>
			<form action='pg_mtech_courses.php' method='post'>
				<center><button><i class='fas fa-plus'></i>Create</button></center>
			</form>
			</div>";
			}
			else{
				echo "<div id='courses_list'>
		 	 <CENTER><form method='post' action='pg_mtech_courses_insert.php'>
		 	 	<table>
		 	 		<th>Course Name</th>
		 	 		<th>No.Of.Seats Offered</th>
		 	 		<tr>
		 	 			<td><center>Computer Science and Engineering</center></td>
		 	 			<td><center><input type='number' name='cse' value='";
		 	 			echo($array['cse']);
		 	 			echo"'></center></td>
		 	 		</tr>
		 	 		<tr>
		 	 			<td><center>Textile Technology</center></td>
		 	 			<td><center><input type='number' name='tt' value='";
		 	 			echo($array['tt']);
		 	 			echo"'></center></td>
		 	 		</tr>
		 	 		<tr>
		 	 			<td><center>Civil Engineering</center></td>
		 	 			<td><center><input type='number' name='cvl' value='";
		 	 			echo($array['cvl']);
		 	 			echo"'></center></td>
		 	 		</tr>
		 	 		<tr>
		 	 			<td><center>Information Technology  Engineering</center></td>
		 	 			<td><center><input type='number' name='it' value='";
		 	 			echo($array['it']);
		 	 			echo"'></center></td>
		 	 		</tr>
		 	 		<tr>
		 	 			<td><center>Electronic and Communication Engineering</center></td>
		 	 			<td><center><input type='number' name='ec' value='";
		 	 			echo($array['ec']);
		 	 			echo"'></center></td>
		 	 		</tr>
		 	 		<tr>
		 	 			<td><center>Web Technology</center></td>
		 	 			<td><center><input type='number' name='wt' value='";
		 	 			echo($array['wt']);
		 	 			echo"'></center></td>
		 	 		</tr>
		 	 		<tr>
		 	 			<td><center>Machine Designing Engineering</center></td>
		 	 			<td><center><input type='number' name='md' value='";
		 	 			echo($array['md']);
		 	 			echo"'></center></td>
		 	 		</tr>
		 	 		<tr>
		 	 			<td><center>Geo Technological Engineering</center></td>
		 	 			<td><center><input type='number' name='gt' value='";
		 	 			echo($array['gt']);
		 	 			echo"'></center></td>
		 	 		</tr>
		 	 		<tr>
		 	 			<td><center>Computer Networks Engineering</center></td>
		 	 			<td><center><input type='number' name='cn' value='";
		 	 			echo($array['cn']);
		 	 			echo"'></center></td>
		 	 		</tr>
		 	 		<tr>
		 	 			<td><center>Nano Technology</center></td>
		 	 			<td><center><input type='number' name='nt' value='";
		 	 			echo($array['nt']);
		 	 			echo"'></center></td>
		 	 		</tr>
		 	 	</table>
		 	 	<div id='courses_list'>
		<input type='submit' name='submit' value='Update'></div>
		 	 </form></CENTER>
		 </div>";
			}
			}

		 ?>
</div>
</body>
</html>
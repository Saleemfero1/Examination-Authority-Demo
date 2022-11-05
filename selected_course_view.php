<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/selected_course_view.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<title>

	<?php //accesing the setted cookie value in javascript in admission page
$selected_admission=$_COOKIE['display_content'];
echo($selected_admission);
?>

</title>
</head>
<body>

	<!--header of the page -->
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

<!-- navigation bars -->

<div id="navigation_bar">
	
	  <a href="index.php" >HOME<i class="fas fa-home"></i></a>
	  <a href="about_us.php">ABOUT US<i class="fas fa-users"></i></a>
	  <a href="admission.php">ADMISSIONS<i class="fas fa-graduation-cap"></i></a>
	  <a href="collage_portal.php">COLLEGE PORTAL<i class="fas fa-university"></i></a>
	  <a href="contact_page.html">CONTACT US<i class="fas fa-phone-office"></i></a>
</div>


<!--from database we will display all the ciculars of the particular course-->
<div id="admission_circulars">
<h1><?php echo($selected_admission); ?> Circulars</h1>	
</div>

<div id="content">
	<?php
	$selected_admission=$_COOKIE['display_content'];
	if($selected_admission==NULL)
{
	echo"<script>confirm('due to internal error the page is redirecting to another page');window.location.href='http://localhost/EAD%20project/admission.php'</script>";
}
	$to_string=strval($selected_admission);
			$username="root";
			$password="";
			$server="localhost";
			$database="collage_portal";
			$tolower=strtolower($to_string);
			$table=str_replace(" ", "_",$tolower);
			$con=mysqli_connect("localhost","root","")or die("unable to connect");
			$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
			$sql= "SELECT * FROM $table order by priority desc";
			$result=mysqli_query($con,$sql);
			if(! $result){
				//die("could not get data :" .mysql_error());
				//the above code is used to display error is there is no table im collage portal database for the particular selected year database;
			}
			else
			{
				while($row=mysqli_fetch_assoc($result))
			{
					echo "<a href='";
					echo "{$row['link']}'><p>";
					echo "{$row['announcement']}</p></a>";
			}
			}
			//from here we will select the link from the ead admision database to login or create user account for the respective applications
			$database="ead_admission";
			$table1='admissions';//used to select particular table from database
			$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");//we use the table of the selected course view to select the row in admission table of ead admission database.
			$sql= "SELECT * FROM $table1 where course='$selected_admission'" ;
			$result=mysqli_query($con,$sql);
			if(! $result){
				die("could not get data :" .mysql_error());
			}
			else
			{
					$row=mysqli_fetch_assoc($result);
					if($link=$row['status'])
					{
						echo "<a href='students_application/";
						echo "student_login.php'><p>";
						echo "Applications for {$row['course']} is open now</p></a>";
					}
			}
			mysqli_close($con);
		?>
</div>

<div id="foot">
<h1>Examination Authority Demo Project</h1>
	<p>a demonstration of real world concept of allotment collage seat allotment of students this is for demonstration purpose only</p>
	<p>**********done by Naveen Kumar R , B.Tech ,Department of Cse , UVCE*********</p> 
</div>
</body>
</html>
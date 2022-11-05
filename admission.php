<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/admission.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<title>EAD Admission</title>
</head>
<body>
<!--  the script tag is used-->

	<script type="text/javascript">
		var session_admission_selection;//this variable is the varible it stores the global value of which the user have selected the admission , for example dcet 2021 on clicking that the updates of particular admissions must be displayed


		//for the admission page we will set the cookie in javascript of which the user selects to view the updates of that particular course



		//the function execute is use to set cookie and display control of the webpage
		function execute(display_control) {
			session_admission_selection=document.getElementById(display_control);//to get the id of an element
			//document.write(session_admission_selection.id);//displaying the element id using this function
			id_value=session_admission_selection.id;//setting the id of the selected admission portal 
			document.cookie="display_content="+id_value;//setting cookie
			document.location.reload(true);//if necessary use reload page automatically
			window.location=('selected_course_view.php');
			console.log(window.location);
		}
	</script>

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
	  <a href="#" id="active">ADMISSIONS<i class="fas fa-graduation-cap"></i></a>
	  <a href="collage_portal.php">COLLEGE PORTAL<i class="fas fa-university"></i></a>
	  <a href="contact_page.html">CONTACT US<i class="fas fa-phone-office"></i></a>
</div>
<!-- year admission display-->
<div id="current_year_admission">
		<h1>Current Year Admissions</h1>
	</div>
	<div id="content">
		<!-- php connection to database to get all the Admission details -->
		<?php
			$username="root";
			$password="";
			$server="localhost";
			$database="ead_admission";
			$con=mysqli_connect("localhost","root","")or die("unable to connect");
			$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
			$sql="SELECT * FROM admissions";
			$result=mysqli_query($con,$sql);
			if(! $result){
				die("could not get data :" .mysql_error());
			}
			while($row=mysqli_fetch_assoc($result))
			{
				if ($row['display']=='present') {
					echo "<p id='";
					echo "{$row['course']}'";
					echo "onclick='execute(this.id)'>";
					echo "{$row['course']} ";
					echo "";
					echo "</p>";
				}
			}
		?>
	</div>
</div>

<div id="prevoius_year_admission">
	<h1>Previous Year Admissions</h1>
</div>
 <div id="content">
		<!-- php connection to database to get all the Admission details -->
		<?php
			$username="root";
			$password="";
			$server="localhost";
			$database="ead_admission";
			$con=mysqli_connect("localhost","root","")or die("unable to connect");
			$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
			$sql="SELECT * FROM admissions";
			$result=mysqli_query($con,$sql);
			if(! $result){
				die("could not get data :" .mysql_error());
			}
			while($row=mysqli_fetch_assoc($result))
			{
				if ($row['display']=='previous') {
					echo "<p id='";
					echo "{$row['course']}'";
					echo "onclick='execute(this.id)'>";
					echo "{$row['course']} ";
					echo "";
					echo "";
					echo "</p>";
					echo "";
				}
			}
			mysqli_close($con);
		?>

</div>

<!--footer-->

<div id="page_footer">
	<h1>Examination Authority Demo Project</h1>
	<p>a demonstration of real world concept of allotment collage seat allotment of students this is for demonstration purpose only</p>
	<p>**********done by Naveen Kumar R , B.Tech ,Department of Cse , UVCE*********</p> 
</div>

</body>
</html>
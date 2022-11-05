<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/about_us.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<title>About Us</title>
</head>
<body>
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

<!-- navigation bars -->

<div id="navigation_bar">
	
	  <a href="index.php" >HOME<i class="fas fa-home"></i></a>
	  <a href="#" id="active">ABOUT US<i class="fas fa-users"></i></a>
	  <a href="admission.php">ADMISSIONS<i class="fas fa-graduation-cap"></i></a>
	  <a href="collage_portal.php" >COLLEGE PORTAL<i class="fas fa-university"></i></a>
	  <a href="contact_page.html">CONTACT US<i class="fas fa-phone-office"></i></a>
</div>

<div id="content">
	<div id="left_logo">
		<img src="images/about_us_3.jpg">
	</div>
</div>
	<div id="right_content">
		<h1><center>About Us </center></h1>

		<div id="details_of_project">
			<p><b>Name :</b> EAD - Examination Authority Demo Project</p>
 <p><b>Technologies :</b> Html , Css , Javascript , PHP , Mysql ( Database ).</p>
 <p><b>Operating System :</b> Windows 10.</p>
 <p><b>Description :</b></p>
<p><ul>
	<p>EAD is an web based application , intended to implement Online Seat Allocation ( i.e.
Admission Process ) based on Entrance Exam and Academic Details.</p>
<p>The Project Contains four Views :-</p>
<li> User page - Normal user who sees the webpage to get details about Admissions Process.</li>
 <li>Collage View - The Collage will have details of allocated students list , course list,Admitting Procedure ...etc</li>
 <li>Student View - here student has two sub views one is during initial application to
participate in admission process and next View is during the Allocation ( an option entry ...etc).</li>
<li> Admin View - The Overall Controls of Every Details viewing like : Admission open ,close,
allocate , details viewing , seat matrix edit ...etc , basically is an control layer for overall project.
This is an aim to implement the Project by and Real Time Example of KEA.</li>
<p>Note : The Project ready with DCET (Desktop View only ) Allocating Process Completely</p>
<p><b>Future Scope :</b></p>
 <p>The Future Scope is to Extend the Allocation Procedure for many different course , increase
security , and also the working Procedure also.</p>
</ul></p>
		</div>
	</div>

	<div id="login_portal">
	<h1>Admin Login</h1>
	<form method="post" action="admin_verify.php">
		<span>Admin Id  </span>
		<input type="text"  name="collage_id" placeholder="Enter Admin Id Here" value="" required><br>
		<span>Password   </span>
		<input type="Password"  name="Password" placeholder="Enter Password Here" value="" required><br>
		<input type="submit" name="submit"><input type="reset" name="reset">
	</form>
</div>
<div id="page_footer">
	<h1>Examination Authority Demo Project</h1>
	<p>a demonstration of real world concept of allotment collage seat allotment of students this is for demonstration purpose only</p>
	<p>**********done by Naveen Kumar R , B.Tech ,Department of Cse , UVCE*********</p> 
</div>
</body>
</html>
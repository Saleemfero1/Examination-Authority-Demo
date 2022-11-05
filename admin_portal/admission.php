<?php 
session_start();
$admin_id=$_SESSION['admin_id'];
	if($admin_id==NULL)
{
	echo "null";
	echo"<script>confirm('due to internal error the page is redirecting to another page');window.location.href='http://localhost/EAD%20project/index.php'</script>";
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/home_page1.css">
	<link rel="stylesheet" type="text/css" href="css/admission.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<title>EAD Admin Portal</title>
</head>
<body>
		<script type="text/javascript">
		var session_admission_selection;//this variable is the varible it stores the global value of which the user have selected the admission , for example dcet 2021 on clicking that the updates of particular admissions must be displayed


		//for the admission page we will set the cookie in javascript of which the user selects to view the updates of that particular course



		//the function execute is use to set cookie and display control of the webpage
		function execute(display_control) {
			session_admission_selection=document.getElementById(display_control);//to get the id of an element
			//document.write(session_admission_selection.id);//displaying the element id using this function
			id_value=session_admission_selection.id;//setting the id of the selected admission portal 
			document.cookie="admission_type="+id_value;//setting cookie
			document.location.reload(true);//if necessary use reload page automatically
			window.location=('admission_view.php');
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
<div id="navigation_bar">
	<div id="heading">
		<label><h1>EAD Controls</h1></label>
	</div>
	<div id="links">
		<a href="home_page1.php"><i class="fad fa-home"></i>Home</a><br>
		<a href="display_settings.php"><i class="fad fa-users-cog"></i>Display Settings</a><br>
		<a href="#" id="active"><i class="fad fa-user-graduate"></i>Admissions</a><br>
		<a href="collage_portal.php"><i class="fad fa-university"></i>Collage Portal</a><br>
		
	</div>
	<div id="sign-out">
		<a href="http://localhost/EAD%20project/index.php"><i class="fad fa-sign-out-alt"></i>Sign-Out</a>
	</div>
</div>
<div id="content_right">
	<div id="head">
		<label>EAD Admin Panel</label>
		<span><i class="fad fa-user"></i>Admin ID :  <?php echo "$admin_id";  ?></span>
	</div>
	<div id="ead_admissions">
		<center><h1><u>EAD - Admissions</u></h1></center>
	</div>
	<div id="admissions_type">

		<div id="UG_CET">
			<img src="images/ug.jpg" alt="ug image">
		</div>
		<div id="UGCET">
			 <label><CENTER>UG Courses Admissions</CENTER></label>
			 <p>The admissions process for the ug courses , for the eligible candidates who has passed their PUC examination of any state in india, Entrance examination conducted as ugcet</p>
			<center> <button id="kcet" onclick='execute(this.id)'>Click Here</button></center>
		</div>
	</div>
	<div id="admissions_type1">

		<div id="UG_CET1">
			<img src="images/dcet.png" alt="ug image">
		</div>
		<div id="UGCET1">
			 <label><CENTER>Diploma-Lateral Admissions</CENTER></label>
			 <p>The admissions process for the ug courses , for the eligible candidates who has passed their diploma examination of karnataka state in india, Entrance examination conducted as dcet and permitted for ug courses 2nd year on laternal entry basis.</p>
			<center> <button id="dcet" onclick='execute(this.id)'>Click Here</button></center>
		</div>
	</div>
</div>
</body>
</html>

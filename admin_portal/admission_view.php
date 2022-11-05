<?php 
session_start();
$admin_id=$_SESSION['admin_id'];
	if($admin_id==NULL)
{
	echo "null";
	echo"<script>confirm('due to internal error the page is redirecting to another page');window.location.href='http://localhost/EAD%20project/index.php'</script>";
}
?>

	<?php //accesing the setted cookie value in javascript in admission page
$selected_admission=$_COOKIE['admission_type'];
if($selected_admission==NULL||$selected_admission=='NULL')
{
	echo "<script>confirm('due to interal error the page redirecting to another page'); window.location.href='admission.php'</script>"; 
}
//echo($selected_admission);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/home_page1.css">
	<link rel="stylesheet" type="text/css" href="css/admission.css">
	<link rel="stylesheet" type="text/css" href="css/admission_view.css">
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
			document.cookie="admissions="+id_value;//setting cookie
			document.location.reload(true);//if necessary use reload page automatically
			window.location=('admission_updates.php');
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
		<span><i class="fad fa-user"></i>Admin ID : <?php echo "$admin_id";  ?></span>
	</div>
		<div id="ead_admissions">
		<center><h1><u><?php echo (strtoupper($selected_admission)); ?> - Admissions</u></h1></center>
		<button onclick="window.location='create_new_admission.php';"><i class="fas fa-plus"></i>New Admission</button>
	</div>
	<?php
		$search_string=strtoupper($selected_admission);
		//echo($search_string);	
		$kcet='kcet';
		$dcet='dcet';

			$username="root";
			$password="";
			$server="localhost";
			$database="ead_admission";
			$con=mysqli_connect("localhost","root","")or die("unable to connect");
			$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
			$sql="SELECT * FROM admissions order by course desc";
			$result=mysqli_query($con,$sql);
			if(! $result){
				die("could not get data :" .mysql_error());
			}
			else
		{
			$count=0;
			while($row=mysqli_fetch_assoc($result))
			{
				$course=$row['course'];
				$course=explode(" ",$course);
				//echo ($course[0]);
				if(strval($course[0])==$search_string)
				{

					if($count==0)
					{
						$count=1;
						echo "<div id='admissions_type'>

						<div id='UG_CET'>
						<img src='images/";
						echo($selected_admission);
						echo".png' alt='ug image'>	<br>
						</div>";
						if ($row['admissions']=='open') {
						echo"<div id='descrip_open'>
						<span><center>Open</center></span>
						</div>";
						}
						else{
						echo "<div id='descrip_closed'>
						<span><center>Closed</center></span>
						</div>";
						}
				
						echo"<div id='course'>
						<CENTER><p>";
						echo ($row['course']); 
						echo "</p></CENTER>
						</div>
						<div id='update'>
						<center><button id='";
						echo($row['course']);
						echo "'onclick='execute(this.id)'>";
						echo"Update</button></center>
						</div>
						</div>
						";
					}
					elseif ($count==1) {
						$count=2;
						echo "<div id='admissions_type2'>

						<div id='UG_CET2'>
						<img src='images/";
						echo($selected_admission);
						echo".png' alt='ug image'>	<br>
						</div>";
						if ($row['admissions']=='open') {
						echo"<div id='descrip_open'>
						<span><center>Open</center></span>
						</div>";
						}
						else{
						echo "<div id='descrip_closed'>
						<span><center>Closed</center></span>
						</div>";
						}
				
						echo"<div id='course'>
						<CENTER><p>";
						echo ($row['course']); 
						echo "</p></CENTER>
						</div>
						<div id='update'>
						<center><button id='";
						echo($row['course']);
						echo "'onclick='execute(this.id)'>";
						echo"Update</button></center>
						</div>
						</div>
						";
					}
					else{

						$count=0;
						echo "<div id='admissions_type3'>

						<div id='UG_CET3'>
						<img src='images/";
						echo($selected_admission);
						echo".png' alt='ug image'>	<br>
						</div>";
						if ($row['admissions']=='open') {
						echo"<div id='descrip_open'>
						<span><center>Open</center></span>
						</div>";
						}
						else{
						echo "<div id='descrip_closed'>
						<span><center>Closed</center></span>
						</div>";
						}
				
						echo"<div id='course'>
						<CENTER><p>";
						echo ($row['course']); 
						echo "</p></CENTER>
						</div>
						<div id='update'>
						<center><button id='";
						echo($row['course']);
						echo "'onclick='execute(this.id)'>";
						echo"Update</button></center>
						</div>
						</div>
						";
					}
				}
			}

		}
				
			mysqli_close($con);
		?>

			
		<!--	<div id="admissions_type2">

				<div id="UG_CET2">
						<img src="images/<?php echo($selected_admission); ?>.png" alt="ug image">	<br>
				</div>
				<div id="descrip_open">
					<span><center>Open</center></span>
				</div>
				<div id="descrip_closed">
					<span><center>Closed</center></span>
				</div>
				<div id="course">
					<CENTER><p>DCET 2021 <?php echo ($row['course']); ?></p></CENTER>
				</div>
				<div id="update">
					<center><a href="#">Update</a></center>
				</div>
			</div>
			<div id="admissions_type3">

				<div id="UG_CET3">
						<img src="images/<?php echo($selected_admission); ?>.png" alt="ug image">	<br>
				</div>
				<div id="descrip_open">
					<span><center>Open</center></span>
				</div>
				<div id="descrip_closed">
					<span><center>Closed</center></span>
				</div>
				<div id="course">
					<CENTER><p>DCET 2021 <?php echo ($row['course']); ?></p></CENTER>
				</div>
				<div id="update">
					<center><a href="#">Update</a></center>
				</div>
			</div>-->




</div>
</body>
</html>
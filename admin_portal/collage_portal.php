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
	<link rel="stylesheet" type="text/css" href="css/collage_portal.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<title>EAD Admin Portal</title>
</head>
<body>

	<script type="text/javascript">
		var session_admission_selection;//this variable is the varible it stores the global value of which the user have selected the admission , for example dcet 2021 on clicking that the updates of particular admissions must be displayed


		//for the admission page we will set the cookie in javascript of which the user selects to view the updates of that particular course



		//the function execute is use to set cookie and display control of the webpage
		function view_details(display_control) {
			session_admission_selection=document.getElementById(display_control);//to get the id of an element
			//document.write(session_admission_selection.id);//displaying the element id using this function
			id_value=session_admission_selection.id;//setting the id of the selected admission portal 
			document.cookie="collage_id="+id_value;//setting cookie
			document.location.reload(true);//if necessary use reload page automatically
			window.location=('collage_details.php');
			console.log(window.location);
		}

		function course_details(display_control) {
			session_admission_selection=document.getElementById(display_control);//to get the id of an element
			//document.write(session_admission_selection.id);//displaying the element id using this function
			id_value=session_admission_selection.id;//setting the id of the selected admission portal 
			document.cookie="collage_id="+id_value;//setting cookie
			document.location.reload(true);//if necessary use reload page automatically
			window.location=('courses_offered.php');
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
		<a href="" id="active"><i class="fad fa-university"></i>Collage Portal</a><br>
		
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
	<div>
		<div id="heading_collage">
	<h1>Collages in Karnataka</h1>
</div>
<div id="new_collage">
	<a href="new_collage_form.php"><i class="fad fa-layer-plus"></i>Add Collage</a>
</div>

<!--the below code is executed in php to get all the details from the database--->
<!--<div id="collage_details">
	<center>
		<table>
			<th><center>Collage Id</center></th>
			<th><center>Collage Name</center></th>
			<th><center>Details</center></th>
			<th><center>Update Courses Offered</center></th>
			<h3>
			<tr>
				<td><center>E001</center></td>
				<td><center>University of Visveswaraya Collage of Engineering</center></td>
				<td><center><button id="1" value="1" onclick="view_details(this.id)">View</button></center></td>
				<td id="course"><center id="1" value="1"><button>Click Here</button></center></td>
			</tr>
			</h3>
		</table>
	</center>
</div>-->

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
		echo "<h1><center>Government Collages</center></h1>";
		echo"</div>";
		echo"<div id='collage_details'>
	<center>
		<table>
			<th><center>Collage Id</center></th>
			<th><center>Collage Name</center></th>
			<th><center>Details</center></th>
			<th><center>Update Courses Offered</center></th>";
		while($row=mysqli_fetch_assoc($result))
		{
			if($row['collage_type']=='government')
			{
				echo"
			<h3>
			<tr>
				<td><center>";
				echo($row['collage_id']);
				echo"</center></td>
				<td><center>";
				echo($row['collage_name']);
				echo"</center></td>
				<td><center><button id='";
				echo($row['collage_id']);
				echo"' value='";
				echo($row['collage_id']);
				echo"' onclick='view_details(this.id)'>View</button></center></td>
				<td id='course'><center><button id='";
				echo($row['collage_id']);
				echo"' value='";
				echo($row['collage_id']);
				echo"' onclick='course_details(this.id)';>Click Here</button></center></td>
			</tr>
			</h3>";
		}
	}
		echo"</table>
	</center>
</div>";



		//echo"<div id='collage_details'>";
		//echo"<center><h3><span>";
		//echo "{$row['collage_id']} - ";
		//echo "</span>";
		//echo "{$row['collage_name']}";
				//echo " -";
		//echo "{$row['address']}";
		//echo "</h3></center>";
		//echo"</div>";
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
		echo"<div id='government_collage'>";
		echo "<h1><center>Private Collages</center></h1>";
		echo"</div>";
		echo"<div id='collage_details'>
	<center>
		<table>
			<th><center>Collage Id</center></th>
			<th><center>Collage Name</center></th>
			<th><center>Details</center></th>
			<th><center>Update Courses Offered</center></th>";
		while($row=mysqli_fetch_assoc($result))
		{
			if($row['collage_type']=='private')
			{
				echo"
			<h3>
			<tr>
				<td><center>";
				echo($row['collage_id']);
				echo"</center></td>
				<td><center>";
				echo($row['collage_name']);
				echo"</center></td>
				<td><center><button id='";
				echo($row['collage_id']);
				echo"' value='";
				echo($row['collage_id']);
				echo"' onclick='view_details(this.id)'>View</button></center></td>
				<td id='course'><center><button id='";
				echo($row['collage_id']);
				echo"' value='";
				echo($row['collage_id']);
				echo"' onclick='course_details(this.id)';>Click Here</button></center></td>
			</tr>
			</h3>";
		}
	}
		echo"</table>
	</center>
</div>";



		//echo"<div id='collage_details'>";
		//echo"<center><h3><span>";
		//echo "{$row['collage_id']} - ";
		//echo "</span>";
		//echo "{$row['collage_name']}";
				//echo " -";
		//echo "{$row['address']}";
		//echo "</h3></center>";
		//echo"</div>";
	}

	mysqli_close($con);
?>
	</div>

</div>
</body>
</html>

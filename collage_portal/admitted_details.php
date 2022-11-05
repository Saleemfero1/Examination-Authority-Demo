

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
	
	<link rel="stylesheet" type="text/css" href="css/admitted_details.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Updates</title>
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
	<p>Collage Id :<?php echo($collage_id); ?></p>
	<div id="contents">
		<a href="home_page.php"><i class="fas fa-home"></i>Home</a><br>
		<a href="settings.php"><i class="fas fa-cog"></i>Settings</a><br>
		<a href="#"><i class="fas fa-user-edit"></i>Updates</a><br>
		<a href="admission.php"><i class="fas fa-user-graduate"></i>Admissions</a><br>
	</div>

	<div id="Sign-Out">
		<a href="http://localhost/EAD project/collage_portal.php"><i class="fas fa-sign-out"></i>Sign-Out</a>
	</div>
</div>

<div id="display">
<div id="seat_matrix_updates">
	<h1><u>Allocated Students List</u></h1>
</div>

<div id="updates_EAD">

	<?php
			$database2='ead_admission';
			$sql2=mysqli_select_db($con,$database2)or die("cannot cannot to database");
			$sql2="SELECT * from admissions";
			$result2=mysqli_query($con,$sql2);
			
		while($row2=mysqli_fetch_assoc($result2))
		{
			{
				$course=$row2['course'];
				//echo($course);
				$seat_matrix=str_replace(" ","_",strtolower(strval($course)));
				//echo($seat_matrix);
				$sql3=mysqli_select_db($con,$database2)or die("cannot cannot to database");
				$sql3="SELECT * from $seat_matrix";
				$result3=mysqli_query($con,$sql3);
				if(!$result3)
				{
					continue;
					//echo "Not Yet Updated / Allocated";
					//echo "<script>confirm('internal error retry'); window.location.href='updates.php'</script>";
				}
				else{
					echo"<form method='post'>
					<table>
		<th>Application number</th>
		<th>Student Name</th>
		<th>Ranking</th>
		<th>Allocated Course</th>
		<th>Admission Status</th>
		";
					echo"<h3><center><u>";
		echo($row2['course']);
		echo" Students List</u></center></h3>";
		echo"<div id='border'>";
				while($row3=mysqli_fetch_assoc($result3))
				{
				//echo($row3['collage_id_and_total_seats']);
					$collage_code=$row3['selected_collage'];
					//echo "$collage_code";
					$collage_code=explode("_",$collage_code);
					if($collage_code[0]==NULL||$collage_code=='NULL')
						continue;
					//echo($collage_code[0]);
					//echo($collage_code[1]);
					
					if(strval($collage_code[1])==strval($collage_id))
					{
						echo"<tr>";
						
						echo"<td><center>";
						echo($row3['application_id']);
						echo"</center></td>";

						echo"<td><center>";
						echo($row3['name']);
						echo"</center></td>";

						echo"<td><center>";
						echo($row3['ranking']);
						echo"</center></td>";

						echo"<td><center>";
						echo($row3['selected_collage']);
						echo"</center></td>";

						echo"<td><center>";
					if (strval($row3['collage_admitted_status'])=='admitted'){
						echo "<i class='fas fa-check-circle'> Admitted</i>";
					}
					else
						echo "<p><b>Not Yet Admitted</b></p>";
					echo"</center></td>";


					echo"</tr>";
					}


				}
				echo "</table></form>";
			}

		}

	}


?>
	<!--<form method="post" action="seat_matrix_update.php">
		<h3><center>DCET 2021 Students List</center></h3>
	<table>
		<th>Application number</th>
		<th>Student Name</th>
		<th>Ranking</th>
		<th>Allocated Course</th>
		<th>Admission Status</th>
		<tr>
			<td><center>Naveen Kumar</center></td>
			<td><center>Naveen Kumar</center></td>
			<td><center>Naveen Kumar</center></td>
			<td><center>Naveen Kumar</center></td>
			<td><center>Naveen Kumar</center></td>
		</tr>
</table>
</form>-->
</div>
</div>
</body>
</html>
</html>
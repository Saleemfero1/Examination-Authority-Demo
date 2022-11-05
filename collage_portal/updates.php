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
	
	<link rel="stylesheet" type="text/css" href="css/updates.css">
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
	<p>Collage Id : E001</p>
	<div id="contents">
		<a href="home_page.php"><i class="fas fa-home"></i>Home</a><br>
		<a href="settings.php"><i class="fas fa-cog"></i>Settings</a><br>
		<a href="#" class="active"><i class="fas fa-user-edit"></i>Updates</a><br>
		<a href="admission.php"><i class="fas fa-user-graduate"></i>Admissions</a><br>
	</div>

	<div id="Sign-Out">
		<a href="http://localhost/EAD project/collage_portal.php"><i class="fas fa-sign-out"></i>Sign-Out</a>
	</div>
</div>
<div id="display">
<div id="seat_matrix_updates">
	<h1><u>Updates from EAD</u></h1>
</div>
<div id="updates_EAD">
	<?php
			$database2='ead_admission';
			$sql2=mysqli_select_db($con,$database2)or die("cannot cannot to database");
			$sql2="SELECT * from admissions";
			$result2=mysqli_query($con,$sql2);
		while($row2=mysqli_fetch_assoc($result2))
		{
			if($row2['seat_matrix_edit']=='open')
			{
		echo"<h3><center><u>";
		echo($row2['course']);
		echo" Seat Matrix</u></center></h3>";
		echo"<div id='border'>";
				$course=$row2['course'];
				//echo($course);
				$seat_matrix=str_replace(" ","_",strtolower(strval($course)))."_seat_matrix";
				//echo($seat_matrix);
				$sql3=mysqli_select_db($con,$database2)or die("cannot cannot to database");
				$sql3="SELECT * from $seat_matrix order by collage_id_and_total_seats ";
				$result3=mysqli_query($con,$sql3);
				if(!$result3)
				{
					echo "<script>confirm('internal error retry'); window.location.href='updates.php'</script>";
				}
				while($row3=mysqli_fetch_assoc($result3))
				{
					//echo($row3['collage_id_and_total_seats']);
					$collage_code=$row3['collage_id_and_total_seats'];
					$collage_code=explode("_",$collage_code);
					//echo($collage_code[0]);
					//echo($collage_code[1]);
					if(strval($collage_code[1])==strval($collage_id))
					{
						//echo($collage_code[1]);
						echo"<form method='post' action='seat_matrix_update.php'>";
						echo"<div id='seat_matrix'>";
							echo"<input type='varchar' name='seat_matrix'  value='";
							echo($seat_matrix);
							echo "' readonly>";
						echo"</div>";
						echo"
		<table>
		<th>Course id</th>
		<th>Total Seats</th>
		<th>General</th>
		<th>2A</th>
		<th>2B</th>
		<th>3A</th>
		<th>3B</th>
		<th>SC</th>
		<th>ST</th>
		<th>SNQ</th>
		<th>HYK</th>
		<th>Update</th>
		<th>Submit</th>
		<tr>
			<td><center><input type='varchar' name='course_id'  value='";
			echo($row3['collage_id_and_total_seats']);
			echo "' readonly></center></td>
			<td><center><input type='number' name='total_seats'  value='";
			echo($row3['total_seats']);
			echo "' readonly></center></td>
			<td><center><input type='number' name='general'  value='";
			echo($row3['general']);
			echo"'></td>
			<td><center><input type='number' name='2A'  value='";
			echo($row3['2A']);
			echo "'></center></td>
			<td><center><input type='number' name='2B'  value='";
			echo($row3['2B']);
			echo "'></center></td>
			<td><center><input type='number' name='3A'  value='";
			echo($row3['3A']);
			echo "'></center></td>
			<td><center><input type='number' name='3B'  value='";
			echo($row3['3B']);
			echo "'></center></td>
			<td><center><input type='number' name='SC'  value='";
			echo($row3['SC']);
			echo "'></center></td>
			<td><center><input type='number' name='ST'  value='";
			echo($row3['ST']);
			echo "'></center></td>
			<td><center><input type='number' name='SNQ'  value='";
			echo($row3['SNQ']);
			echo "'></center></td>
			<td><center><input type='number' name='HYK'  value='";
			echo($row3['HYK']);
			echo "'></center></td>
			<td><center><button id='submit'>Update</button></center></td>
			<td><center>";
			if (strval($row3['collage_submission_status'])=='submitted') {
				echo "<i class='fas fa-check-circle'></i>";
			}
			echo "</center></td>
		</tr>
	</table>
	
	</form>";

					}
				}
				echo "</div>";
			}
		}
	?>
	<!--<form method="post" action="seat_matrix_update.php">
		<h3><center>DCET 2021 Seat Matrix</center></h3>
	<table>
		<th>Course id</th>
		<th>Total Seats</th>
		<th>General</th>
		<th>2A</th>
		<th>2B</th>
		<th>3A</th>
		<th>3B</th>
		<th>SC</th>
		<th>ST</th>
		<th>SNQ</th>
		<th>HYK</th>
		<th>Update</th>
		<th>Submit</th>
		<tr>
			<td><center><input type="varchar" name="course_id"  value="" readonly=""></center></td>
			<td><center><input type="number" name="total_seats"  value="" readonly=""></center></td>
			<td><center><input type="number" name="general"  value=""></td>
			<td><center><input type="number" name="2A"  value=""></center></td>
			<td><center><input type="number" name="2B"  value=""></center></td>
			<td><center><input type="number" name="3A"  value=""></center></td>
			<td><center><input type="number" name="3B"  value=""></center></td>
			<td><center><input type="number" name="SC"  value=""></center></td>
			<td><center><input type="number" name="ST"  value=""></center></td>
			<td><center><input type="number" name="SNQ"  value=""></center></td>
			<td><center><input type="number" name="HYK"  value=""></center></td>
			<td><center><button id="submit">Update</button></center></td>
			<td><center><i class="fas fa-check-circle"></i></center></td>
		</tr>
	</table>
	
	</form>-->
</div>
</div>
</body>
</html>
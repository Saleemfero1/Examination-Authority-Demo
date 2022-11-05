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
$admissions=strtoupper($_COOKIE['admissions']);
//echo($admissions);
$table=strtolower(str_replace(" ","_",$admissions));
//echo "$table";
//echo($selected_admission);
?>

<?php

	$username="root";
	$password="";
	$server="localhost";
	$database="ead_admission";
	$con=mysqli_connect("localhost","root","")or die("unable to connect");
	//selecting the database
	$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
	$sql="SELECT * FROM admissions where course='$admissions'";
	$result=mysqli_query($con,$sql);
	if (!$result) {
		//echo "no";
	}
	else
		//echo "yes";
	$array=mysqli_fetch_array($result);
	//echo($array['status']);
				 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/home_page1.css">
	<link rel="stylesheet" type="text/css" href="css/admission_updates.css">
	<link rel="stylesheet" type="text/css" href="css/display_settings.css">
	<link rel="stylesheet" type="text/css" href="css/admission.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<title>EAD Admin Portal</title>
</head>
<body>


<script type="text/javascript">

	function delete_value(display_control) {
			session_admission_selection=document.getElementById(display_control);//to get the id of an element
			//document.write(session_admission_selection.id);//displaying the element id using this function
			id_value=session_admission_selection.id;//setting the id of the selected admission portal 
			document.cookie="news="+id_value;//setting cookie
			document.location.reload(true);//if necessary use reload page automatically
			window.location=('delete_value.php');
			console.log(window.location);
		}

		function create(display_control) {
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
			<u><center><h1><?php echo(strtoupper($_COOKIE['admissions'])); ?></h1></center></u>
		<button value="Go Back!" onclick="history.back()"><i class="fad fa-backward"></i>Go Back</button>
	</div>
<div id="seat_matrix">
	
		<div id="container">
		<center>
			<table>
				<th>SL.NO</th>
				<th>Section</th>
				<th>STATUS</th>
				<form method="post" action="execute.php">
				<tr>
					<td>1.</td>
					<td>Admissions Status</td>
					<td><center><label id="switch" onclick="execute.php" value="on" >
			<input type="checkbox" name="admissions" 
			<?php 
				if($array['admissions']=='open')
					echo "checked"; 
			?>
			>
			<span id="slider"></span>
		</label></center></td>
				</tr>

				<tr>
					<td>2.</td>
					<td>Applications Intake</td>
					<td><center><label id="switch" value="on">
			<input type="checkbox" name="status" 
			<?php 
				if($array['status']=='open')
					echo "checked"; 
			?>
			>
			<span id="slider"></span>
		</label></center></td>
				</tr>

				<tr>
					<td>3.</td>
					<td>Edit Option</td>
					<td><center><label id="switch">
			<input type="checkbox" name="edit_option" 
			<?php 
				if($array['edit_option']=='open')
					echo "checked"; 
			?>
			>
			<span id="slider"></span>
		</label></center></td>
				</tr>

				<tr>
					<td>4.</td>
					<td>Is Present Year Admissions ?</td>
					<td><center><label id="switch">
			<input type="checkbox" name="display" 
			<?php 
				if($array['display']=='present')
					echo "checked"; 
			?>
			>
			<span id="slider"></span>
		</label></center></td>
				</tr>


				<tr>
					<td>5.</td>
					<td>Seat Matrix Edit</td>
					<td><center><label id="switch">
			<input type="checkbox"  name="seat_matrix_edit" value="on"
			<?php 
				if($array['seat_matrix_edit']=='open')
					echo "checked"; 
			?>
			 >
			<span id="slider"></span>
		</label></center></td>
				</tr>


				<tr>
					<td>6.</td>
					<td>Option Entry</td>
					<td><center><label id="switch">
			<input type="checkbox"  name="option_entry" value="on"
			<?php 
				if($array['option_entry']=='open')
					echo "checked"; 
			?>
			 >
			<span id="slider"></span>
		</label></center></td>
				</tr>

				<tr>
					<td>6a.</td>
					<td>Ongoing Option Round</td>
					<td><center>
			<input type="number"  name="ongoing_option_round" value=
			<?php 
			echo($array['ongoing_option_entry']);
			 ?>

			></center>
		</td>
				</tr>




<tr>
	<td></td>
	<CENTER><td><center><input type="submit" name="submit" value="submit"></center></td></CENTER>
	<td></td>
</tr>

						<tr>
							<th>SL.NO</th>
							<th><CENTER>Creation And Updation</CENTER></th>
							<th>COMMANDS</th>
						</tr>			


	</form>

				<tr>
					<td>7.</td>
					<td>Seat Matrix</td>
					<td> <center>
			<?php 
				if($array['seat_matrix']=='created')
					echo "<center>created</center>"; 
				else{
					echo "<div id='seat_matrix'>
			<i class='fas fa-plus'><button onclick=window.location='seat_matrix_creation.php'>Create</button></i>
		</div>";
				}
			?>
			</center>
		</td>
				</tr>

				


				<tr>
					<td>8.</td>
					<td>Alter Seat Matrix</td>
					<td> <CENTER>
			<?php 
					echo "<div id='seat_matrix'>
			<i class='fas fa-file-edit'><button onclick=window.location='alter_seat_matrix.php'><center>Alter</center></button></i>
		</div>";
			?>
			</CENTER>
		</td>
				</tr>


				<tr>
					<td>9.</td>
					<td>Alter Student of Non-Payment</td>
					<td> <center>
			<?php 
					echo "<div id='seat_matrix'>
			<i class='fas fa-edit'><button onclick=window.location='alter_student_details.php'>Alter</button></i>
		</div>";
			?>
			</center>
		</td>
				</tr>


				<tr>
					<td>10.</td>
					<td>Drop Seat Matrix (Un-avoidable circumstances)</td>
					<td> <center>
			<?php 
					echo "<div id='seat_matrix'>
			<i class='fas fa-trash'><button onclick=window.location='drop_seat_matrix.php'>Drop</button></i>
		</div>";
			?>
			</center>
		</td>
				</tr>

				<tr>
					<td>11.</td>
					<td>Calculate Marks/Edit Marks</td>
					<td> <center>
			<?php 
					echo "<div id='seat_matrix'>
			<i class='fas fa-abacus'><button onclick=window.location='edit_marks.php'>Marks</button></i>
		</div>";
			?>
			</center>
		</td>
				</tr>

				</tr>

				<tr>
					<td>12.</td>
					<td>Calculate Ranking</td>
					<td> <center>
			<?php 
					echo "<div id='seat_matrix'>
			<i class='fas fa-calculator'><button onclick=window.location='calculate_ranking.php'>Rankings</button></i>
		</div>";
			?>
			</center>
		</td>
				</tr>

				<tr>
					<td>13.</td>
					<td>Option Entry Round 1 Allocatement</td>
					<td> <center>
			<?php 
				if($array['option_entry_1']=='allocated')
					echo "<center>allocated</center>"; 
				else{
					echo "<div id='seat_matrix'>
			<i class='fas fa-calculator'><button onclick=window.location='option_entry_calculate.php'>Allocate</button></i>
		</div>";
				}
			?>
			</center>
		</td>
				</tr>

				<tr>
					<td>14.</td>
					<td>Option Entry Round 2 Allocatement</td>
					<td> <center>
			<?php 
				if($array['option_entry_2']=='allocated')
					echo "<center>allocated</center>"; 
				else{
					echo "<div id='seat_matrix'>
			<i class='fas fa-calculator'><button onclick=window.location='option_entry_calculate.php'>Allocate</button></i>
		</div>";
				}
			?>
			</center>
		</td>
				</tr>


				<tr>
					<td>15.</td>
					<td>Option Entry Round 3 Allocatement</td>
					<td> <center>
			<?php 
				if($array['option_entry_3']=='allocated')
					echo "<center>allocated</center>"; 
				else{
					echo "<div id='seat_matrix'>
			<i class='fas fa-calculator'><button onclick=window.location='option_entry_calculate.php'>Allocate</button></i>
		</div>";
				}
			?>
			</center>
		</td>
				</tr>



				<tr>
					<td>16.</td>
					<td>Modify-Seat Matrix & Expel Student Out of Admissions (Round 1) </td>
					<td> <center>
			<?php 
			if($array['expell_round_1']=='expelled'){
				echo "<center>Expelled</center>"; 
			}
					//echo "<center>allocated</center>"; 
			else{		echo "<div id='seat_matrix'>
			<i class='fas fa-abacus'><button onclick=window.location='expel.php'>Modify</button></i>
		</div>";}
			?>
			</center>
		</td>
				</tr>

				<tr>
					<td>17.</td>
					<td>Modify-Seat Matrix & Expel Student Out of Admissions (Round 2) </td>
					<td> <center>
			<?php 
			if($array['expell_round_2']=='expelled'){
				echo "<center>Expelled</center>"; 
			}
					//echo "<center>allocated</center>"; 
			else{		echo "<div id='seat_matrix'>
			<i class='fas fa-abacus'><button onclick=window.location='expel.php'>Modify</button></i>
		</div>";}
			?>
			</center>
		</td>
				</tr>

				<tr>
					<td>18.</td>
					<td>Modify-Seat Matrix & Expel Student Out of Admissions (Round 3) </td>
					<td> <center>
			<?php 
			if($array['expell_round_3']=='expelled'){
				echo "<center>Expelled</center>"; 
			}
					//echo "<center>allocated</center>"; 
			else{		echo "<div id='seat_matrix'>
			<i class='fas fa-abacus'><button onclick=window.location='expel.php'>Modify</button></i>
		</div>";}
			?>
			</center>
		</td>
				</tr>
				

			



				<!--<div id="seat_matrix">
		<i class='fas fa-plus'><button onclick=window.location='execute.php'>Create</button></i>
		</div>-->
				
		</table>
		<!--<label id="switch">
			<input type="checkbox" name="">
			<span id="slider"></span>
		</label>
		<div id="seat_matrix">
			<form  method="post" action="seat_matrix_creation.php">
			<i class='fas fa-plus'><button>Create</button></i>
		</form>
		</div>-->
	</div>
	
</div>

	<div id='government_collage'>
		<h1><center>Display Settings - Selected Course View (Admission Page)</center></h1>
	</div>

		<div id="news_edit">
		<?php
			$database="collage_portal";
		$con=mysqli_connect("localhost","root","")or die("unable to connect");
		$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
		$sql="SELECT * FROM $table order by priority desc";
		$result=mysqli_query($con,$sql);
		$array=mysqli_fetch_array($result);
		if($array['announcement']!='NULL')
		{
			echo"<center>
			<table>
				<tr>
					<th>Priority</th>
					<th>Announcement</th>
					<th>Link</th>
				<th>Action</th>
				
				</tr>";
				echo"<tr>";
				echo"<td><p>";
				echo ($array['priority']);
				echo"</p></td>";
				echo"<td><p>";
				echo ($array['announcement']);
				echo"</p></td>";
				$top=$array['priority']+1;
						echo"<td><p>";
						echo ($array['link']);
						echo"</p></td><td><center><button id=";
						echo "'";
					echo ($array['announcement']);
					echo"'";
					echo" onclick='delete_value(this.id)'>Delete</button></center></td>
					</tr>";

			while($row=mysqli_fetch_assoc($result))
			{

				echo"<tr>";
				echo"<td><p>";
				echo ($row['priority']);
				echo"</p></td>";
				echo"<td><p>";
				echo ($row['announcement']);
				echo"</p></td>";
				
						echo"<td><p>";
						echo ($row['link']);
						echo"</p></td><td><center><button id=";
						echo "'";
					echo ($row['announcement']);
					echo"'";
					echo" onclick='delete_value(this.id)'>Delete</button></center></td>
					</tr>";
			}
			echo"<tr>
						<form method='post' action='circular_update.php'>
							<tr>
							<td><input type='text' name='priority' value='$top' readonly></td>
							<td><input type='text' name='announcement' value=''required></td>
								<td><input type='text' name='link' value=''></td>
								<td><input type='submit' name='Add' value='Add'></td>
							</tr>
						</form>
					</tr>";

				echo "</table>
					</center>";


		}
		?>
	</div>

</div>
</body>
</html>
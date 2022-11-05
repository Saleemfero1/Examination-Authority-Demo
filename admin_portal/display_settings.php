<?php 
session_start();
$admin_id=$_SESSION['admin_id'];
	if($admin_id==NULL)
{
	echo "null";
	echo"<script>confirm('due to internal error the page is redirecting to another page');window.location.href='http://localhost/EAD%20project/index.php'</script>";
}
?>












<?php $username="root";
	$password="";
	$server="localhost";
	$database="ead";
	$con=mysqli_connect("localhost","root","")or die("unable to connect");
	//selecting the database
	$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
	$sql="SELECT * FROM flash_news";
	$result=mysqli_query($con,$sql);
	$array=mysqli_fetch_array($result);
?>








<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/home_page1.css">
	<link rel="stylesheet" type="text/css" href="css/display_settings.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<title>EAD Admin Portal</title>
</head>
<body>
<script type="text/javascript">
	function homepage_settings(display_control) {
			session_admission_selection=document.getElementById(display_control);//to get the id of an element
			//document.write(session_admission_selection.id);//displaying the element id using this function
			id_value=session_admission_selection.id;//setting the id of the selected admission portal 
			document.cookie="news="+id_value;//setting cookie
			document.location.reload(true);//if necessary use reload page automatically
			window.location=('home_page_settings.php');
			console.log(window.location);
		}

		function latest_announcements(display_control) {
			session_admission_selection=document.getElementById(display_control);//to get the id of an element
			//document.write(session_admission_selection.id);//displaying the element id using this function
			id_value=session_admission_selection.id;//setting the id of the selected admission portal 
			document.cookie="news="+id_value;//setting cookie
			document.location.reload(true);//if necessary use reload page automatically
			window.location=('latest_announcements_settings.php');
			console.log(window.location);
		}
		function circular(display_control) {
			session_admission_selection=document.getElementById(display_control);//to get the id of an element
			//document.write(session_admission_selection.id);//displaying the element id using this function
			id_value=session_admission_selection.id;//setting the id of the selected admission portal 
			document.cookie="news="+id_value;//setting cookie
			document.location.reload(true);//if necessary use reload page automatically
			window.location=('circular_settings.php');
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
		<a href="#" id="active"><i class="fad fa-users-cog"></i>Display Settings</a><br>
		<a href="admission.php"><i class="fad fa-user-graduate"></i>Admissions</a><br>
		<a href="collage_portal.php"><i class="fad fa-university"></i>Collage Portal</a><br>
		
	</div>
	<div id="sign-out">
		<a href="http://localhost/EAD%20project/index.php"><i class="fad fa-sign-out-alt"></i>Sign-Out</a>
	</div>
</div>
<div id="content_right">
	<div id="head">
		<label>EAD Admin Panel</label>
		<span><i class="fad fa-user"></i>Admin ID : <?php echo "$admin_id";  ?></span>
	</div>
	<div id="ead_admissions">
		<center><h1><u>EAD - Display Settings</u></h1></center>
	</div>
	<div id='government_collage'>
		<h1><center>Flash News (Home Page)</center></h1>
	</div>
	<div id="news_edit">
		<?php
		if($array['news']!='NULL')
		{
			echo"<center>
			<table>
				<tr>
					<th>News</th>
				<th>Action</th>
				</tr>";
				if($array['news']!=NULL)
				{
					echo"<tr>
						<td><p>";
						echo ($array['news']);
						echo"</p></td><td><center><button id=";
						echo "'";
					echo ($array['news']);
					echo"'";
					echo" onclick='homepage_settings(this.id)'>Delete</button></center></td>
					</tr>";
				}

			while($row=mysqli_fetch_assoc($result))
			{
				echo"<tr>
						<td><p>";
						echo ($row['news']);
						echo"</p></td><td><center><button id=";
						echo "'";
					echo ($row['news']);
					echo"'";
					echo" onclick='homepage_settings(this.id)'>Delete</button></center></td>
					</tr>";
			}
			echo"<tr>
						<form method='post' action='home_page_update.php'>
							<tr>
								<td><input type='text' name='news' value=''></td>
								<td><input type='submit' name='Add' value='Add'></td>
							</tr>
						</form>
					</tr>";

				echo "</table>
					</center>";


		}
		?>
</div>

		<div id='government_collage'>
		<h1><center>Latest Announcements (Home Page)</center></h1>
	</div>
	<div id="news_edit">
		<?php

		$sql="SELECT * FROM latest_announcements";
		$result=mysqli_query($con,$sql);
		$array=mysqli_fetch_array($result);


		if($array['news']!='NULL')
		{
			echo"<center>
			<table>
				<tr>
					<th>News</th>
				<th>Action</th>
				</tr>";
				if($array['news']!=NULL)
				{
					echo"<tr>
						<td><p>";
						echo ($array['news']);
						echo"</p></td><td><center><button id=";
						echo "'";
					echo ($array['news']);
					echo"'";
					echo" onclick='latest_announcements(this.id)'>Delete</button></center></td>
					</tr>";
				}

			while($row=mysqli_fetch_assoc($result))
			{
				echo"<tr>
						<td><p>";
						echo ($row['news']);
						echo"</p></td><td><center><button id=";
						echo "'";
					echo ($row['news']);
					echo"'";
					echo" onclick='latest_announcements(this.id)'>Delete</button></center></td>
					</tr>";
			}
			echo"<tr>
						<form method='post' action='latest_announcements_update.php'>
							<tr>
								<td><input type='text' name='news' value=''></td>
								<td><input type='submit' name='Add' value='Add'></td>
							</tr>
						</form>
					</tr>";

				echo "</table>
					</center>";


		}
		?>
	</div>

	<div id='government_collage'>
		<h1><center>Selected Course View (Admission Page)</center></h1>
	</div>

		<div id="news_edit">
		<?php
			$database="collage_portal";
		$con=mysqli_connect("localhost","root","")or die("unable to connect");
		$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
		$sql="SELECT * FROM recent_circulars";
		$result=mysqli_query($con,$sql);
		$array=mysqli_fetch_array($result);
		if($array['circulars']!='NULL')
		{
			echo"<center>
			<table>
				<tr>
					<th>News</th>
					<th>Link</th>
				<th>Action</th>
				
				</tr>";
				echo"<tr>";
				echo"<td><p>";
				echo ($array['circulars']);
				echo"</p></td>";
				
						echo"<td><p>";
						echo ($array['link']);
						echo"</p></td><td><center><button id=";
						echo "'";
					echo ($array['circulars']);
					echo"'";
					echo" onclick='circular(this.id)'>Delete</button></center></td>
					</tr>";

			while($row=mysqli_fetch_assoc($result))
			{
				echo"<tr>";
				echo"<td><p>";
				echo ($row['circulars']);
				echo"</p></td>";
				
						echo"<td><p>";
						echo ($row['link']);
						echo"</p></td><td><center><button id=";
						echo "'";
					echo ($row['circulars']);
					echo"'";
					echo" onclick='circular(this.id)'>Delete</button></center></td>
					</tr>";
			}
			echo"<tr>
						<form method='post' action='circular_announcements_update.php'>
							<tr>
							<td><input type='text' name='news' value=''></td>
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

<!--<center>
			<table>
				<tr>
					<th>News</th>
				<th>Action</th>
				<th>Priority</th>
				</tr>
					<tr>
						<td><p>1</p></td>
						<td><p>Applications for Dcet 2021 are open now</p></td>
					<td><center><button id="Applications for Dcet 2021 are open now" onclick='homepage_settings(this.id)'>Delete</button></center></td>
					</tr>

					<tr>
						<form method="post" action="home_page_update.php">
							<tr>
								<td><input type="text" name="priority" value=""></td>
								<td><input type="text" name="news" value=""></td>
								<td><input type="submit" name="Add" value="Add"></td>
							</tr>
						</form>
					</tr>
			</table>

		</center>-->
	</div>

</div>
</body>
</html>

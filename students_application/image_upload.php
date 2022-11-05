<?php
session_start();

$application_id=$_SESSION['application_id'];
//echo($_SESSION['application_id']);
//echo($_SESSION['admission_type']);
?>
<?php //accesing the setted cookie value in javascript in admission page
$selected_admission=$_COOKIE['display_content'];
$to_string=strval($selected_admission);
$tolower=strtolower($to_string);
$table=str_replace(" ", "_",$tolower);
	//echo($table);
//echo($selected_admission);
if($selected_admission==NULL)
{
	echo"<script>confirm('due to internal error the page is redirecting to another page');window.location.href='http://localhost/EAD%20project/admission.php'</script>";
}
			$username="root";
			$password="";
			$server="localhost";
			$database="ead_admission";
			$con=mysqli_connect("localhost","root","")or die("unable to connect");
			$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
			$sql="SELECT * FROM admissions where course='$selected_admission'";
			$result=mysqli_query($con,$sql);
			if(! $result){
				die("could not get data :" .mysql_error());
			}
			$row=mysqli_fetch_assoc($result);
			$status=$row['edit_option'];
			if($row['status']=='closed')
			{
				if($row['edit_option']=='closed'||$row['edit_option']==NULL)
				{
					echo"<script>confirm('Applications are already closed');window.location.href='http://localhost/EAD%20project/admission.php'</script>";
				}
			}
			$sql="SELECT * FROM $table where application_id='$application_id'";
			$result=mysqli_query($con,$sql);
			if(! $result){
				die("could not get data :" .mysql_error());
			}
			$row=mysqli_fetch_assoc($result);
			$final_submit=strval($row['final_submit']);
			//if ($row['final_submit']=='done') {
			//	echo"<script>confirm('final subit already done');window.location.href='student_login.php'</script>";
			//}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<title><?php  echo($selected_admission); ?> Applications</title>
	<link rel="stylesheet" type="text/css" href="css/image_upload.css">


</head>
		
<body>
<script type="text/javascript">
	function logout(){
		$_SESSION['selected_admission']='NULL';
		sessionStorage.clear();
	}
	</script>
	<div class="Examination_Authority">
		<div class="img1">
			<img src="images/log.png">
		</div>
		<div class="text">
			<h1>Examination Authority Demo Project</h1>
			<h2><?php echo($selected_admission); ?></h2>
		</div>
		<div class="img2">
			<img src="images/logo 1.png">
		</div>
	</div>

	<div id="selection_tab">
		<a href="#">Personal Details</a>
		<a href="		<?php 
		$search_string=strtolower($to_string);
		$kcet='kcet';
		$dcet='dcet';
		if(strpos($search_string,$dcet)!==false)
			{
				echo "study_details.php";
			}
		
		if(strpos($search_string,$kcet)!==false)
			{
				echo "kcet.php";
			}
		 ?>">Study Details</a>

		<a href="image_upload.php">Image Upload</a>
		<a href="final_submit.php">Final Submit</a>
		<a href="payment.php">Payment</a>
		<a href="print_application.php">Print Application</a>
		<button onclick='location.href="http://localhost/EAD%20project/students_application/student_login.php"'>Log-out</button>

	</div>


	<div id="application_id">
		<h1>Application Id : <?php echo($row['application_id']); ?></h1>
	</div>


	<div id="basic_details_form">
		<center><h1>Photo Upload</h1></center>
	</div>
	<div id="application_form">
		<form method="post" id="photo" action="image_upload_validate.php" enctype="multipart/form-data">
			<table>
			<tr>
				<td><label>Candidates Photo</label></td>
				<td><input type="file" name="candidates_photo"  id="file"></td>
				<td><?php 
						if($row['final_submit']!='done')
							echo "<input id='upload' type='submit' name='submit' value='upload'>";
							?></td>
				<td><img src="candidates_photo/<?php echo("$application_id"); ?> "></td>
			</tr>
			</table>
		</form>
				<form method="post" action="candidate_signature.php" enctype="multipart/form-data">
			<table>
			<tr>
				<td><label>Candidates Signature </label></td>
				<td><input type="file" name="candidates_signature"  id="file"></td>
				<td><?php 
						if($row['final_submit']!='done')
							echo "<input id='upload' type='submit' name='submit' value='upload'>";
							?></td>
				<td><img src="candidate_signature/<?php echo("$application_id"); ?> "></td>
			</tr>
			</table>
		</form>
	</div>

</body>
</html>


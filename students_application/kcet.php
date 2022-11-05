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
	<link rel="stylesheet" type="text/css" href="css/study_details.css">


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
		<a href="application_form.php">Personal Details</a>
		<a href="#">Study Details</a>
		<a href="image_upload.php">Image Upload</a>
		<a href="final_submit.php">Final Submit</a>
		<a href="payment.php">Payment</a>
		<a href="print_application.php">Print Application</a>
		<button onclick='location.href="print_application.php"'>Log-out</button>

	</div>


	<div id="application_id">
		<h1>Application Id : <?php echo($row['application_id']); ?></h1>
	</div>


	<div id="basic_details_form">
		<center><h1>Study Details</h1></center>
	</div>
	<div id="application_form">
		<form method="post" action="study_details_validate.php">
			<table>
				<tr>
					<td><label>10th Passed State*</label></td>
					<td>
						<select name="10th_studied_state" id="10th_studies_state"
						<?php 
						if($row['final_submit']=='done')
							echo"disabled";
						?>>
							<?php
							$sql1="SELECT * FROM states";
							$result1=mysqli_query($con,$sql1);
							if(! $result1){
								die("could not get data :" .mysql_error());
							}
							while($row1=mysqli_fetch_assoc($result1))
							{
								echo "<option value='";
								echo ($row1['name']);
								echo "'"; 
								if($row['10_studied_state']==$row1['name'])
									echo"selected";
								echo">";
								echo($row1['name']);
								echo "</option>";

							}
							?>
						</select>
					</td>
				</tr>
				<tr>
				<td><label>10th Passed year* </label></td>
					<td><input type="year"  name="10th_passed_year" placeholder="enter the 10th passed year" value="<?php {echo($row['10_passed_year']);}?>" 
						<?php 
						if($row['final_submit']=='done')
							echo"readonly";
						else
							echo "required";
						?>
						></td>
				</tr>
				<tr>
				<td><label>10th Roll Number* </label></td>
					<td><input type="text"  name="10th_roll_number" placeholder="enter the 10th roll number" value="<?php {echo($row['10_roll_number']);}?>" 
						<?php 
						if($row['final_submit']=='done')
							echo"readonly";
						else
							echo "required";
						?>
						></td>
				</tr>
				<tr>
					<td><label>10th Board* </label></td>
					<td ><input type="radio" name="10th_type" value="state" 
						<?php 
							if($row['10_type']=='state')
								echo"checked";
							if ($row['final_submit']=='done') {
								echo "disabled";
							}
						?>
					><span>STATE</span>
						 <input type="radio" name="10th_type" value="icse"
						 <?php 
							if($row['10_type']=='icse')
								echo"checked";
							if ($row['final_submit']=='done') {
								echo "disabled";
							}
						?>
						><span>ICSE</span>
						 <input type="radio" name="10th_type" value="cbse"
						 <?php 
							if($row['10_type']=='cbse')
								echo"checked";
							if ($row['final_submit']=='done') {
								echo "disabled";
							}
						?>
						><span>CBSE</span>
					</td>
				</tr>
				<tr>
				<td><label>10th Obtained Marks* </label></td>
					<td><input type="number"  name="10th_obtained_marks" placeholder="Enter the 10th obtained marks" value="<?php {echo($row['10_marks']);}?>" 
						<?php 
						if($row['final_submit']=='done')
							echo"readonly";
						else
							echo "required";
						?>
						></td>
				</tr>
				<td><label>10th Total Marks* </label></td>
					<td><input type="number"  name="10th_total_marks" placeholder="Enter the 10th total marks" value="<?php {echo($row['10th_total_marks']);}?>" 
						<?php 
						if($row['final_submit']=='done')
							echo"readonly";
						else
							echo "required";
						?>
						></td>
				</tr>

								<tr>
					<td><label>10th Passed State*</label></td>
					<td>
						<select name="10th_studied_state" id="10th_studies_state"
						<?php 
						if($row['final_submit']=='done')
							echo"disabled";
						?>>
							<?php
							$sql1="SELECT * FROM states";
							$result1=mysqli_query($con,$sql1);
							if(! $result1){
								die("could not get data :" .mysql_error());
							}
							while($row1=mysqli_fetch_assoc($result1))
							{
								echo "<option value='";
								echo ($row1['name']);
								echo "'"; 
								if($row['10_studied_state']==$row1['name'])
									echo"selected";
								echo">";
								echo($row1['name']);
								echo "</option>";

							}
							?>
						</select>
					</td>
				</tr>
				<tr>
				<td><label>10th Passed year* </label></td>
					<td><input type="year"  name="10th_passed_year" placeholder="enter the 10th passed year" value="<?php {echo($row['10_passed_year']);}?>" 
						<?php 
						if($row['final_submit']=='done')
							echo"readonly";
						else
							echo "required";
						?>
						></td>
				</tr>
				<tr>
				<td><label>12th Roll Number* </label></td>
					<td><input type="text"  name="10th_roll_number" placeholder="enter the  roll number" value="<?php {echo($row['10_roll_number']);}?>" 
						<?php 
						if($row['final_submit']=='done')
							echo"readonly";
						else
							echo "required";
						?>
						></td>
				</tr>
				<tr>
					<td><label>12th Board* </label></td>
					<td ><input type="radio" name="12th_type" value="state" 
						<?php 
							if($row['12_type']=='state')
								echo"checked";
							if ($row['final_submit']=='done') {
								echo "disabled";
							}
						?>
					><span>STATE</span>
						 <input type="radio" name="10th_type" value="icse"
						 <?php 
							if($row['12_type']=='icse')
								echo"checked";
							if ($row['final_submit']=='done') {
								echo "disabled";
							}
						?>
						><span>ICSE</span>
						 <input type="radio" name="10th_type" value="cbse"
						 <?php 
							if($row['12_type']=='cbse')
								echo"checked";
							if ($row['final_submit']=='done') {
								echo "disabled";
							}
						?>
						><span>CBSE</span>
					</td>
				</tr>
				<tr>
				<td><label>11th Obtained Marks* </label></td>
					<td><input type="number"  name="11th_obtained_marks" placeholder="Enter the 11th obtained marks" value="<?php {echo($row['11_marks']);}?>" 
						<?php 
						if($row['final_submit']=='done')
							echo"readonly";
						else
							echo "required";
						?>
						></td>
				</tr>
				<td><label>11th Total Marks* </label></td>
					<td><input type="number"  name="11th_total_marks" placeholder="Enter the 11th total marks" value="<?php {echo($row['11th_total_marks']);}?>" 
						<?php 
						if($row['final_submit']=='done')
							echo"readonly";
						else
							echo "required";
						?>
						></td>
				</tr>
			</table>
			<p>Note : The label with asterik (*) must be filled compulsarily</p>
				<div id="save">
				<center>
					<?php if ($row['final_submit']!='done') {
						//echo($final_submit);
						echo "<input type='submit' name='submit' value='Submit'>";
					} ?>
				</center>
				</div>
		</form>
	</div>
</body>
</html>
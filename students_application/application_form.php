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
	<link rel="stylesheet" type="text/css" href="css/application_form.css">


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
		<center><h1>Personal Details</h1></center>
	</div>
	<div id="application_form">
		<form method="post" action="application_form_validate.php">
			<table>
				<tr>
					<td><label>Name </label></td>
					<td><input type="text" name="name" value="<?php {echo($row['name']);}?>" readonly></td>
				</tr>
				<tr>
				<td><label>Date of Birth* </label></td>
					<td><input type="date"  name="dob" placeholder="select the date of birth" value="<?php {echo($row['dob']);}?>" 
						<?php 
						if($row['final_submit']=='done'){
							echo "max='";
							$max=date("Y-m-d"); 
							echo ($max);
							echo "'";
							echo"readonly";
						}
						else{
							echo "max='";
							$max=date("Y-m-d");
							echo ($max);
							echo "'";
							echo "required";
						}
						?>
						></td>
				</tr>
				<!--<tr>
					<td><label>Gender</label></td>
					<td><input type="radio"  name="gender" value="1" <?php 
					//if($row['gender']=='male')
					//{
					//	echo"checked";
					//}
					?> required></td>
					<td><input type="radio"  name="gender" value="1" <?php 
					//if($row['gender']=='female')
					//{
					//	echo"checked";
					//}
					?>  required></td>
				</tr>			-->	
				<tr>
					<td><label>Gender* </label></td>
					<td ><input type="radio" name="gender" value="1" 
						<?php 
							if($row['gender']=='male')
								echo"checked";
							if ($row['final_submit']=='done') {
								echo "disabled";
							}
						?>
					><span>Male</span>
						 <input type="radio" name="gender" value="2"
						 <?php 
							if($row['gender']=='female')
								echo"checked";
							if ($row['final_submit']=='done') {
								echo "disabled";
							}
						?>
						><span>Female</span>
						 <input type="radio" name="gender" value="3"
						 <?php 
							if($row['gender']=='transgender')
								echo"checked";
							if ($row['final_submit']=='done') {
								echo "disabled";
							}
						?>
						><span>Transgender</span>
					</td>
				</tr>
				
				<tr>
					<td><label>Phone Number</label></td>
					<td><input type="tel" pattern="[0-9]{10}" name="phone" value="<?php {echo($row['phone']);}?>" readonly></td>
				</tr>
				
				<tr>
					<td><label>E-Mail Id</label></td>
					<td><input type="email"  name="email" value="<?php {echo($row['email']);}?>" readonly></td>
				</tr>
				
				<tr>
				<td><label>Adhaar Number* </label></td>
					<td><input type="tel"  name="adhaar" pattern="[0-9]{12}" value="<?php {echo($row['adhaar']);}?>" 
						<?php 
						if($row['final_submit']=='done')
							echo"readonly";
						else
							echo "required";
						?>
						></td>
				</tr>
				
				<tr>
				<td><label>Nationality*</label></td>
					<td>
						<select name="nationality" id="nationality" <?php 
						if($row['final_submit']=='done')
							echo"disabled";
						?>
						>
							<option value="" ></option>
							<option value="indian" <?php 
							if($row['nationality']=='indian')
								echo"selected";
						?>
						>Indian</option>
						</select>
					</td>
				</tr>

				<tr>
				<td><label>Mother Tongue*</label></td>
					<td>
						<select name="mother_tongue" id="mother_tongue"
						<?php 
						if($row['final_submit']=='done')
							echo"disabled";
						?>>
							<option value="" ></option>
							<option value="English" <?php if($row['mother_tongue']=='english')echo"selected";?>>english</option>
							<option value="kannada" <?php if($row['mother_tongue']=='kannada')echo"selected";?>>kannada</option>
							<option value="tamil" <?php if($row['mother_tongue']=='tamil')echo"selected";?>>tamil</option>
							<option value="telugu" <?php if($row['mother_tongue']=='telugu')echo"selected";?>>telugu</option>
							<option value="hindi" <?php if($row['mother_tongue']=='hindi')echo"selected";?>>hindi</option>
							<option value="sanskrit" <?php if($row['mother_tongue']=='sanskrit')echo"selected";?>>sanskrit</option>
							<option value="marathi" <?php if($row['mother_tongue']=='marathi')echo"selected";?>>marathi</option>
							<option value="malayalam" <?php if($row['mother_tongue']=='malayalam')echo"selected";?>>malayalam</option>
							<option value="odia" <?php if($row['mother_tongue']=='odia')echo"selected";?>>odia</option>
							<option value="punjabi" <?php if($row['mother_tongue']=='punjabi')echo"selected";?>>punjabi</option>
							<option value="rajasthani" <?php if($row['mother_tongue']=='rajasthani')echo"selected";?>>rajasthani</option>
						</select>
					</td>
				</tr>

				<tr>
				<td><label>religion*</label></td>
					<td>
						<select name="religion" id="religion"
						<?php 
						if($row['final_submit']=='done')
							echo"disabled";
						?>>
							<option value="" ></option>
							<option value="hindu" <?php if($row['religion']=='hindu')echo"selected";?>>hindu</option>
							<option value="muslim" <?php if($row['religion']=='muslim')echo"selected";?>>muslim</option>
							<option value="christian" <?php if($row['religion']=='christian')echo"selected";?>>christian</option>
							<option value="buddists" <?php if($row['religion']=='buddists')echo"selected";?>>buddists</option>
							<option value="sikhs" <?php if($row['religion']=='sikhs')echo"selected";?>>sikhs</option>
							<option value="other" <?php if($row['religion']=='other')echo"selected";?>>other....</option>

						</select>
					</td>
				</tr>

				<tr>
				<td><label>Caste*</label></td>
					<td>
						<select name="caste" id="caste"
						<?php 
						if($row['final_submit']=='done')
							echo"disabled";
						?>>
							<option value="" ></option>
							<option value="general" <?php if($row['caste']=='general')echo"selected";?>>General</option>
							<option value="2A" <?php if($row['caste']=='2A')echo"selected";?>>2A</option>
							<option value="2B" <?php if($row['caste']=='2B')echo"selected";?>>2B</option>
							<option value="3A" <?php if($row['caste']=='3A')echo"selected";?>>3A</option>
							<option value="3B" <?php if($row['caste']=='3B')echo"selected";?>>3B</option>
							<option value="SC" <?php if($row['caste']=='SC')echo"selected";?>>SC</option>
							<option value="ST" <?php if($row['caste']=='ST')echo"selected";?>>ST</option>
							<option value="SNQ" <?php if($row['caste']=='SNQ')echo"selected";?>>SNQ</option>
							<option value="HYK" <?php if($row['caste']=='HYK')echo"selected";?>>HYK</option>

						</select>
					</td>
				</tr>
				<tr>
					<td><label>Sub Caste </label></td>
					<td><input type="text" name="subcaste" placeholder="enter the subcaste" value="<?php {echo($row['sub_caste']);}?>" <?php 
						if($row['final_submit']=='done')
							echo"readonly";
						?> ></td>
				</tr>
				<tr>
					<td><label>Address* </label></td>
					<td><input type="text" name="address" placeholder="enter permanent address" value="<?php {echo($row['address']);}?>" <?php 
						if($row['final_submit']=='done')
							echo"readonly";
						else
							echo "required";
						?> ></td>
				</tr>


				<tr>
				<td><label>State*</label></td>
					<td>
						<select name="states" id="states"
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
								if($row['state']==$row1['name'])
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
					<td><label>District*</label></td>
					<td><input type="text" name="district" placeholder="enter the District" value="<?php {echo($row['district']);}?>" <?php 
						if($row['final_submit']=='done')
							echo"readonly";
						?> ></td>
				</tr>
				<tr>
					<td><label>Pincode*</label></td>
					<td><input type="number" name="district1" placeholder="enter the pincode" value="<?php {echo($row['pincode']);}?>" <?php 
						if($row['final_submit']=='done')
							echo"readonly";
						?> ></td>
				</tr>

				<!--<tr>
				<td><label>10th Studied State*</label></td>
					<td>
						<select name="10_studied_state" id="10_studied_state">
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
				<td><label>10th Studied State*</label></td>
					<td>
						<select name="10_studied_state" id="10_studied_state">
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
				</tr>-->
			</table>
				<p>Note : ******Name,Phone,Email-Id cannot be updated******<br>
				Note : The label with asterik (*) must be filled compulsarily</p>
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